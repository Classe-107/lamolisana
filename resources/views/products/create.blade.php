@extends('layouts.app')

@section('title', 'Crea nuovo prodotto')

@section('content')
<main>
    <section class="container">
        <h1>Add new product</h1>
        <div class="row gy-4">

            <div class="col-12">
                <div class="card">
                    <form action="{{route('products.store')}}" method="POST">
                        @csrf
                        <div class="mb-3 mx-3">
                            <label for="title" class="form-label">Title:</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="insert title" required>
                        </div>
                         <div class="mb-3 mx-3">
                            <label for="description" class="form-label">Description:</label>
                            <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                         <div class="mb-3 mx-3">
                            <label for="image" class="form-label">Image:</label>
                            <input type="url" class="form-control" id="image" name="image" placeholder="insert image url">
                        </div>
                        <div class="mb-3 mx-3">
                            <label for="type" class="form-label">Type:</label>
                            <select name="type" id="type" class="form-select" required>
                                <option value="lunga">Lunga</option>
                                <option value="corta">Corta</option>
                                <option value="cortissima">Cortissima</option>
                            </select>
                        </div>
                        <div class="mb-3 mx-3">
                            <label for="weight" class="form-label">Weight:</label>
                            <input type="text" class="form-control" id="weight" name="weight" placeholder="insert weight" required>
                        </div>
                        <div class="mb-3 mx-3">
                            <label for="cooking_time" class="form-label">Cooking time:</label>
                            <input type="text" class="form-control" id="cooking_time" name="cooking_time" placeholder="insert cooking_time" required>
                        </div>
                        <div class="mb-3 mx-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                    </form>

                </div>
            </div>


        </div>

    </section>

</main>

@endsection
