<?php
  
namespace App\Http\Controllers;
   
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
  
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    $products = Product::all();
    return view('products.index', compact('products'));

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
        $request->validate([
            'name' => 'required',
            'brand' => 'required',
            'img' => 'required|url',
            'price' => 'required',
            'quantity' => 'required',
            'status' => 'required',
        ]);
    
        $prod = new Product;
    
        $prod->name = $request->name;
        $prod->brand = $request->brand;
        $prod->img = $request->img;
        $prod->price = $request->price;
        $prod->quantity = $request->quantity;
        $prod->status = $request->status;
        $prod->user_id = auth()->id(); 
        
        $prod->save();
    
        return redirect()->route('products.index')
                        ->with('success','Product created successfully.');
    }
     
    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show',compact('product'));
    } 
     
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit',compact('product'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'brand' => 'required',
            // 'img' => 'required|url', not required
            'price' => 'required',
            'quantity' => 'required',
            'status' => 'required',
        ]);
    
        $product->update($request->all());
    
        return redirect()->route('products.index')
                        ->with('success','Product updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
    
        return redirect()->route('products.index')
                        ->with('success','Product deleted successfully');
    }


    public function saveProduct(Product $product)
{
    Auth::user()->savedProducts()->syncWithoutDetaching([$product->id]);
    return back();
}
}


