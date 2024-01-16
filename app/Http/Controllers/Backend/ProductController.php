<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::get();
        return view('backend.product.index',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $product = new Product;
            $product->oem_no = $request->oem_no;
            $product->name = $request->name;
            $product->model = $request->model;
            if($request->hasFile('image')){
                $imageName = rand(111,999).time().'.'.$request->image->extension();
                $request->image->move(public_path('uploads/product'), $imageName);
                $product->image=$imageName;
            }
           if($product->save()){
                $this->notice::success('Successfully saved');
                return redirect()->route('product.index');
            }
        }catch(Exception $e){
            //dd($e);
            $this->notice::error('Please try again');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::findOrFail(encryptor('decrypt',$id));
        return view('backend.product.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
            $product = Product::findOrFail(encryptor('decrypt',$id));
            $product->oem_no = $request->oem_no;
            $product->name = $request->name;
            $product->model = $request->model;
            if($request->hasFile('image')){
                $imageName = rand(111,999).time().'.'.$request->image->extension();
                $request->image->move(public_path('uploads/product'), $imageName);
                $product->image=$imageName;
            }
           if($product->save()){
                $this->notice::success('Successfully saved');
                return redirect()->route('product.index');
            }
        }catch(Exception $e){
            //dd($e);
            $this->notice::error('Please try again');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product = Product::findOrFail(encryptor('decrypt',$id));
        $image_path=public_path('uploads/product/').$data->image;
        
        if($data->delete()){
            if(File::exists($image_path)) 
                File::delete($image_path);
            
            $this->notice::warning('Deleted Permanently!');
            return redirect()->back();
        }
    }
}
