<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catagory;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{

    public function index(Request $request)
    {

        if ($request->ajax()) {

            $data = Product::latest()->get();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct">Edit</a>';

                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Delete</a>';

                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('productAjax');
    }

    public function view_category(){
        if(Auth::id())
        {
            $data=catagory::all();
            return view('admin.category',compact('data'));

        }
        else{
            return redirect('login');
        }
    }



    public function add_catagory(Request $request){
    $data = new catagory;
    $data->catagory_name=$request->catagory;//category tb3 l name li bel input bel admin.category
    $data->save();

    return redirect()->back()->with('msg','Category Added Successfully');

    }

public function delete_catagory($id){
$data=catagory::find($id);

$data->delete();
return redirect()->back()->with('msg','Category Deleted Successfully');
}

public function view_products(){

$catagory=catagory::all();//khaletne jib kel l data men l table catagory


   return view('admin.products',compact('catagory'));
}

public function add_product(Request $request){

    $product = new product;//mnekteba hek eza aam tekhud maalumet mena  law product::all() eza keno mawjudin
    $product->title=$request->title;
    $product->description=$request->description;
    $product->price=$request->price;
    $product->qty=$request->qty;
    $product->discount_price=$request->discount;
    $product->catagory=$request->catagory;


    $image=$request->image;
    $imagename=time().'.'.$image->getClientOriginalExtension();
    $request->image->move('product',$imagename);//product hie esm l file li byenkhala2 bel public
    $product->image=$imagename;


    $product->save();

    return redirect()->back()->with('msg','Product Added Successfully');

}

public function show_product(){
    $products=product::all();
    return view('admin.show_product',compact('products'));

}




public function delete_product($id){

 $product=product::find($id);

 $product->delete();

 return redirect()->back()->with('msg','Product Deleted Successfully');

}

public function edit($id){


    $catagory=catagory::all();
    $product=product::find($id);
    return view('admin.update',compact('product','catagory'));
}



public function update_product(Request $request,$id){
    $product=product::find($id);


    $product->title=$request->title;
    $product->description=$request->description;
    $product->price=$request->price;
    $product->qty=$request->qty;

    $product->discount_price=$request->discount;
    $product->catagory=$request->catagory;




    $image=$request->image;
    if($image)
    {
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product',$imagename);
        $product->image=$imagename;

    }


    $product->save();

    return redirect()->back()->with('msg','Product Update Successfully');




}

public function order(){

    $order=order::all();

    return view('admin.order',compact('order'));
}

public function ordered($id){

    $order=order::find($id);

    $order->delivery_status="Delivered";
    $order->payment_status="Paid";

    $order->save();

    return redirect()->back();
}


public function search(Request $request){

    $searchText=$request->search;

    $order=order::where('name','LIKE',"%$searchText%")->get();

    return view('admin.order',compact('order'));

}





}
