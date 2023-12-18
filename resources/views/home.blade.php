@extends('layouts.app')

@section('title', 'Home')

@section('content')
<main>
    <section class="container">
        <h1>Products</h1>
        <div class="row">
            @foreach ($products as $product)


            <div class="col-12 col-md-4 col-lg-3">
                <div class="card">
<img src="{{$product['src']}}" alt="{{$product['titolo']}}">
                </div>
            </div>
                  @endforeach
        </div>

    </section>

</main>

@endsection
