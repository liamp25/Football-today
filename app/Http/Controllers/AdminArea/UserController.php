<?php

namespace App\Http\Controllers\AdminArea;

use Illuminate\Http\Request;
use services\Callers\CategoryCaller;
use Illuminate\Support\Facades\DB;

class UserController extends ParentController
{
        public function all()
    {
        // Fetch all records from the 'membership-plan' table
        $users = DB::table('payment_detail')
                ->join('user_accounts', 'payment_detail.user_id', '=', 'user_accounts.id')
                ->get();
        $response['users'] = $users;
        return view('AdminArea.pages.users.all')->with($response);
    }

    public function delete($id)
    {
        // Delete the membership based on the $id
        DB::table('user_accounts')->where('id', $id)->delete();
        DB::table('payment_detail')->where('user_id', $id)->delete();
        \Session::flush();
        \Auth::logout();
        return redirect('admin/all-user')->with('alert-success', "User Deleted Successfully");
    }
}
