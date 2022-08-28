<?php

namespace App\Http\Controllers;

use App\Models\MakalelerModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Makaleislemleri extends Controller
{
    public function makaleekle()
    {
        if (Auth::check()) {
            MakalelerModel::create([
                "kategori_id" => 1,
                "baslik" => "Ozon Tedavisi",
                "slug_baslik" => Str::slug("Ozon Tedavisi"),
                "makale" => "Ozon Tedavisi aaaaaaaaa ssss   ffff  ffff ggggg hhhhhhhh kkkkk ttt eeeeee ffffffff gggggg yyyy",
                "yazar" => "Dr. Metehan ÖZDEMİR",
                "tiklanma" => 0,
                "resim" => "makale1.jpg",
            ]);

            MakalelerModel::create([
                "kategori_id" => 2,
                "baslik" => "Kalp",
                "slug_baslik" => Str::slug("Kalp"),
                "makale" => "Kalp Krizi aaaaaaaaa ssss   ffff  ffff ggggg hhhhhhhh kkkkk ttt eeeeee ffffffff gggggg yyyy",
                "yazar" => "Dr. İsmail SAVAŞ",
                "tiklanma" => 0,
                "resim" => "makale2.jpg",
            ]);

            MakalelerModel::create([
                "kategori_id" => 3,
                "baslik" => "Böbrek Hastalıkları",
                "slug_baslik" => Str::slug("Böbrek Hastalıkları"),
                "makale" => "Böbrek Hastalıkları aaaaaaaaa ssss   ffff  ffff ggggg hhhhhhhh kkkkk ttt eeeeee ffffffff gggggg yyyy",
                "yazar" => "Dr. Mustafa KARA",
                "tiklanma" => 0,
                "resim" => "makale3.jpg",
            ]);

            MakalelerModel::create([
                "kategori_id" => 4,
                "baslik" => "Dalak Hastalıkları",
                "slug_baslik" => Str::slug("Dalak Hastalıkları"),
                "makale" => "Dalak Hastalıkları aaaaaaaaa ssss   ffff  ffff ggggg hhhhhhhh kkkkk ttt eeeeee ffffffff gggggg yyyy",
                "yazar" => "Dr. Adem VAROL",
                "tiklanma" => 0,
                "resim" => "makale4.jpg",
            ]);
            return view('back.dashboard');
        }
        return view('back.auth.login');
    }
}
