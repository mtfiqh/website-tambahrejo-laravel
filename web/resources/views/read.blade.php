@extends('layouts.app')

@section('up-content')
    
@endsection
@section('title')
    {{$post->title}}
@endsection
@section('content')
<style>
    .card-body img {
        padding: 0.25rem;
        background-color: #f8fafc;
        border: 1px solid #dee2e6;
        border-radius: 0.25rem;
        max-width: 50%;
        height: auto;
    }
    hr {
        margin-top: 1rem;
        margin-bottom: 1rem;
        border: 0;
        border-top: 2px solid rgba(0, 0, 0, 0.1);
    }
</style>
    <div class="card mt-3 mb-3">
        @if($post->image)
            <img class="card-img-top" src="{{asset('storage/'.$post->image)}}" alt="{{$post->title}}">
        @endif
        <div class="card-body">
            {{-- <hr/> --}}
            {{-- <hr> --}}
            <strong>Share: </strong>
            <a style="color:#3b5998;" class="ml-2" href="http://www.facebook.com/sharer/sharer.php?u={{URL::to($post->slug)}}"><i class="fab fa-facebook-f"></i></a>
            <a style="color:#38a1f3;" class="ml-2" href="https://twitter.com/intent/tweet?url={{URL::to($post->slug)}}&text=Tambahrejo - {{$post->title}}"><i class="fab fa-twitter-square"></i></a>
            <a style="color:#128C7E;" class="ml-2" href=""><i class="fab fa-whatsapp"></i></a>
            <a style="color:#bd081b;" class="ml-2" href=""><i class="fas fa-print"></i></a>
            <hr/>
            {{-- <hr> --}}
            <p class="card-text"><small class="text-muted">{{$post->published}} |</small></p>
            <h1>@php echo strtoupper($post->title) @endphp</h1>
            {{-- <hr/> --}}
            <hr/>
            {!!$post->body!!}
        </div>
    </div>
@endsection

@section('additional-css')
    <script src="https://kit.fontawesome.com/84827259ef.js" crossorigin="anonymous"></script>
@endsection