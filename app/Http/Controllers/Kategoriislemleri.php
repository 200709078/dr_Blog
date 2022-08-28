<?php

namespace App\Http\Controllers;

use App\Models\KategorilerModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Kategoriislemleri extends Controller
{
    public function kategoriekle()
    {
        if (Auth::check()) {
            $kategoriler = ["Eğlence", "Bilişim", "Gezi", "Teknoloji", "Sağlık", "Spor", "Günlük Yaşam"];
            foreach ($kategoriler as $item) {
                KategorilerModel::create([
                    "name" => $item,
                    "slug" => Str::slug($item),
                ]);
            }

            return view('back.dashboard');
        }
        return view('back.auth.login');
    }
}
