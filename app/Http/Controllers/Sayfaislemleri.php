<?php
//Sayfaislemleri.php
namespace App\Http\Controllers;

use App\Models\SayfalarModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Sayfaislemleri extends Controller
{
    public function sayfaEkle()
    {
        if (Auth::check()) {
            $sayfalar = ["Vizyonumuz", "Misyonumuz", "Kariyer", "Hakkımızda"];
            $i = 0;
            foreach ($sayfalar as $item) {
                $i++;
                SayfalarModel::create([
                    "baslik" => $item,
                    "slug_baslik" => Str::slug($item),
                    "resim" => "sayfa" . $i . ".jpg",
                    "icerik" => $item . " SAYFA İÇERİĞİ BURADA YAYINLANACAK.",
                    "sira" => $i,
                ]);
            }
            return view('back.dashboard');
        }
        return view('back.auth.login');
    }
}
