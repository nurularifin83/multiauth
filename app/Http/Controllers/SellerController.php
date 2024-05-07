<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SellerController extends Controller
{
    public function Index()
    {
        return view('seller.seller_login');
    }

    public function Login(Request $request)
    {
        $check = $request->all();
        if(Auth::guard('seller')->attempt(['email' => $check['email'], 'password' => $check['password']]))
        {
            return redirect()->route('seller.dashboard')->with('error', 'Seller login successfully!');
        }
        else
        {
            return redirect()->back()->with('error', 'Email and Password is incorrect!');
        }
    }

    public function Dashboard()
    {
        return view('seller.index');
    }

    public function SellerLogout()
    {
        Auth::guard('seller')->logout();
        return redirect()->route('login_form')->with('error','Logout successfully');
    }

    public function SellerRegister()
    {
        return view('seller.seller_register');
    }

    public function SellerRegisterCreate(Request $request)
    {
        Seller::insert([
            'name' => $request->name,
            'email' => $request->email,
            'username' => 'seller-'.Str::random(3),
            'password' => Hash::make($request->password),
            'created_at' => Carbon::now()
        ]);

        return redirect()->route('login_form')->with('error','Seller user successfully created!');
    }
}