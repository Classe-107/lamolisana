<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request): View
    {
        //dd($request->query());
        if (!empty($request->query('search'))) {
            $search = $request->query('search');
            $products = Product::where('type', $search)->get();

        } else {
            $products = Product::all();
        }

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
    public function store(StoreProductRequest $request)
    {
        //dd($request->all());
        //prendo i dati del form dalla request

        // $request->validate([
        //     'title' => 'required|min:5|max:255|unique:products',
        //     'type' => 'required|max:50',
        //     'cooking_time' => 'required|max:30',
        //     'weight' => 'required|max:30',
        //     'image' => 'url'
        // ]);

        // $formData = $this->validation($request->all());
        //creo un nuovo prodotto
        //$newProduct = new Product();
        //assegno i valori del form al nuovo prodotto
        //$newProduct->fill($formData);
        //salvo il nuovo prodotto
        //$newProduct->save();
        $formData = $request->validated();
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
    public function update(UpdateProductRequest $request, Product $product)
    {
        // $request->validate([
        //     'title' => 'required|min:5|max:255|unique:products',
        //     'type' => 'required|max:50',
        //     'cooking_time' => 'required|max:30',
        //     'weight' => 'required|max:30',
        //     'image' => 'url'
        // ]);
        //$formData = $request->all();
        //$formData = $this->validation($request->all());
        // $product->title = $formData['title'];
        // $product->description = $formData['description'];
        // $product->image = $formData['image'];
        // $product->type = $formData['type'];
        // $product->weight = $formData['weight'];
        // $product->cooking_time = $formData['cooking_time'];
        $formData = $request->validated();
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

    /**
     * Summary of validation
     *
     */
    // private function validation($data)
    // {
    //     $validator = Validator::make($data, [

    //         'title' => 'required|min:5|max:255|unique:products',
    //         'type' => 'required|max:50',
    //         'cooking_time' => 'required|max:30',
    //         'weight' => 'required|max:30',


    //     ], [
    //         'title.required' => 'Il campo titolo è obbligatorio',
    //         'title.min' => 'Il campo titolo deve avere almeno :min caratteri',
    //         'title.max' => 'Il campo titolo deve avere massimo :max caratteri',
    //         'type.required' => 'Il tipo è obbligatorio.',
    //         'type.max' => 'Il tipo non può superare i :max caratteri.',
    //         'cooking_time.required' => 'Il tempo cottura è obbligatorio.',
    //         'cooking_time.max' => 'Il tempo cottura non può superare i :max caratteri.',
    //         'weight.required' => 'Il peso è obbligatorio.',
    //         'weight.max' => 'Il peso non può superare i :max caratteri.',

    //     ])->validate();

    //     return $validator;
    // }
}
