<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;


use Session;
use Stripe;




class HomeController extends Controller
{

    public function redirect(){
        $usertype=Auth::user()->usertype;

        if($usertype=='1'){
            $total_product=product::all()->count();
            $total_order=order::all()->count();
            $total_user=user::all()->count();

            $order=order::all();

            $total_revenue=0;

            foreach($order as $r){

                $total_revenue=$total_revenue+$r->price;
            }

            $total_deliver=order::where('delivery_status','=','delivered')->get()->count();
            $total_processing=order::where('delivery_status','=','processing')->get()->count();


            return view('admin.home',compact('total_product','total_order','total_user','total_revenue','total_deliver','total_processing'));
        }
        else{
            $product=product::paginate(6);
            return view('home.index',compact('product'));
        }
    }

    public function index(){

        $product=product::paginate(6);//badel ma 7ot ybayno l suar bel paginate b7adid adey bade ybayin
        return view('home.index',compact('product'));
    }



    public function product_detail($id){

        $product=product::find($id);
        return view('home.product_detail',compact('product'));
    }



    public function add_cart(Request $request,$id){


        if(Auth::id()){//exa logged in

           $user=Auth::user();//men wara hey 2deret jib l user data

           $userid=$user->id;
           $product=product::find($id);

           $product_exist_id=cart::where('product_id','=',$id)->where('user_id','=',$userid)->get('id')->first();//ekhir step bel project baamul hey to check eza nafs l product naamalo marten add to cart


           if($product_exist_id){

            $cart=cart::find($product_exist_id)->first();
            $quantity=$cart->qty;
            $cart->qty= $quantity + $request->qty;

if($product->discount_price!=null)
{
    $cart->price=$product->discount_price*$cart->qty;

}

else{
    $cart->price=$product->price*$cart->qty;

}

            $cart->save();
            return redirect()->back();
           }


           else{
           $cart=new cart;

           $cart->name=$user->name;
           $cart->email=$user->email;
           $cart->phone=$user->phone;
           $cart->address=$user->address;
           $cart->user_id=$user->id;



           $cart->product_title=$product->title;

if($product->discount_price!=null)
{
    $cart->price=$product->discount_price*$request->qty;

}

else{
    $cart->price=$product->price*$request->qty;

}
           $cart->image=$product->image;
           $cart->product_id=$product->id;


           $cart->qty=$request->qty;

           $cart->save();

           return redirect()->back();

           }


        }
        else{
            return redirect('login');
        }

    }

public function show_cart(){

if(Auth::id()){

    $id=Auth::user()->id;
    $cart=cart::where('user_id','=',Auth::user()->id)->get();

    return view('home.show_cart',compact('cart'));
}

else{
    return redirect('login');
}
}

public function remove_cart($id){
    $cart=cart::find($id);

    $cart->delete();

    return redirect()->back();
}

public function cash_order(){

$user=Auth::user();
$userid=$user->id;

$data=cart::where('user_id','=',$userid)->get();

foreach($data as $data){
    $order=new order;

    $order->name=$data->name;
    $order->email=$data->email;
    $order->phone=$data->phone;
    $order->address=$data->address;
    $order->product_title=$data->product_title;
    $order->user_id=$data->user_id;
    $order->product_id=$data->product_id;
    $order->price=$data->price;
    $order->qty=$data->qty;

    $order->image=$data->image;
    $order->product_id=$data->product_id;

    $order->payment_status='cash on delivery';

    $order->delivery_status='processing';



    $order->save();

    $cart_id=$data->id;
    $cart=cart::find($cart_id);

    $cart->delete();

}
return redirect()->back()->with('msg','Order placed successfully');

}


public function stripe($totalprice){



    return view('home.stripe',compact('totalprice'));
}



public function stripePost(Request $request,$totalprice)
{
    Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

    Stripe\Charge::create ([
            "amount" => $totalprice * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Thank you for your payment."
    ]);

    $user=Auth::user();
$userid=$user->id;

$data=cart::where('user_id','=',$userid)->get();

foreach($data as $data){
    $order=new order;

    $order->name=$data->name;
    $order->email=$data->email;
    $order->phone=$data->phone;
    $order->address=$data->address;
    $order->product_title=$data->product_title;
    $order->user_id=$data->user_id;
    $order->product_id=$data->product_id;
    $order->price=$data->price;
    $order->qty=$data->qty;

    $order->image=$data->image;
    $order->product_id=$data->product_id;

    $order->payment_status='Paid';

    $order->delivery_status='processing';



    $order->save();

    $cart_id=$data->id;
    $cart=cart::find($cart_id);

    $cart->delete();

}

    Session::flash('success', 'Payment successful!');

    return back();
}

public function show_order(){
    if(Auth::id()){
        $user=Auth::user();//data
        $userid=$user->id;
        $order=order::where('user_id','=',$userid)->get();
        return view('home.order',compact('order'));
    }
    else
    {
        return redirect('login');
    }
}

public function cancel_order($id){
    $order=order::find($id);
    $order->delivery_status='order canceled';
    $order->save();
    return redirect()->back();
}

public function product_search(Request $request){
    $search_text=$request->search;
    $product=product::where('title','LIKE',"%$search_text%")->orWhere('catagory','LIKE',"$search_text")->paginate(10);
    return view('home.index',compact('product'));
}



public function products(){


    $product=product::paginate(10);
    return view('home.all_products',compact('product'));
}


public function search_product(Request $request){
    $search_text=$request->search;
    $product=product::where('title','LIKE',"%$search_text%")->orWhere('catagory','LIKE',"$search_text")->paginate(10);
    return view('home.all_products',compact('product'));
}



}




