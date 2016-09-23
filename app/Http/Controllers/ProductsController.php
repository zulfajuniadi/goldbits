<?php

namespace App\Http\Controllers;

use App\Product;
use DNS2D;
use Illuminate\Http\Request;
use Twitter;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('products.index', ['products' => Product::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Product::create($request->only([
            'name',
            'url',
            'expiry_date',
            'weekly_sales',
            'stock_quantity',
            'low_price',
            'mid_price',
            'high_price',
        ]));
        return redirect(action('ProductsController@index'));
    }

    public function show(Product $product)
    {
        $name = substr($product->name, 0, 8);
        $product->barcode = DNS2D::getBarcodePNG("{$product->id};{$name};{$product->price};{$product->expiry_date}", "QRCODE", 10, 10);
        return $product;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->update($request->only([
            'name',
            'url',
            'expiry_date',
            'weekly_sales',
            'stock_quantity',
            'price',
            'low_price',
            'mid_price',
            'high_price',
        ]));
        return redirect(action('ProductsController@index'));
    }

    public function flashSales(Request $request, Product $product)
    {
        $product->update([
            'price' => $product->price * 0.7,
        ]);
        Twitter::postTweet(['status' => 'Happy Belly Flash Sales! Today only RM' . number_format($product->price, 2) . ' for ' . $product->name . '! #awesomehb', 'format' => 'json']);
        return redirect(action('ProductsController@index'));
    }

    public function barcodes()
    {
        $products = Product::all();
        return view('welcome', compact('products'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::findOrfail($id)->delete();
        return redirect(action('ProductsController@index'));
        //
    }
}
