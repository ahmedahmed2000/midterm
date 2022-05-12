<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index()
    {
        $products = Product::all();
        return view('all_product', compact('products'));
    }
    public function store(Request $request )
    {
        Product::create([
            'name' => $request->name,
            'category' => $request->category,
            'price' => $request->price,
            'price' => $request->price,

        ]);
        return view('create_product');
    }
    public function destroy($id)
    {
        $product = Product::findOrFail($id);// with primary keyval
  $product->destroy($id);
  return redirect()->route("product.index");
    }
    public function edit($id){
        $product = product::find($id);
        $products = product::all();
        //return view('edit' , ['data' => $data]);
        return view('edit' , compact('products' , 'product'));
      }


      public function update(Request $request){
      // $validated = $request->validated();
      // $validated = $request->safe()->only(['name']);
      //   $validated = $request->safe()->except(['name']);
        $data   = product::find($request->id);
        $data->name =  $request->name;
        $data->category =  $request->category;
        $data->price =  $request->price;
        $data->quntity =  $request->quntity;
        $data->updated_at =  now();
        $data->save();
        //return $req->input();
        return redirect()->route("product.index");



      }
}
