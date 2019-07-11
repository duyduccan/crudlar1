<?php

namespace App\Http\Controllers\Backend;

use App\Models\Backend\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    //
    public function index(){
        $products = DB::table('products')->paginate(4);
        $data = array();
        $data['products'] = $products;
        return view('admin.product.index', $data);
    }
    public function create(){

        return view('admin.product.create');
    }
    public function delete($id){
        $productModel = ProductModel::find($id);
        $productModel->delete();
        return redirect("/admin/products");
    }
    public function edit($id){
        $product = ProductModel::find($id);
        $data = array();
        $data['product'] = $product;
        return view('admin.product.edit',$data);
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required|min:5|max:125',
            'slug' => 'required',
            'description' => 'required'
        ]);
        $inputs = $request->all();
        $productModel = new ProductModel();
        $productModel->name = isset($inputs['name'])?$inputs['name']:"";
        $productModel->slug = isset($inputs['slug'])?$inputs['slug']:"";
        $productModel->images = isset($inputs['images'])?$inputs['images']:"";
        $productModel->description = isset($inputs['description'])?$inputs['description']:"";

        $productModel->save();

        return redirect('/admin/products');
    }
    public function update($id, Request $request){
        $request->validate([
            'name' => 'required|min:5|max:125',
            'slug' => 'required',
            'description' => 'required'
        ]);
        $inputs = $request->all();
        $productModel = new ProductModel();
        $productModel = ProductModel::find($id);
        $productModel->name = isset($inputs['name'])?$inputs['name']:"";
        $productModel->slug = isset($inputs['slug'])?$inputs['slug']:"";
        $productModel->images = isset($inputs['images'])?$inputs['images']:"";
        $productModel->description = isset($inputs['description'])?$inputs['description']:"";

        $productModel->save();

        return redirect('/admin/products');
    }
}
