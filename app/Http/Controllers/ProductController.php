<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Resources\ProductResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

use App\Models\Category;
use App\Models\Product;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    use HttpResponse;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
      $products= Product::all();
      return $this->success(ProductResource::collection($products),'success');
    }



    public function view_products()
    {
      $products = Product::all();

      return view('pages.product',compact('products'));
    }










    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();

        return view('pages.create_product',compact('category'));
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {

        $validated = $request->validated();

        $filename = $request->file('image')->store('public/images');
        $imageUrl = Storage::url($filename);


        Product::create([
            'name' => $request->input('name'),
            'price' => $request->price,
            'desc' => $request->desc,
            'image' => $imageUrl,
            'category_id'=> $request->category_id
        ]);



         return redirect()->route('page_products');


    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */


    public function show($id)
    {
        $product = Product::findOrFail($id);
        return $this->success($product);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
       $product = Product::find($id);
       $category = Category::all();
      return view('pages.edit_product',compact('product','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request )
    {

            Product::destroy($request->id);

                $validated = $request->validate([
                'name' => 'required|max:55',
                'price' => 'required',
                'desc'=>'required|max:200',
                'image' => 'required',
                'category_id' =>'required'
            ]);
            $filename = $request->file('image')->store('public/images');
            $imageUrl = Storage::url($filename);
            Product::create([
            'name' => $request->input('name'),
            'price' => $request->price,
            'desc' => $request->desc,
            'image' => $imageUrl,
            'category_id'=> $request->category_id
        ]);
         return redirect()->route('page_products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

       Product::destroy($id);
        return redirect()->route('page_products');
    }
}
