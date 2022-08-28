<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\KategorilerModel;
use App\Models\MakalelerModel;
use App\Models\SayfalarModel;
use App\Models\MesajlarModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class Homepage extends Controller
{
    public function __construct()
    {
        view()->share('sayfalar', SayfalarModel::orderBy('sira', 'ASC')->get());
        view()->share('kategoriler', KategorilerModel::orderBy('name', 'ASC')->get());
    }

    public function index()
    {
        $data['makaleler'] = MakalelerModel::orderBy('created_at', 'ASC')->get(); //->paginate(2);
        return view('front.homepage', $data);
    }

    public function makaleTek($kategori, $slug_baslik)
    {
        $kategori = KategorilerModel::whereSlug($kategori)->first() ?? abort(403, "Böyle bir makale bulunamadı...!!!");
        $icerik = MakalelerModel::whereSlug_baslik($slug_baslik)->whereKategori_id($kategori->id)->first() ?? abort(403, "Böyle bir makale bulunamadı...!!!");
        $icerik->increment('tiklanma');
        $data['makale'] = $icerik;
        return view('front.makale', $data);
    }

    public function kategoriListe($slug)
    {
        $kategori = KategorilerModel::whereSlug($slug)->first() ?? abort(403, "Böyle bir kategori bulunamadı...!!!");
        $data['kategori'] = $kategori;
        $data['makaleler'] = MakalelerModel::whereKategori_id($kategori->id)->orderBy('created_at', 'DESC')->get(); //->paginate(2);
        return view('front.kategori', $data);
    }

    public function sayfa($slug_baslik)
    {
        $sayfa = SayfalarModel::whereSlug_baslik($slug_baslik)->first() ?? abort(403, "Böyle bir sayfa bulunamadı...!!!");
        $data['sayfa'] = $sayfa;
        return view('front.sayfa', $data);
    }

    public function iletisim()
    {
        return view("front.iletisim");
    }

    public function iletisimPost(Request $request)
    {
        $mesaj = new MesajlarModel();
        $mesaj->adsoyad = $request->adsoyad;
        $mesaj->email = $request->email;
        $mesaj->telefon = $request->telefon;
        $mesaj->konu = $request->konu;
        $mesaj->mesaj = $request->mesaj;
        $mesaj->save();

/*        Mail::raw($request->mesaj, function ($message) use ($request) {
            $message->from($request->email, $request->adsoyad);
            $message->to('ademvarol0808@hotmail.com', 'Adem VAROL');
            $message->subject($request->konu);
        });*/

        return redirect('iletisim')->with('success', ' Teşekkürler mesajınız bize iletildi...');
    }

}
