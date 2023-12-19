@extends('layouts.app')

@section('title', 'Recipes')

@section('content')
<main>
    <section class="container">
        <h1>Recipies</h1>
        <div class="row gy-4">
          @foreach ($recipes as $item)
            <div class="col-12 col-md-4 col-lg-3">
                <div class="card">
                    <img src="{{$item['image']}}" alt="{{$item['title']}}" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">{{$item['title']}}</h5>
                        <p class="card-text">{!! substr($item['instructions'], 0, 100) . '...' !!}</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>

          @endforeach
        </div>

    </section>

</main>

@endsection
