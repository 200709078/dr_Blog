@if(count($makaleler)>0)
@foreach($makaleler as $icerik)
    <div class="post-preview">
        <a href="{{route('makale',[$icerik->getKategori->slug,$icerik->slug_baslik])}}">
            <h2 class="post-title">{{$icerik->baslik}}</h2>
        <img src="{{asset('/img/img_makale/'.$icerik->resim)}}" width="700" alt="{{asset($icerik->baslik)}}">
        <h3 class="post-subtitle">
{{--{!! Illuminate\Support\STR::limit($icerik->makale) !!}--}}
            {{Illuminate\Support\STR::limit($icerik->makale)}}
        </h3>
        </a>
        <span class="post-meta text-danger">
            Yazar: {{$icerik->yazar}}
            Kategori:{{$icerik->getKategori->name}}
            Paylaşım: {{$icerik->created_at->diffForHumans()}}
        </span>
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

