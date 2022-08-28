<?php

use App\Http\Controllers\Ayarislemleri;
use App\Http\Controllers\Back\AuthController;
use App\Http\Controllers\Back\AyarlarController;
use App\Http\Controllers\Back\Dashboard;
use App\Http\Controllers\Back\KategorilerController;
use App\Http\Controllers\Back\MakalelerController;
use App\Http\Controllers\Back\SayfalarController;
use App\Http\Controllers\Makaleislemleri;
use App\Http\Controllers\Sayfaislemleri;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Kategoriislemleri;
use App\Http\Controllers\Front\Homepage;
use App\Http\Controllers\Adminislemleri;

/*BACK ROUTES*/
Route::prefix('admin')->name('admin.')->middleware('isLogin')->group(function () {
    Route::get('giris', [AuthController::class, 'login'])->name('login');
    Route::post('giris', [AuthController::class, 'loginPost'])->name('login.post');
});

Route::prefix('admin')->name('admin.')->middleware('isAdmin')->group(function () {
    Route::get('panel/index', [Dashboard::class, 'index'])->name('dashboard');
    //MAKALE ROUTELER
    Route::get("makaleler", [MakalelerController::class, 'makaleOkuma'])->name('makaleler.index');
    Route::get("makaleler/olustur", [MakalelerController::class, 'makaleOlusturma'])->name('makaleler.olustur');
    Route::post('makaleler', [MakalelerController::class, 'makaleKaydetme'])->name('makalekaydetme');
    Route::get('makaleler/makaleduzenleme/{id}', [MakalelerController::class, 'makaleDuzenleme'])->name('makaleduzenleme');
    Route::post('makaleler/guncelleme/{id}', [MakalelerController::class, 'makaleGuncelleme'])->name('makaleguncelleme');
    Route::get('makaleler/silme/{id}', [MakalelerController::class, 'makaleSilme'])->name('makalesilme');
    Route::get("makaleler/geridonusum", [MakalelerController::class, 'geriDonusum'])->name('geridonusumoku');
    Route::get("makaleler/gerial/{id}", [MakalelerController::class, 'geriAl'])->name('gerial');

    //SAYFA ROUTELER
    Route::get("sayfalar", [SayfalarController::class, 'sayfaOkuma'])->name('sayfalar.index');
    Route::get("sayfalar/olustur", [SayfalarController::class, 'sayfaOlusturma'])->name('sayfalar.olustur');
    Route::post('sayfalar', [SayfalarController::class, 'sayfaKaydetme'])->name('sayfakaydetme');
    Route::get('sayfalar/sayfaduzenleme/{id}', [SayfalarController::class, 'sayfaDuzenleme'])->name('sayfaduzenleme');
    Route::post('sayfalar/guncelleme/{id}', [SayfalarController::class, 'sayfaGuncelleme'])->name('sayfaguncelleme');
    Route::get('sayfalar/silme/{id}', [SayfalarController::class, 'sayfaSilme'])->name('sayfasilme');
    Route::get("sayfalar/geridonusum", [SayfalarController::class, 'geriDonusum'])->name('sgeridonusumoku');
    Route::get("sayfalar/gerial/{id}", [SayfalarController::class, 'geriAl'])->name('sgerial');

    //KATEGORİ ROUTELER
    Route::get("kategoriler", [KategorilerController::class, 'index'])->name('kategori.index');
    Route::post("kategoriler/ekle", [KategorilerController::class, 'yenikategoriEkle'])->name('kategori.ekle');
    Route::get("kategoriler/sil/{say}/{id}", [KategorilerController::class, 'kategoriSil'])->name('kategori.sil');

    Route::get('/ayarlar', [AyarlarController::class, 'index'])->name('ayar.index');
    Route::post('/ayarlar/guncelle', [AyarlarController::class, 'ayarlarGuncelle'])->name('ayarlar.guncelle');
    Route::get('cikis', [AuthController::class, 'logout'])->name('logout');
});

Route::get("/adminekle", [Adminislemleri::class, 'adminEkle']);
Route::get("/kategoriekle", [Kategoriislemleri::class, 'kategoriekle']);
Route::get("/makaleekle", [Makaleislemleri::class, 'makaleekle']);
Route::get("/sayfaekle", [Sayfaislemleri::class, 'sayfaEkle']);
Route::get("/ayarekle", [Ayarislemleri::class, 'ayarEkle']);


/*FRONT ROUTES*/
Route::get('/', [Homepage::class, 'index'])->name('homepage');
Route::get('/iletisim', [Homepage::class, 'iletisim'])->name('iletisim');
Route::post('/iletisimPost', [Homepage::class, 'iletisimPost'])->name('iletisimpost');
Route::get('/kategori/{slug}', [Homepage::class, 'kategoriListe'])->name('kategoriListe');
Route::get('/{kategori}/{slug_baslik}', [Homepage::class, 'makaleTek'])->name('makale');
Route::get('/{slug_baslik}', [Homepage::class, 'sayfa'])->name('sayfa');
