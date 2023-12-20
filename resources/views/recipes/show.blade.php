@extends('layouts.app')

@section('title', $recipe['title'])

@section('content')
<main>
    <section class="container">
        <h1>Recipes</h1>
        <div class="row gy-4">

            <div class="col-12">
                <div class="card">
                    <img src="{{$recipe['image']}}" alt="{{$recipe['title']}}" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">{{$recipe['title']}}</h5>
                        <p class="card-text">{!! $recipe['instructions'] !!}</p>

                    </div>
                </div>
            </div>


        </div>

    </section>

</main>

@endsection
