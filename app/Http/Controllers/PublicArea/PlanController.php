<?php
namespace App\Http\Controllers\PublicArea;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Stripe\Stripe;
use Stripe\Charge;

class PlanController extends Controller
{
    public function all_plan()
    {
            // Fetch all records from the 'membership-plan' table
            $membershipPlans = DB::table('membership-plan')->get();
            $response['membershipPlans'] = $membershipPlans;
            return view('PublicArea.pages.plans.plan')->with($response);        
    }

    public function card_details()
    {
        if (session('userSession')) {
            $userId = session('userSession');
            $userId = $userId->id;
             $paymentDetail = DB::table('payment_detail')
                ->join('user_accounts', 'payment_detail.user_id', '=', 'user_accounts.id')
                ->where('user_accounts.id', $userId) 
                ->get();
            $response['paymentDetails'] = $paymentDetail;
            return view('PublicArea.pages.plans.profile')->with($response);
        } else {
            return redirect('user-account')->withErrors(['error' => 'No have account'])->withInput();
        }
    }

    public function cancelMembership()
{
    if (session('userSession')) {
        $userSessionId = session('userSession');
        $paymentDetail = DB::table('payment_detail')->where('user_id', $userSessionId)->get();
        DB::table('payment_detail')->where('user_id', $userSessionId)->delete();
        \Session::flush();
        \Auth::logout();
        return redirect('/plan')->with(['success' => 'Card details deleted successfully!']);
    } else {
        return redirect('/plan')->withErrors(['error' => 'Something went wrong'])->withInput();
    }
}


    public function purchase_plan($id){
        if (session('userSession')) {
        $membershipprice = DB::table('membership-plan')->where('id',$id)->first();
        $stripeConfig = DB::table('stripe_account')->where('id', 1)->value('public_key');
        return view("PublicArea.pages.plans.card-detail", compact('membershipprice','stripeConfig'));
        } else {
            return redirect('user-account')->withErrors(['error' => 'To purchase plan, Please login first'])->withInput();
        }
    }

    public function purchase_planrec(Request $req, $id){
        $req->validate([
            'card_name' => 'required|string',
            'plan_packge' => 'required|in:monthly,yearly',
            'policy' => 'required|accepted',
            'stripeToken' => 'required',
        ]);
        $user_id = session('userSession')->id;
        $existingPlan = DB::table('payment_detail')
        ->where('user_id', $user_id)
        ->first();
        if ($existingPlan) {
            return redirect('/plan')->with(['failure' => 'You have already purchased a plan.']);
        }else{
            $plan_packge = $req->input('plan_packge');
            if($plan_packge == 'monthly'){
                $membershipprice = DB::table('membership-plan')->select('monthly_price')->where('id',$id)->first();
                $membershippricedd = $membershipprice->monthly_price;
            } elseif($plan_packge == 'yearly'){
                $membershipprice = DB::table('membership-plan')->select('yearly_price')->where('id',$id)->first();
                $membershippricedd = $membershipprice->yearly_price;
            }else{
                return redirect('/plan')->with(['failure' => 'Something error!']);
            }
            $owner_name = session('userSession')->first_name;
            $owner_email = session('userSession')->email;
            $token = $req->input('stripeToken');
            $policy = $req->input('policy') ?? 0;
            $customer_ID = $this->saveCustomer($owner_email, $token, $owner_name);
            $chargeResult = $this->stripeCharge(['stripe_customer_id' => $customer_ID, 'amount' => $membershippricedd]);
            if ($chargeResult == 1) {
                    $user_id = session('userSession')->id;
                    $plan_package = $plan_packge;
                    $card_name = $req->input('card_name');
                    DB::table('payment_detail')->insert([
                        'user_id' => $user_id,
                        'plan_package' => $plan_package,
                        'card_name' => $card_name,
                        'policy' => $policy,
                    ]);session(['has_purchased_plan' => true]);
                    return redirect('/plan')->with(['success' => 'Plan Purcahsed Successfully!']);
                } else {
                    return redirect('/plan')->with(['failure' => 'Something error!']);
                }
        }
    }

    public function saveCustomer($email, $token, $name = '')
    {
       $stripeConfig = DB::table('stripe_account')->where('id', 1)->value('secret_key');
        Stripe::setApiKey($stripeConfig);
        $stripeCust = \Stripe\Customer::search([
            "query" => 'email:\'' . $email . '\'',
            "limit" => 1,
        ]);

        if (isset($stripeCust->data[0]) && !empty($stripeCust->data[0])) {
            $customer_ID = $stripeCust->data[0]->id;
        } else {
            $customer = \Stripe\Customer::create([
                'source' => $token,
                "email" => $email,
                "name" => $name,
                "description" => 'Football plan purchased',
            ]);

            $customer_ID = $customer->id;
        }

        return $customer_ID;

    }

    public function stripeCharge($payData)
    {
        extract($payData);
        $amount = isset($payData['amount']) ? ($amount * 100) : 1000;
        $currency = isset($payData['currency']) ? $currency : 'gbp';
        $description = isset($payData['description']) ? $description : '';
        $stripeConfig = DB::table('stripe_account')->where('id', 1)->value('secret_key');
        try {
            Stripe::setApiKey($stripeConfig);
            $charge = Charge::create([
                'amount' => $amount,
                'currency' => $currency,
                'customer' => $stripe_customer_id,
                'description' => $description,
            ]);
            return 1;
            //return '<div class="alert alert-success">Success! Amount Charged Successfully...</div>';

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
