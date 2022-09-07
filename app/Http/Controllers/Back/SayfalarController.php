<?php /** @noinspection ALL */

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\KategorilerModel;
use App\Models\SayfalarModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SayfalarController extends Controller
{
    public function sayfaDuzenleme($id)
    {
        $sayfa['sayfalar'] = SayfalarModel::whereId($id)->first();
        return view('back.sayfalar.update', $sayfa);
    }

    public function sayfaGuncelleme(Request $request, $id)
    {
        $request->validate([
            'baslik' => 'required|min:5',
            'resim' => 'image|mimes:jpeg,jpg,png|max:2048',
            'icerik' => 'required',
            'sira' => 'required',
        ]);

        $sayfa = SayfalarModel::find($id);
        $sayfa->baslik = $request->baslik;
        $sayfa->slug_baslik = Str::slug($request->baslik);
        $sayfa->icerik = $request->icerik;
        $sayfa->sira = $request->sira;

        if ($request->hasFile('resim')) {
            $resimadi = Str::slug($request->baslik) . "." . $request->resim->getClientOriginalExtension();
            $request->resim->move(public_path('img/img_sayfa'), $resimadi);
            $sayfa->resim = $resimadi;
        }
        $sayfa->save();

        toastr()->success('Sayfanız güncellendi.', 'mADEMatik');
        return redirect()->route('admin.sayfalar.index');
    }

    public function sayfaSilme($id)
    {
        SayfalarModel::find($id)->delete($id);
        toastr()->success('Sayfanız geri dönüşüm kutusuna taşındı.', 'mADEMatik');
        return redirect()->route('admin.sayfalar.index');
    }

    public function geriDonusum()
    {
        $sayfalar['sayfalar'] = SayfalarModel::onlyTrashed()->orderBy('deleted_at', 'DESC')->get();;
        return view('back.sayfalar.trashed', $sayfalar);
    }

    public function geriAl($id)
    {
        $sayfa = SayfalarModel::onlyTrashed()->find($id);
        $sayfa->deleted_at = null;
        $sayfa->save();
        toastr()->success('Sayfanız geri dönüşüm kutusundan geri alındı.', 'mADEMatik');
        return redirect()->route('admin.sgeridonusumoku');
    }

    public function sayfaOkuma()
    {
        $sayfalar['sayfalar'] = SayfalarModel::orderBy('created_at', 'DESC')->get();
        return view('back.sayfalar.index', $sayfalar);
    }

    public function sayfaOlusturma()
    {
        $kategoriler['kategoriler'] = KategorilerModel::all();
        $sayfalar['sayfalar'] = SayfalarModel::orderBy('created_at', 'DESC')->get();
        return view('back.sayfalar.create', $kategoriler, $sayfalar);
    }

    public function sayfaKaydetme(Request $request)
    {
        $request->validate([
            'baslik' => 'required|min:5',
            'resim' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'icerik' => 'required',
            'sira' => 'required',
        ]);

        $sayfa = new SayfalarModel();
        $sayfa->baslik = $request->baslik;
        $sayfa->slug_baslik = Str::slug($request->baslik);
        $sayfa->icerik = $request->icerik;
        $sayfa->sira = $request->sira;

        if ($request->hasFile('resim')) {
            $resimadi = Str::slug($request->baslik) . "." . $request->resim->getClientOriginalExtension();
            $request->resim->move(public_path('img/img_sayfa'), $resimadi);
            $sayfa->resim = $resimadi;
        }
        $sayfa->save();

        toastr()->success('Sayfanız oluşturuldu.', 'mADEMatik');

        return redirect()->route('admin.sayfalar.index');
    }
}
