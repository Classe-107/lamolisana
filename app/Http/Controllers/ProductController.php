<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     */
    public function store(Request $request)
    {
        //dd($request->all());
        //prendo i dati del form dalla request

        $request->validate([
            'title' => 'required|min:5|max:255|unique:products',
            'type' => 'required|max:50',
            'cooking_time' => 'required|max:30',
            'weight' => 'required|max:30',
        ]);

        $formData = $request->all();
        //creo un nuovo prodotto
        //$newProduct = new Product();
        //assegno i valori del form al nuovo prodotto
        //$newProduct->fill($formData);
        //salvo il nuovo prodotto
        //$newProduct->save();

        $newProduct = Product::create($formData);
        //reindirizzo l'utente alla pagina del nuovo prodotto appena creato
        return to_route('products.show', $newProduct->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\View\View
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     *
     */
    public function edit(Product $product)
    {

        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     *
     */
    public function update(Request $request, Product $product)
    {
        $formData = $request->all();
        // $product->title = $formData['title'];
        // $product->description = $formData['description'];
        // $product->image = $formData['image'];
        // $product->type = $formData['type'];
        // $product->weight = $formData['weight'];
        // $product->cooking_time = $formData['cooking_time'];
        $product->fill($formData);
        $product->update();
        return to_route('products.show', $product->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     *
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return to_route('products.index')->with('message', "Il prodotto $product->title è stato eliminato");
    }
}
