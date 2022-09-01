@if(count($makaleler)>0)
    @foreach($makaleler as $icerik)
        <div class="post-preview">
            <h2 class="post-title">{{$icerik->baslik}}</h2>
            <img src="{{asset('/img/img_makale/'.$icerik->resim)}}" width="600" alt="{{asset($icerik->baslik)}}">
            <a href="{{route('makale',[$icerik->getKategori->slug,$icerik->slug_baslik])}}">
                <h3 class="post-subtitle">
                    {{Illuminate\Support\STR::limit($icerik->makale,strpos($icerik->makale," ",40))}}
                </h3>
            </a>
            <p class="post-meta text-danger">
                Yazar: <b>{{$icerik->yazar}}</b><br>
                Kategori: <b>{{$icerik->getKategori->name}}</b><br>
                Okunma Sayısı: <b>{{$icerik->tiklanma}}</b><br>
                Paylaşım: <b>{{$icerik->created_at->diffForHumans()}}</b>
            </p>
        </div>
        @if(!$loop->last)
            <hr class="my-4"/>
        @endif
    @endforeach
    {{--{{$makaleler->links()}}--}}
@else
    <div class="alert alert-danger">
        <h1>Bu kategoriye ait yazı bulunamadı...!!!</h1>
    </div>
@endif

