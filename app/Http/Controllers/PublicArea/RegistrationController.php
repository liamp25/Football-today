<?php
namespace App\Http\Controllers\PublicArea;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\GenericUser;
class RegistrationController extends Controller
{
    public function index()
    {
        return view('PublicArea.pages.accounts.account');
    }

    public function user_login(Request $request)
{
    // Login validation
    $request->validate([
        'email' => 'required',
        'password' => 'required',
    ]);

    $user = DB::table('user_accounts')->where('email', $request->input('email'))->first();

    if ($user && Hash::check($request->input('password'), $user->password)) {
        // Create an instance of GenericUser
        $genericUser = new GenericUser((array)$user);

        session(['userEmail' => $user->email]);
        session(['userSession' => $user]);
        if (session('userSession')) {
            $userId = session('userSession');
            $userId = $userId->id;
        $paymentDetail = DB::table('payment_detail')
                ->join('user_accounts', 'payment_detail.user_id', '=', 'user_accounts.id')
                ->where('user_accounts.id', $userId) 
                ->get();
        session(['has_purchased_planed_user' => true]);
        } 
        // Login using the GenericUser instance
        \Auth::login($genericUser);

        \Log::info('User authenticated successfully after login.');
        if(count($paymentDetail)>0){
            return redirect('/')->withErrors(['error' => 'Login Successfuly!'])->withInput();
        } else{
            return redirect('/plan')->withErrors(['error' => 'Please purchase the membership for ads free, betting tips and to view our articles.'])->withInput();
        }
    } else {
        \Log::error('Authentication failed during login.');
        return redirect('user-account')->withErrors(['error' => 'Email or password not matched'])->withInput();
    }
}

    // registration code..
    public function user_registration(Request $request)
{
    // validation
    $request->validate([
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required|unique:user_accounts|email',
        'password' => 'required|min:4|max:16',
        'confirm_password' => 'required|same:password',
    ]);

    // user inserted
    $userId = DB::table('user_accounts')->insertGetId([
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    $user = DB::table('user_accounts')->where('id', $userId)->first();

    // session(['first_name' => $request->first_name]);
    // session(['userSession' => $user]);

    if ($user) {
        // Create an instance of GenericUser
        $genericUser = new GenericUser((array)$user);

        // Login using the GenericUser instance
        \Auth::login($genericUser);

        \Log::info('User authenticated successfully after registration.');
        session(['msgSession' => 'x1']);
        return redirect('/user-account')->withErrors(['error' => 'Your account has been created successfully!'])->withInput();
    } else {
        \Log::error('Authentication failed after registration.');
        return redirect('user-account')->withErrors(['error' => 'Something error'])->withInput();
    }
}


    // logout
    public function user_logout()
    {
        \Session::flush();
        \Auth::logout();
        return redirect('/');
    }
}
