@extends('layouts.app')

@section('title', 'Home')

@section('content')
<main>
    <section class="container">
        <h1>La Molisana </h1>
        <div class="row gy-4">
          <div class="col">
            <ul>
                @foreach ($products as $product)
                    <li>
                        <a href="{{route('products.show', $product->id)}}">{{$product->title}}</a>
                    </li>

                @endforeach
            </ul>
          </div>
        </div>

    </section>

</main>

@endsection
