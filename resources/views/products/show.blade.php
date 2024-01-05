@extends('layouts.app')

@section('title', 'DETTAGLIO PRODOTTO')

@section('content')
<main>
    <section class="container">
        <h1>Products</h1>
        <div class="row gy-4">

            <div class="col-12">
                <div class="card">
                    <img src="{{$product['image']}}" alt="{{$product['title']}}" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">{{$product['title']}}</h5>
                        <p class="card-text">{!! $product['description'] !!}</p>
                        <p>
                          Peso: {{$product['weight']}} | Cottura: {{$product['cooking_time']}} | Tipo: {{$product['type']}}
                        </p>
                    </div>
                </div>
            </div>


        </div>

    </section>

</main>

@endsection
