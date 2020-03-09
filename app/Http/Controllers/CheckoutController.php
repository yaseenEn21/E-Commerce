<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe;
use Cart;
use App\coupon;
use App\Order;
use App\OrderProduct;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.checkout')->with([
            'newTotal'=>$this->getNumbers()->get('newTotal'),
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'firstName' => 'required|string|max:10',
            'lastName' =>  'required|string|max:10',
            'email' => 'required|string|email|max:255|unique:users,email,'.auth()->id(),
            'city' => 'required|string',
            'street' => 'required|string',
            'phoneNumber' => 'required|numeric',
        ]);

        
         $content = Cart::content()->map(function($item){
            return $item->name.', '.$item->qty;
        })->values()->toJson();
        try{
            $charge = Stripe::Charges()->create([
                'amount' => $this->getNumbers()->get('newTotal'),
                'currency' => 'usd',
                'description' => 'Order',
                'source' => $request->stripeToken,
                'statement_descriptor' => 'Custom descriptor',
                'metadata' =>[
                    'contant'=> $content,
                    'quantity'=> Cart::instance('default')->count(),
                    'discount'=> session()->get('coupon')['discount'],
                ]
            ]);

            $this->orderInDB($request);

    }catch(CardErrorException $e){
        return back()->with('error_message',$e->getMessage());
    }

    Cart::instance('default')->destroy();
    session()->forget('coupon');
    return view('pages.confirmation')->with('success_message','The request was received successfully.');
}

    public function requestConfirmationPage()
    {
        if(! session()->has('success_message') ){
            return  redirect()->route('home.index');
        }else{
            return view('pages.confirmation');
        }
    }

    public function coupon(Request $request)
    {
        $coupon = Coupon::where('code',$request->couponCode)->first();
        if(! $coupon ){
            return  redirect()->route('checkout.index')->with('error_message','Sorry, The coupon code does not exist!');
        }else{
        $discount = $coupon->discount(Cart::total());

        session()->put('coupon',[
            'name'=>$coupon->code,
            'discount'=>$discount,
            'newTotal'=>$discount
        ]);
    }
       return  redirect()->route('checkout.index')->with('success_message','Coupon code is true!');
    } 
    
    public function getNumbers()
    { 
        $discount = session()->get('coupon')['discount'];
        $newTotal = Cart::total() - $discount ;

        return collect([
            'newTotal'=>$newTotal,
            'discount'=>$discount
        ]);
    }

    public function orderInDB(Request $request)
    { 
        if(session()->has('coupon')){
            $order = Order::create([
                'user_id'=>auth()->user()->id,
                'billing_email'=>$request->email,
                'billing_name'=>$request->firstName .' '.$request->lastName,
                'billing_address'=>$request->city .' - '. $request->street,
                'billing_city'=>$request->city,
                'billing_province'=>"#",
                'billing_postalcode'=>"#",
                'billing_phone'=>$request->phoneNumber,
                'billing_name_on_card'=>auth()->user()->name,
                'billing_discount'=>session()->get('coupon')['discount'],
                'billing_discount_code'=>session()->get('coupon')['name'],
                'billing_subtotal'=>'120',
                'billing_tax'=>config('cart.tax'),
                'billing_total'=> $this->getNumbers()->get('newTotal'),        
            ]);
    
        }else{
        $order = Order::create([
            'user_id'=>auth()->user()->id,
            'billing_email'=>$request->email,
            'billing_name'=>$request->firstName .' '.$request->lastName,
            'billing_address'=>$request->city .' - '. $request->street,
            'billing_city'=>$request->city,
            'billing_province'=>"#",
            'billing_postalcode'=>"#",
            'billing_phone'=>$request->phoneNumber,
            'billing_name_on_card'=>auth()->user()->name,
            'billing_subtotal'=>'120',
            'billing_tax'=>config('cart.tax'),
            'billing_total'=> $this->getNumbers()->get('newTotal'),        
        ]);
    }

     foreach(Cart::content() as $item)
            OrderProduct::create([
            'product_id'=>$item->id,
            'order_id'=>$order->id
        ]);

    return $order;

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
