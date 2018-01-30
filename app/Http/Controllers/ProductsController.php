<?php
namespace App\Http\Controllers;
use App\Product;
use Image;
use File;
use Auth;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function __construct()
    {
        if(Auth::user() == 'admin'){
             $this->middleware('auth');
        }
        return redirect()->back();
            
    }
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
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'required|image'
        ]);
        $product = new Product;
        $product_image = $request->image;
        $product_image_new_name = time() . $product_image->getClientOriginalName();
        Image::make($product_image)->resize(300,300)->save();
        $product_image->move('uploads/products', $product_image_new_name);

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->image = 'uploads/products/' . $product_image_new_name;

        $product->save();
        flash('Product created');
        return redirect()->route('products.index');
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
        return view('products.edit', ['product' => Product::find($id) ]);
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
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'image'
        ]);

        $product = Product::find($id);
        
        if($request->hasFile('image'))
        {
            $image = $request->image;
            $image_new_name = time() . '.' . $image->getClientOriginalName();
            Image::make($image)->resize(300,300)->save();
            $image->move('uploads/products', $image_new_name);
            
            $oldImageName = $product->image; //delete old file from folder
            if(File::exists($oldImageName)){
                File::delete($oldImageName);
            }
            $product->image = 'uploads/products/' . $image_new_name; //update the database
             
        }
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;

        $product->save();
        flash('Product updated.');
        return redirect()->route('products.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        if(file_exists($product->image))
        {
            unlink($product->image);
        }
        $product->delete();
        flash('Product deleted.');
        return redirect()->back();
    }
}