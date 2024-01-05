@extends('layouts.app')

@section('title', 'Products')

@section('content')
<main>
    <section class="container">
        <h1>Products</h1>
        <div class="row gy-4">
          @foreach ($products as $key => $product)
            <div class="col-12 col-md-4 col-lg-3">
                <div class="card">
                    <img src="{{$product->image}}" alt="{{$product->title}}" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">{{$product->title}}</h5>
                        <p class="card-text">{!! substr($product->description, 0, 100) . '...' !!}</p>
                        <a href="{{route('products.show', $product->id)}}" class="btn btn-primary">Vedi dettaglio</a>
                    </div>
                </div>
            </div>

          @endforeach
        </div>

    </section>

</main>

@endsection
