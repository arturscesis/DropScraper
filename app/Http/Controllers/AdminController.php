<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Amazon;
use App\Models\Ebay;
use App\Models\User;

class AdminController extends Controller
{
    public function show()
    {
        $users = User::get();
        return view('auth.admin-panel',[
            'users' => $users,
        ]);
    }

    public function delete(Request $request)
    {
        $user_id = $request->user_id;
        User::where('id', $user_id)->delete();
        return redirect('/admin/panel')->with('message', 'User Deleted');
    }
}
