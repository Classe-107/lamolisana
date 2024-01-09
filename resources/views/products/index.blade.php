@extends('layouts.app')

@section('title', 'Products')

@section('content')
<main>
    <section class="container"  id="products">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Products</h1>
            <a href="{{route('products.create')}}" class="btn btn-primary">Crea Nuovo prodotto</a>
        </div>
        @if (session()->has('message'))
            <div class="alert alert-success">{{ session()->get('message') }}</div>
        @endif


        <div class="row gy-4">
          @foreach ($products as $key => $product)
            <div class="col-12 col-md-4 col-lg-3">
                <div class="card">
                    <img src="{{$product->image}}" alt="{{$product->title}}" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">{{$product->title}}</h5>
                        <p class="card-text">{!! substr($product->description, 0, 100) . '...' !!}</p>
                        <a href="{{route('products.show', $product->id)}}" class="btn btn-primary">Show detail</a>
                        <form action="{{route('products.destroy', $product->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Remove</button>
                        </form>

                    </div>
                </div>
            </div>

          @endforeach
        </div>

    </section>

</main>

@endsection
