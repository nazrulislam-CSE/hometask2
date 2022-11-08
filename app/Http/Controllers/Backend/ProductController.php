<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Session;
use Hash;
use Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->get();
        return view('backend.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'product_image' => 'required'
        ]);

        // dd($request->all());

        $images = $request->file('product_image');
        // dd($images);
        foreach ($images as $img) {
            $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(100,80)->save('uploads/products/'.$make_name);
            $uploadPath = 'uploads/products/'.$make_name;

            Product::insert([
                'product_image' => $uploadPath,

            ]);
        }

        $notification = array(
            'message' => 'Product Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('product.index')->with($notification);

    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Product::find($id);
        return view('backend.product.edit', compact('products'));
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

        $product = Product::findOrFail($id);

         /* ==========  start product profile logo ============ */
        if($request->hasfile('product_image')){
            try {
                if(file_exists($product->product_image)){
                    unlink($product->product_image);
                }
            } catch (Exception $e) {
                
            }
            $image = $request->file('product_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(100,80)->save('uploads/products/'.$name_gen);
            $product_image = 'uploads/products/'.$name_gen; 
        }
        /* ==========  end product profile logo ============ */

        $product->product_image  = $product_image;
        $product->status  = $request->status;
        $product->save();

        Session::flash('success','Product Updated Successfully.');
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        try {
            if(file_exists($product->product_image)){
                unlink($product->product_image);
            }
        }catch (Exception $e) {
            
        }
        
        $product->delete();

        Session::flash('success','Product Parmanently Deleted Successfully.');
        return redirect()->back();
    }

    public function active($id){
        $product = Product::find($id);
        $product->status = 1;
        $product->save();

        Session::flash('success','Product Active Successfully.');
        return redirect()->back();
    }

    public function inactive($id){
        $product = Product::find($id);
        $product->status = 0;
        $product->save();

        Session::flash('success','Product Disabled Successfully.');
        return redirect()->back();
    }
}
