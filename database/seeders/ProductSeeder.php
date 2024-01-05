<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $data = config('db.products');
        //dd($data);
        foreach ($data as $product) {
            $new_product = new Product();
            $new_product->title = $product['titolo'];
            $new_product->description = $product['descrizione'];
            $new_product->weight = $product['peso'];
            $new_product->cooking_time = $product['cottura'];
            $new_product->image = $product['src'];
            $new_product->type = $product['tipo'];
            $new_product->save();
        }
    }
}
