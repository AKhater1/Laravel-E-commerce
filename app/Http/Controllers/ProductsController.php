<?php

namespace App\Http\Controllers;

use Session;
use App\products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    } 

    
    /**s
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //$posts = post::orderBy('created_at','desc')->get();

        //$posts = post::orderBy('created_at','desc')->take(1)->get();

        return view('products.index', ['products' => products::all()]);
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
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'description' =>'required',
            'image' => 'required|image',
        ]);

        $product = new products;

        $product_image = $request->image;
        $product_image_new_name = time() . $product_image->getClientOriginalName();
        $product_image->move('uploads/products', $product_image_new_name);

        $product -> name            = $request -> name;
        $product -> price           = $request -> price;
        $product -> description     = $request -> description;
        $product -> image           = 'uploads/products/' . $product_image_new_name;
        

        $product -> save();

        Session::flash('success', 'Product created.');

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $product = Products::find($id);

        return view('products.edit')->with('product',$product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'          => 'required',
            'price'         => 'required',
            'description'   =>'required',
        ]);

        $product = products::find($id);

        if($request->hasFile('image')) {
        $product_image = $request->image;
        $product_image_new_name = time() . $product_image->getClientOriginalName();
        $product_image->move('uploads/products', $product_image_new_name);
        $product -> image = 'uploads/products/' . $product_image_new_name;
        $product -> save();
        }

        $product -> name            = $request -> name;
        $product -> price           = $request -> price;
        $product -> description     = $request -> description;
        
        $product -> save();

        Session::flash('success', 'Product updated.');

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $product = products::find($id);

        if(file_exists($product->image)) {
            unlink($product->image);
        }

        $product -> delete();

        Session::flash('success','Done Successfully');
        return redirect()->back();
    }
}
