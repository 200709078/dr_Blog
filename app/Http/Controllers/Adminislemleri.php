<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class Adminislemleri extends Controller
{
    public function adminEkle()
    {
        if(Auth::check()){
            Admin::create([
                "name" => "Adem VAROL",
                "email" => "aaa@mail.com",
                "password" => bcrypt(111),
            ]);
            return view('back.dashboard');
        }
        return view('back.auth.login');
    }
}
