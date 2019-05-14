<?php

namespace App\Http\Controllers;
use App\GroupBooking;
use App\Product;
use App\Category;
use App\Brand;
use App\Newsletter;
use Auth;
use Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{
    public function  indexPage(){
        $products = Product::where('category_id', '2')->get();
        $product2 = Product::where('category_id', '1')->get();
//        $products = $product_contrl->products(8);
        $cart = session()->get('cart');
        return view('index', ['products' => $products,'product2' => $product2, 'cart' =>$cart, "page" => 'home', "title" => 'Welcome to Vizwizz Website']);
    }

    public function newsletter(){
        $contact_detail = ContactDetail::find(1);
        return view('newsletter_subscribe')->with(['contact_detail' => $contact_detail, 'page' => 'newsletter' ]);
    }

    public function newsletterPost(Request $request)
    {
//        $contact_detail = ContactDetail::find(1);
        $exist_email = Newsletter::where('email', $request->email)->get();
        if ( count($exist_email) == 0) {
            // Send Mail



            //Make the mail send without connection issues
            try{

                Mail::send('emails.mailClientNewsletterSubscription', [ 'request' => $request->all() ], function($message) use($request) {
                    $message->sender('info@vizwizz.com', $name = 'Vizzwizz');
                    $message->from('info@vizwizz.com', $name = 'Vizzwizz');
                    $message->to("$request->email");
                    $message->subject('Thanks for subscribing to Our Newsletter');

                });

            }catch(Exception $e){
                return response()->json(['status' => false, 'message' => 'Mail could not be sent']);
            }



            //Save to Db

            $newsletterModel = new Newsletter();

            $newsletterModel->email = $request->email;

            $newsletterModel->save();



//            return redirect()->to(route('newsletter/subscribe').'#message')->with("message", "Thanks for subscribing!!");
            return response()->json(['status' => true, 'message' => 'Thanks for subscribing!']);
        }
        return response()->json(['status' => false, 'message' => 'You are already subscribed to our newsletter']);


    }



    public function groupBookings(){

        $cart = session()->get('cart');

        return view('group_bookings', [ 'cart' =>$cart, "page" => 'group_bookings', "title" => 'Group Bookings']);
    }

    public function groupBookingPost (Request $request)
    {

            //Make the mail send without connection issues
            try{

                Mail::send('emails.mailClientNewsletterSubscription', [ 'request' => $request->all() ], function($message) use($request) {
                    $message->sender('info@vizwizz.com', $name = 'Vizzwizz');
                    $message->from('info@vizwizz.com', $name = 'Vizzwizz');
                    $message->to("$request->email");
                    $message->subject('Thanks for subscribing to Our Newsletter');

                });

            }catch(Exception $e){
                return response()->json(['status' => false, 'message' => 'Mail could not be sent']);
            }



            //Save to Db

            try{

            $newsletterModel = new GroupBooking();

            $newsletterModel->name = $request->name;
            $newsletterModel->email = $request->email;
            $newsletterModel->message = $request->message;

            $newsletterModel->save();

                return response()->json(['status' => true, 'message' => 'Thanks for booking with us. We would keep in touch shortly!']);

            }catch(Exception $e){
                return response()->json(['status' => false, 'message' => 'Bookings not Delivered']);
            }



    }


    public function productsPage(){
        $product_contrl = new  ProductController();
        $products = $product_contrl->products();
        $cart = session()->get('cart');
        return view('products', ['products' => $products,  'cart' =>$cart]);
    }
    public function Tobacco(){
        $category = 2;
        $category_det = Category::find($category);
        $products = Product::where('category_id', $category)->paginate(12);

        $all_categories =  Category::all();
        $brands =  Brand::all();
        $cart = session()->get('cart');


        return view('products',
            ['products' => $products, 'cart' =>$cart,'category' => $category_det,
                'categories' => $all_categories, 'brands' => $brands, "page" => 'tobacco', "title" => 'Tobacco']);
    }

   public function shishaPots(){
        $category = 1;
        $category_det = Category::find($category);
        $products = Product::where('category_id', $category)->paginate(12);

        $all_categories =  Category::all();
        $brands =  Brand::all();
        $cart = session()->get('cart');
        return view('products', ['products' => $products, 'cart' =>$cart,'category' => $category_det,
            'categories' => $all_categories,'brands' => $brands, "page" => 'shisha_pots', "title" => 'Shisha Pots']);
    }


    public function subTotal(){
        $cart = session()->get('cart');
        $total = 0;
        foreach($cart as $item) {
            $total += $item['total'];
        }
        return $total;
    }

    public function Total(){
        $subtotal = $this->subTotal();
        $delivery_fee = 1000;
        $total = $subtotal + $delivery_fee;
        return $total;
    }

    public function SubnTotal(){
        $subtotal = $this->subTotal();
        $delivery_fee = 1000;
        $total = $subtotal + $delivery_fee;
        return response()->json(['status' => true, 'total' => $total,'subtotal' => $subtotal, 'delivery_fee' => $delivery_fee]);
    }

    public function bookingListPage(){
        $cart = session()->get('cart');
        if($cart && count($cart) > 0) {
            $subtotal = $this->subTotal();
            $total = $this->Total();
//            dd($cart);
            $delivery_fee = 1000; //Still write code to call from db
            return view('shopping_cart', ['cart' => $cart, 'subtotal' => $subtotal, 'delivery_fee' => $delivery_fee, 'total' => $total, "page" => 'shopping_cart', "title" => 'Shopping Cart']);
        }
        return view('shopping_cart', ['cart' => $cart, "page" => 'shopping_cart', "title" => 'Shopping Cart']);
    }

    public function checkout(){
        $cart = session()->get('cart');
        if($cart && count($cart) > 0) {
        $subtotal = $this->subTotal();
        $total = $this->Total();
        $delivery_fee = 1000; //Still write code to call from db
        return view('shopping_checkout', ['cart' =>$cart,'subtotal' =>$subtotal, 'delivery_fee' =>$delivery_fee,'total' =>$total, "page" => 'checkout', "title" => 'Shopping Checkout']);
        }
        return view('shopping_cart', ['cart' => $cart, "page" => 'checkout', "title" => 'Shopping Checkout']);
    }

    /**
     * @return mixed
     */
    public function doLogout()
    {
        Auth::logout(); // log the user out of our application
        return Redirect::to('/'); // redirect the user to the login screen
    }
}
