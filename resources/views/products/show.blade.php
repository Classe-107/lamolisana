@extends('layouts.app')

@section('title', 'DETTAGLIO PRODOTTO')

@section('content')
<main>
    <section class="container">
        <h1>Products</h1>
        <div class="row gy-4">

            <div class="col-12">
                <div class="card">
                    <img src="{{$product['src']}}" alt="{{$product['titolo']}}" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">{{$product['titolo']}}</h5>
                        <p class="card-text">{!! $product['descrizione'] !!}</p>
                        <p>
                          Peso: {{$product['peso']}} | Cottura: {{$product['cottura']}} | Tipo: {{$product['tipo']}}
                        </p>
                    </div>
                </div>
            </div>


        </div>

    </section>

</main>

@endsection
