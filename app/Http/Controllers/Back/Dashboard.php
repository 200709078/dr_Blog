<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\KategorilerModel;
use App\Models\MakalelerModel;
use App\Models\SayfalarModel;

class Dashboard extends Controller
{
    public function index()
    {
        $degiskenler['sayfasayisi'] = SayfalarModel::all()->count();;
        $degiskenler['makalesayisi'] = MakalelerModel::all()->count();;
        $degiskenler['kategorisayisi'] = KategorilerModel::all()->count();;

        $sayfalar['sayfalar'] = SayfalarModel::all();
        $makaleler['makaleler'] = MakalelerModel::all();
        $kategoriler['kategoriler'] = KategorilerModel::all();

        return view('back.dashboard', $degiskenler);
    }
}
