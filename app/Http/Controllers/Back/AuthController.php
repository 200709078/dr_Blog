<?php /** @noinspection ALL */

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('back.auth.login');
    }

    public function loginPost(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            toastr()->success('Tekrar hoşgeldiniz ' . Auth::user()->name, 'made by mADEMatik design.');
            return redirect()->route('admin.dashboard');
            die();
        }
        return redirect()->route('admin.login')->withErrors('Email adresinizi veya şifrenizi hatalı girdiniz.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
