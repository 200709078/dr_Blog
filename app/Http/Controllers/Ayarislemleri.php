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
                "logo" => "dr-metehan-ozdemir-logo.png",
                "favicon" => "dr-metehan-ozdemir-favicon.png",
                "instagram" => "https://www.instagram.com/dr.metehanozdemir/",
                "youtube" => "https://www.youtube.com/",
                "facebook" => "https://www.facebook.com/metehan.ozdemir.543908",
                "twitter" => "https://twitter.com/",
                "whatsapp"=>"https://wa.me/905326666549?text=Selamlar",
            ]);
        }
    }
}
