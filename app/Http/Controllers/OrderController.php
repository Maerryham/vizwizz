<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use Illuminate\Support\Facades\Mail;


class OrderController extends Controller
{
    public function placeOrder(Request $request){
        $cart = session()->get('cart');
        $products = [];
        foreach($cart as $item){
            $products[$item['id']] = $item['title'];
        }
        $order = Order::create([
            'first_name' => request('first_name'),'last_name' => request('last_name'),
            'phone' => request('phone'),
            'address' => request('address'),
            'email' => request('email'),
            'other_comments' => request('other_comments'),
            'reference' => request('reference'),
            'products' => $cart,
            'subtotal' => request('subtotal'),
            'delivery_fee' => request('delivery_fee'),
            'total' => request('total'),
        ]);

//        if ($order){
//            session()->forget('cart');
//            return redirect()->back()
//                ->with('order_success','Your order has been received we will get in touch with you shortly');
//        }

        if($order){
//            session()->forget('cart');
            return response()->json([
                'status' => true,
                'data' => $order
            ], 201);

        }
        return response()->json([
            'status' => false,
            'message' => 'unable to process request'
        ], 200);

    }

    public function orderReceived($ref)
    {
        session()->forget('cart');
        $status = "success";
        $exist_reference = Order::where('reference', $ref)->get();
        if (count($exist_reference) != 0){
            $this->updateTicketStatus($ref, $status);

            session(['ref' => $ref]);
            return redirect()->to(route('order_completed') . '#message')->with('message', 'Payment Successful! Your order has been received, we will get in touch with you shortly');
        }
        return 'Invalid';
    }

    public function orderCompleted(){
        $ref = session('ref');
        $order_details = Order::where('reference', $ref)->first();
        return view('order-received')->with(["cart" => 0, "order" => $order_details, "page" => 'order_completed',  "title" => 'Order Completed']);
    }

    protected function updateTicketStatus($ref, $status){
        return Order::where('reference', $ref)->update([
            'status' => "payment_accepted"
        ]);}

    protected function checkSuccessSendMail($ref, $status){
        //use ticket ref no to find the event id
        //then update the event with the id and add one to it
        if($status == 'success'){


            return $this->sendGymNotificationMail($ref);

        }
        return back();
    }

    protected function sendGymNotificationMail($ref){

        $order = Order::where('reference', $ref)->first();
        $email = $order->email;
        $first_name = $order->first_name;
        $last_name = $order->last_name;
        $address = $order->address;
        $phone = $order->phone;
        $product = $order->products;
        $total = $order->total;


        Mail::send('emails.mailAdminOrderRequestNotification',
            [ 'email' => $email, 'first_name' => $first_name, 'last_name' => $last_name,
                'address' => $address, 'phone' => $phone, 'product' => json_decode($product), 'total' => $total],

            function($message) {
            $message->sender('info@vizwizz.com', $name = 'Vizwizz');
            $message->from('info@vizwizz.com', $name = 'Vizwizz');
            $message->to('tech@ionec.com');
            $message->subject('Request for Order on Website');

        });

        Mail::send('emails.mailCilentOrderNotification',
            [ 'email' => $email, 'first_name' => $first_name, 'last_name' => $last_name,
                'address' => $address, 'phone' => $phone, 'product' => json_decode($product), 'total' => $total],

            function($message) use($email) {

            $message->sender('info@vizwizz.com', $name = 'Vizwizz');
            $message->from('info@vizwizz.com', $name = 'Vizwizz');
            $message->to("$email");
            $message->subject('Thanks for Ordering From Vizwizz');

        });

    }


}
