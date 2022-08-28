<?php /** @noinspection ALL */

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\KategorilerModel;
use App\Models\MakalelerModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MakalelerController extends Controller
{
    public function makaleDuzenleme($id)
    {
        $kategoriler['kategoriler'] = KategorilerModel::all();
        $makale['makaleler'] = MakalelerModel::whereId($id)->first();
        return view('back.makaleler.update', $kategoriler, $makale);
    }

    public function makaleGuncelleme(Request $request, $id)
    {
        $request->validate([
            'kategori' => 'required',
            'baslik' => 'required|min:5',
            'icerik' => 'required',
            'yazar' => 'required',
            'resim' => 'image|mimes:jpeg,jpg,png|max:2048'
        ]);

        $makale = MakalelerModel::find($id);
        $makale->kategori_id = $request->kategori;
        $makale->baslik = $request->baslik;
        $makale->slug_baslik = Str::slug($request->baslik);
        $makale->makale = $request->icerik;
        $makale->yazar = $request->yazar;

        if ($request->hasFile('resim')) {
            $resimadi = Str::slug($request->baslik) . "." . $request->resim->getClientOriginalExtension();
            $request->resim->move(public_path('img/img_makale'), $resimadi);
            $makale->resim = $resimadi;
        }
        $makale->save();

        toastr()->success('Makaleniz güncellendi.', 'made by mADEMatik design.');

        return redirect()->route('admin.makaleler.index');
    }

    public function makaleSilme($id)
    {
        MakalelerModel::find($id)->delete($id);
        toastr()->success('Makaleniz geri dönüşüm kutusuna taşındı.', 'made by mADEMatik design.');
        return redirect()->route('admin.makaleler.index');
    }

    public function geriDonusum()
    {
        $makaleler['makaleler'] = MakalelerModel::onlyTrashed()->orderBy('deleted_at', 'DESC')->get();;
        return view('back.makaleler.trashed', $makaleler);
    }

    public function geriAl($id)
    {
        $makale = MakalelerModel::onlyTrashed()->find($id);
        $makale->deleted_at = null;
        $makale->save();
        toastr()->success('Makaleniz geri dönüşüm kutusundan geri alındı.', 'made by mADEMatik design.');
        return redirect()->route('admin.geridonusumoku');
    }

    public function makaleOkuma()
    {
        $makaleler['makaleler'] = MakalelerModel::orderBy('created_at', 'DESC')->get();
        return view('back.makaleler.index', $makaleler);
    }

    public function makaleOlusturma()
    {
        $kategoriler['kategoriler'] = KategorilerModel::all();
        $makaleler['makaleler'] = MakalelerModel::orderBy('created_at', 'DESC')->get();
        return view('back.makaleler.create', $kategoriler, $makaleler);
    }

    public function makaleKaydetme(Request $request)
    {
        $request->validate([
            'kategori' => 'required',
            'baslik' => 'required|min:5',
            'icerik' => 'required',
            'yazar' => 'required',
            'resim' => 'required|image|mimes:jpeg,jpg,png|max:2048'
        ]);

        $makale = new MakalelerModel();
        $makale->kategori_id = $request->kategori;
        $makale->baslik = $request->baslik;
        $makale->slug_baslik = Str::slug($request->baslik);
        $makale->makale = $request->icerik;
        $makale->yazar = $request->yazar;

        if ($request->hasFile('resim')) {
            $resimadi = Str::slug($request->baslik) . "." . $request->resim->getClientOriginalExtension();
            $request->resim->move(public_path('img/img_makale'), $resimadi);
            $makale->resim = $resimadi;
        }
        $makale->save();

        toastr()->success('Makaleniz oluşturuldu.', 'made by mADEMatik design.');

        return redirect()->route('admin.makaleler.index');
    }
}
