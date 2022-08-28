<?php

namespace App\Http\Controllers;

use App\Models\AyarlarModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Ayarislemleri extends Controller
{
    public function ayarEkle()
    {
        if (Auth::check()) {
            AyarlarModel::create([
                "baslik" => "DR. METEHAN ÖZDEMİR",
                "logo" => "home-bg.jpg",
                "favicon" => "favicon.ico",
                "instagram" => "https://www.instagram.com/",
                "youtube" => "https://www.youtube.com/",
                "facebook" => "https://tr-tr.facebook.com/",
                "twitter" => "https://twitter.com/",
            ]);
        }
    }
}
