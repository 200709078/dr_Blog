<?php /** @noinspection ALL */

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\KategorilerModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KategorilerController extends Controller
{
    public function index()
    {
        $kategoriler['kategoriler'] = KategorilerModel::all();
        return view('back.kategoriler.index', $kategoriler);
    }

    public function yenikategoriEkle(Request $request)
    {
        $isExist = KategorilerModel::whereSlug(Str::slug($request->kategori))->first();
        if ($isExist) {
            toastr()->warning($request->kategori . ' isimli bir kategori zaten var..', 'made by mADEMatik design');
            return redirect()->back();
        }
        $kategori = new KategorilerModel();
        $kategori->name = $request->kategori;
        $kategori->slug = Str::slug($request->kategori);
        $kategori->save();
        toastr()->success('Kategori Eklendi.', 'made by mADEMatik design');
        return redirect()->back();
    }

    public function kategoriSil($say, $id)
    {
        if($say>0){
            toastr()->success('Bu kategoriye ait makale olduğundan silinemez.', 'made by mADEMatik design');
            return redirect()->back();
        }else{
            KategorilerModel::find($id)->delete($id);
            toastr()->success('Kategori silindi.', 'made by mADEMatik design');
            return redirect()->route('admin.kategori.index');
        }

    }
}
