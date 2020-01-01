@extends('layouts.app')

@section('title')
    Home
@endsection

@section('up-content')
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        @php
            $first = true;
        @endphp
        @foreach ($slideshows as $slideshow)
            <div class="carousel-item {{$first ? 'active' : ''}}">
                <img class="d-block w-100" src="{{asset('storage/'.$slideshow->image)}}" alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5>{{$slideshow->title}}</h5>
                    <p class="card-text">{{substr(strip_tags($slideshow->body), 0, 250)}}</p>
                    <a href="" class="btn btn-lg btn-block btn-primary">Baca Selengkapnya</a>
                </div>
            </div>
            @php
                $first = false;
            @endphp
        @endforeach
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
@endsection

@section('content')

<style>
.card-img-overlay-custom {
  position: absolute;
  top: 0;
  right: 0;
  /* bottom: 0; */
  left: 0;
  padding: 1.25rem;
}
</style>
<div class="row mt-3">
    <div class="col-sm-8">
        <h2>Kegiatan Acara dan Berita</h2>
        <hr />
        @foreach ($posts as $post)
        <div class="card mb-2">
            <img class="card-img-top" src="{{asset('storage/'.$post->image)}}" alt="{{$post->title}}">
            <div class="card-img-overlay-custom">
                <div class="row">
                    <div class="col-md-4">
                        <p class="mt-2 ml-2 mr-2 text-center bg-danger text-light"><b>{{$post->category ? $post->category->name : ''}}</b></p>
                    </div>
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4">
                        <p class="mt-2 ml-2 mr-2 text-center bg-primary text-light text-right">{{$post->published}}</p>
                    </div>
                </div>    
            </div>

            <div class="card-body">
                
                <a href="{{URL::to('/'.$post->slug)}}">
                    <h3 class="mt-1 card-title">{{$post->title}}</h3>
                </a>
                
                <p class="card-text">{{substr(strip_tags($post->body), 0, 250)}}</p>
                <a href="{{URL::to('/'.$post->slug)}}" class="btn btn-block btn-primary">Baca Selengkapnya >></a>
            </div>
            
        </div>
        @endforeach

    </div>

    <div class="col-sm-4">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <h4>Category</h4>
            </li>
            @foreach ($categories as $category)
            <li class="list-group-item">{{$category->name}}</li>
            @endforeach

        </ul>
    </div>
    
    <div class="col-md-12">
        {{$posts->links()}}
    </div>
    
</div>
@endsection
