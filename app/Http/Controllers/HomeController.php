<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    public function home()
    {

        $pizza = DB::table('Product')->where('CategoryID', '1')
            ->join('ProductDetails', 'Product.ProductID', '=', 'ProductDetails.ProductID')
            ->limit(4)->orderByDesc('ProductSoldCount')
            ->select('Product.*', 'ProductDetails.*')->get();
        return view('pages.home')->with(['pizza' => $pizza]);
    }

    public function menu()
    {

        $pizza = DB::table('Product')->where('CategoryID', '1')
            ->join('ProductDetails', 'Product.ProductID', '=', 'ProductDetails.ProductID')
            ->select('Product.*', 'ProductDetails.*')->get();
        $side = DB::table('Product')->where('CategoryID', '2')
            ->join('ProductDetails', 'Product.ProductID', '=', 'ProductDetails.ProductID')
            ->select('Product.*', 'ProductDetails.*')->get();
        $salad = DB::table('Product')->where('CategoryID', '3')
            ->join('ProductDetails', 'Product.ProductID', '=', 'ProductDetails.ProductID')
            ->select('Product.*', 'ProductDetails.*')->get();
        $dessert = DB::table('Product')->where('CategoryID', '4')
            ->join('ProductDetails', 'Product.ProductID', '=', 'ProductDetails.ProductID')
            ->select('Product.*', 'ProductDetails.*')->get();
        $drink = DB::table('Product')->where('CategoryID', '5')
            ->join('ProductDetails', 'Product.ProductID', '=', 'ProductDetails.ProductID')
            ->select('Product.*', 'ProductDetails.*')->get();
        return view('pages.menu')->with(['pizza' => $pizza, 'side' => $side, 'salad' => $salad, 'dessert' => $dessert, 'drink' => $drink]);
    }

    public function product($id)
    {
        $pizza = DB::table('Product')->where('Product.ProductID', $id)
            ->join('ProductDetails', 'Product.ProductID', '=', 'ProductDetails.ProductID')
            ->select('Product.*', 'ProductDetails.*')->get();

        $rating = DB::table('rating')
            ->join('User', 'Rating.UserID', '=', 'User.UserID')
            ->where('ProductID', $id)
            ->select('User.Username', 'Rating.*')
            ->get();

        $count = DB::table('Rating')
            ->where('ProductID', '=', $id)
            ->count();

        return view('pages.product')->with(['pizza' => $pizza, 'rating' => $rating, 'count' => $count]);
    }


    public function login(Request $rqst)
    {
        $rqst->validate([
            'email' => 'required',
            'password' => 'required'
        ],[
            'email.required' => 'Email is required.',
            'password.required' => 'Password is required.'
        ]);
        
        $email = $rqst->email;
        $password = $rqst->password;

        $user = User::where('Email', $email)->first();
        
        if ($user && $password === $user->Password) {
            $userID = $user->UserID;
            Session::put('userID', $userID);
            Session::put('userName', $user->Username);
            Session::put('Email', $user->Email);
            Session::put('Name', $user->Name);
            Session::put('Phone', $user->Phone);
            Session::put('Gender', $user->Gender);
            Session::put('Address', $user->Address);
            return response()->json(['msg' => 'Product removed successfully']);
        } else {
            return response()->json(['errors' => 'Product removed successfully']);
        }
    }
    
    public function register(Request $rqst)
    {
        $rqst->validate([
            'newUsername' => 'required',
            'newPassword' => 'required',
            'confirmPassword' => 'required|same:newPassword',
            'newEmail' => 'required|email',
            'newPhone' => 'required',
            'newFullname' => 'required',
            'newAddress' => 'required',
            'term' => 'required'
        ],[
            'newUsername.required' => 'Username is required.',
            'newPassword.required' => 'Password is required.',
            'confirmPassword.required' => 'Confirm Password is required.',
            'confirmPassword.same' => 'Password does not match.',
            'newEmail.required' => 'Email is required.',
            'newEmail.email' => 'Invalid Email.',
            'newPhone.required' => 'Phone Number is required.',
            'newFullname.required' => 'Fullname is required.',
            'newAddress.required' => 'Address is required.',
            'term.required' => 'You need to review and agree to the terms and privacy policy of Testo Pizza.',
        ]);
        
        $data = array();
        $data['Username'] = $rqst->newUsername;
        $data['Password'] = $rqst->newPassword;
        $data['Email'] = $rqst->newEmail;
        $data['Phone'] = $rqst->newPhone;
        $data['Name'] = $rqst->newFullname;
        $data['Gender'] = $rqst->gender;
        $data['Address'] = $rqst->newAddress;

        $userID = DB::table('User')->insertGetId($data);

        Session::put('userID', $userID);
        Session::put('userName', $rqst->newUsername); //luu bien ten user truy xuat = {{ session::get('userName') }}
        Session::put('Email', $rqst->newEmail);
        Session::put('Name', $rqst->newFullname);
        Session::put('Phone', $rqst->newPhone);
        Session::put('Gender', $rqst->gender);
        Session::put('Address', $rqst->newAddress);
        
    }
    public function logout()
    {
        Session::forget('cart');
        Session::forget('userID');
        Session::forget('userName');
        Session::forget('Name');
        Session::forget('Phone');
        Session::forget('Address');
        
        return redirect::to('home');
    }

    public function cart()
    {
        return view('pages.cart');
    }
    public function addToCart(Request $rqst, $id)
    {
        $pizza = DB::table('Product')->where('Product.ProductID', $id)
            ->join('ProductDetails', 'Product.ProductID', '=', 'ProductDetails.ProductID')
            ->select('Product.*', 'ProductDetails.*')->first();

        if (($pizza->CategoryID) == '1') {
            if (!$pizza) {

                abort(404);

            }

            $size = $rqst->size;
            $price = $size == "S" ? 'PriceS' : ($size == "M" ? 'PriceM' : 'PriceL');
            $quantity = $rqst->quantity;
            
            $cart = session()->get('cart');

            // if cart is empty then this the first product
            if (!$cart) {
                $cart[$id . '_' . $size] = [
                        "ProductName" => $pizza->ProductName,
                        "Quantity" => $quantity,
                        "ImageURL" => $pizza->ImageURL,
                        "Size" => $size,
                        "Price" => $pizza->$price
                    ];
                session()->put('cart', $cart);
                
                $cart_count = count((array) session('cart'));
                return response()->json(['msg' => 'Product added to cart successfully!', 'cart_count' => $cart_count]);
            }

            // if cart not empty then check if this product exist then increment quantity
            if (isset($cart[$id . '_' . $size])) {
                // check if size match
                    $cart[$id . '_' . $size]['Quantity'] = $cart[$id . '_' . $size]['Quantity'] + $quantity;
                    session()->put('cart', $cart);
                    
                    $cart_count = count((array) session('cart'));
                    return response()->json(['msg' => 'Product added to cart successfully!', 'cart_count' => $cart_count]);
            } else {
                $cart[$id . '_' . $size] = [
                    "ProductName" => $pizza->ProductName,
                    "Quantity" => $quantity,
                    "ImageURL" => $pizza->ImageURL,
                    "Size" => $size,
                    "Price" => $pizza->$price
                ];
                session()->put('cart', $cart);
                
                $cart_count = count((array) session('cart'));
                return response()->json(['msg' => 'Product added to cart successfully!', 'cart_count' => $cart_count]);

            }
        } else {
            if(!$pizza) {

                abort(404);

            }

            $cart = session()->get('cart');

            // if cart is empty then this the first product
            if(!$cart) {

                $cart = [
                        $id => [
                            "ProductName" => $pizza->ProductName,
                            "Quantity" => 1,
                            "ImageURL" => $pizza->ImageURL,
                            "Size" => null,
                            "Price" => $pizza->PriceM,
                        ]
                ];

                session()->put('cart', $cart);

                $cart_count = count((array) session('cart'));
                return response()->json(['msg' => 'Product added to cart successfully!', 'cart_count' => $cart_count]);
            }

            // if cart not empty then check if this product exist then increment quantity
            if(isset($cart[$id])) {

                $cart[$id]['Quantity']++;

                session()->put('cart', $cart);

                $cart_count = count((array) session('cart'));
                return response()->json(['msg' => 'Product added to cart successfully!', 'cart_count' => $cart_count]);

            }

            // if item not exist in cart then add to cart with quantity = 1
            $cart[$id] = [
                "ProductName" => $pizza->ProductName,
                "Quantity" => 1,
                "ImageURL" => $pizza->ImageURL,
                "Size" => null,
                "Price" => $pizza->PriceM
            ];

            session()->put('cart', $cart);

            $cart_count = count((array) session('cart'));
            return response()->json(['msg' => 'Product added to cart successfully!', 'cart_count' => $cart_count]);
        }
    }
    public function updateCart(Request $rqst)
    {
        if($rqst->id && $rqst->quantity) {
            $carts = session()->get('cart');
            $carts[$rqst->id]['Quantity'] = $rqst->quantity;
            session()->put('cart', $carts);

            $subTotal = '$' . $carts[$rqst->id]['Quantity'] * $carts[$rqst->id]['Price'];
            $total = '$' . $this->getCartTotal();

            return response()->json(['msg' => 'Cart updated successfully! Please re-apply your voucher code if you have!', 'total' => $total, 'subTotal' => $subTotal]);
        }
    }
    public function removeCart(Request $rqst) {
        if($rqst->id) {
            $carts = session()->get('cart');
            unset($carts[$rqst->id]);
            session()->put('cart', $carts);
            
            $total = '$' . $this->getCartTotal();
            $cart_count = count((array) session('cart'));

            return response()->json(['msg' => 'Product removed successfully', 'total' => $total, 'cart_count' => $cart_count]);
        }
    }

    private function getCartTotal()
    {
        $total = 0;

        $cart = session()->get('cart');

        foreach($cart as $id => $details) {
            $total += $details['Price'] * $details['Quantity'];
        }

        return number_format($total, 2);
    }

    public function getDiscount(Request $rqst) {
        $voucher = $rqst->voucher;
        $total = $this->getCartTotal();
        
        if(session::get('cart') == null) {
            $discountAmount = 0;
            $totalPayment = $total;
            return response()->json(['msg' => 'Please add item first!', 'totalPayment' => $totalPayment, 'discountAmount' => $discountAmount]);
        } else {

            $discount = DB::table('Discount')->where('DiscountID', $voucher)->first();
            if ($discount == null) {
                $discountAmount = 0;
                $totalPayment = $total;
                return response()->json(['msg' => 'The voucher you just entered is incorrect, please try again!', 'totalPayment' => $totalPayment, 'discountAmount' => $discountAmount]);
            } else {
                $startDate = $discount->StartDate;
                $endDate = $discount->EndDate;
                $minimumAmount = $discount->MinimumAmount;
                $maximumAmount = $discount->MaximumAmount;
                $currentDate = Carbon::now();

                if ($total < $minimumAmount) {
                    $discountAmount = 0;
                    $totalPayment = $total;
                    return response()->json(['msg' => 'Your order has not reached the minimum value to use the voucher!', 'totalPayment' => $totalPayment, 'discountAmount' => $discountAmount]);
                } else {
                    if ($currentDate->between($startDate, $endDate)) {
                        $discountValue = $discount->DiscountValue;
                        if (strpos($discountValue, '%') !== false) {
                            $discountAmount = round($total * substr($discountValue, 0, strpos($discountValue, '%')) / 100, 2);

                            if ($discountAmount > $maximumAmount) {
                                $discountAmount = $maximumAmount;
                                $totalPayment = round($total - $discountAmount, 2);
                            } else {
                                $totalPayment = round($total - $discountAmount, 2);
                            }
                        } else {
                            $discountAmount = $discountValue;
                            $totalPayment = round($total - $discountAmount, 2);
                        }
                        return response()->json(['msg' => 'Apply Voucher Succesfully!', 'totalPayment' => $totalPayment, 'discountAmount' => $discountAmount]);
                    } else {
                        $discountAmount = 0;
                        $totalPayment = $total;
                        return response()->json(['msg' => 'Currently, the voucher has not been applied during this time!', 'totalPayment' => $totalPayment, 'discountAmount' => $discountAmount]);
                    }
                }
            }
        }
    }

    public function checkoutAccept() {
        $userLogin = session::get('userID');
        $userCart = session::get('cart');
        $viewUrlCheckout = url('checkout');
        return response()->json(['userLogin' => $userLogin, 'userCart' => $userCart, 'viewUrlCheckout' => $viewUrlCheckout]);
      
    }

    public function checkout() {
        return view('pages.checkout');
    }

    public function orderPlace(Request $rqst) {

        //insert Orders
        $options = $rqst->input('options');
        $order_id = "TESTO" . session::get('userID') . date('Ymd') . date('His'); 
        $date = Carbon::now();
        
        $order_data = array();
        if ($options=="default") {  
            $order_data['OrderID'] = $order_id;
            $order_data['OrderDate'] = $date;
            $order_data['UserID'] = session::get('userID');
            $order_data['CustomerName'] = session::get('Name');
            $order_data['CustomerPhone'] = session::get('Phone');
            $order_data['CustomerAddress'] = session::get('Address');
            $order_data['Note'] = $rqst->input('notes');
            $order_data['DiscountAmount'] = $rqst->input('discountAmount');
            $order_data['PaymentMethod'] = $rqst->input('payment');
            $order_data['OrderStatus'] = "Processing";
        } else {
            $order_data['OrderID'] = $order_id;
            $order_data['OrderDate'] = $date;
            $order_data['UserID'] = session::get('userID');
            $order_data['CustomerName'] = $rqst->input('name');
            $order_data['CustomerPhone'] = $rqst->input('phone');
            $order_data['CustomerAddress'] = $rqst->input('address');
            $order_data['Note'] = $rqst->input('notes');
            $order_data['DiscountAmount'] = $rqst->input('discountAmount');
            $order_data['PaymentMethod'] = $rqst->input('payment');
            $order_data['OrderStatus'] = "Processing";
        }
        DB::table('Orders')->insert($order_data);
        
        //insert OrderDetails 
        $cart = session()->get('cart');
        
        $order_details_data = array();
        foreach ($cart as $key => $item) {
            $productID = is_numeric($key) ? $key : (int) strtok($key, '_');
            
            $order_details_data['OrderID'] = $order_id;
            $order_details_data['ProductID'] = $productID;
            $order_details_data['Size'] = $item['Size'];
            $order_details_data['Quantity'] = $item['Quantity'];
            DB::table('OrderDetails')->insert($order_details_data);
        }

        Session::forget('cart');
        return view('pages.orderplace');
    }

    public function account() {
        return view('pages.account');
    }

    public function order() {
        $user = session::get('userID');
        $userOrder = DB::table('Orders')->where('UserID', $user)->orderByDesc('OrderDate')->paginate(5);

        $userOrderDetails = DB::table('OrderDetails')
            ->join('Product','Product.ProductID','=','OrderDetails.ProductID')
            ->join('ProductDetails','Product.ProductID','=','ProductDetails.ProductID')
            ->select('OrderDetails.*','Product.*','ProductDetails.*')
            ->get();


        return view('pages.order')->with(['userOrder' => $userOrder, 'userOrderDetails' => $userOrderDetails]);
    }

    public function review(Request $rqst, $product_id) {

        if ($rqst->rating == null) {
            Session::put('msg', 'Please choose star you want to rating!');
            return redirect::to('order');
        } else {

            $date = Carbon::now();

            $rating = array();
            $rating['UserID'] = session::get('userID');
            $rating['ProductID'] = $product_id;
            $rating['OrderDetailsID'] = $rqst->order_details_id;
            $rating['Rating'] = $rqst->rating;
            $rating['Review'] = $rqst->review;
            $rating['RatingDate'] = $date;

            DB::table('Rating')->insert($rating);
            return redirect::to('order');
        }
    }

    public function promotion(){
        $promotion = DB::table('Discount')->select(DB::raw("DiscountID, DiscountName, DiscountIMG,DATE_FORMAT(StartDate, '%d-%m-%Y') AS StartDate, DATE_FORMAT(EndDate, '%d-%m-%Y') AS EndDate"))->get();
        return view('pages.promotion')->with(['promotion' => $promotion]);
    }
    public function about(){
        return view('pages.about');
    }
    public function term(){
        return view('pages.term');
    }
    public function faqs(){
        return view('pages.faqs');
    }
    public function gallery(){
        return view('pages.gallery');
    }
    public function contact(){
        return view('pages.contact');
    }
    public function location(){
        return view('pages.location');
    }
    public function blog(){
        $blog = DB::table('blog')->get();
        return view('pages.blog')->with(['blog'=> $blog]);
    }
    public function singleBlog($id){
        $blog = DB::table('blog')->where('blog.BlogID', $id)->get();
        return view('pages.single-blog')->with(['blog'=> $blog]);
    }

}