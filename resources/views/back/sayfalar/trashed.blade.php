@extends('back.layouts.master')
@section('title','SİLİNEN SAYFALAR')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold float-right text-primary">{{$sayfalar->count()}} adet sayfa bulundu.</h6>
            <a href="{{route('admin.sgeridonusumoku')}}" class="btn btn-warning btn-sm"><i class="fa fa-trash"> Geri
                    Dönüşüm Kutusu </i> </a>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable">
                    <thead>
                    <tr>
                        <th>Fotoğraf</th>
                        <th>Başlık</th>
                        <th>İçerik</th>
                        <th>Sıra</th>
                        <th>Oluşturulma Tarihi</th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Fotoğraf</th>
                        <th>Başlık</th>
                        <th>İçerik</th>
                        <th>Sıra</th>
                        <th>Oluşturulma Tarihi</th>
                        <th>İşlemler</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($sayfalar as $veri)
                        <tr>
                            <td><img src="{{asset('img/img_sayfa/'.$veri->resim)}}" width="100"></td>
                            <td>{{$veri->baslik}}</td>
                            <td>{{$veri->icerik}}</td>
                            <td>{{$veri->sira}}</td>
                            <td>{{$veri->created_at->diffForHumans()}}</td>
                            <td>
                                <a href="{{route('admin.sgerial',$veri->id)}}" title="Geri Al" class="btn btn-sm btn-success"><i class="fa fa-recycle"> </i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
