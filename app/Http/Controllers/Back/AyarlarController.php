<?php /** @noinspection ALL */

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\AyarlarModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AyarlarController extends Controller
{
    public function index()
    {
        $ayarlar['ayarlar'] = AyarlarModel::find(1);
        return view('back.ayar.index', $ayarlar);
    }

    public function ayarlarGuncelle(Request $request)
    {
        $ayar = AyarlarModel::find(1);
        $ayar->baslik = $request->baslik;
        $ayar->instagram = $request->instagram;
        $ayar->youtube = $request->youtube;
        $ayar->facebook = $request->facebook;
        $ayar->twitter = $request->twitter;
        $ayar->whatsapp = $request->whatsapp;

        if ($request->hasFile('logo')) {
            $logo = Str::slug($request->baslik) . "-logo." . $request->logo->getClientOriginalExtension();
            $request->logo->move(public_path('img'), $logo);
            $ayar->logo = $logo;
        }
        if ($request->hasFile('favicon')) {
            $favicon = Str::slug($request->baslik) . "-favicon." . $request->favicon->getClientOriginalExtension();
            $request->favicon->move(public_path('img'), $favicon);
            $ayar->favicon = $favicon;
        }
        $ayar->save();

        toastr()->success('Ayarlarınız güncellendi.', 'mADEMatik');
        return redirect()->back();
    }
}
