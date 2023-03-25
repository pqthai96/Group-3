<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
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
        $email = $rqst->input('email');
        $password = $rqst->input('password');

        $user = User::where('Email', $email)->first();

        if ($user && $password === $user->Password) {
            $userID = $user->UserID;
            Session::put('userID', $userID);
            Session::put('userName', $user->Username);
            Session::put('Name', $user->Name);
            Session::put('Phone', $user->Phone);
            Session::put('Address', $user->Address);
            
            return redirect()->intended('menu');
        } else {
            return redirect('home')->withErrors(['error' => 'Wrong Email or Password']);
        }
    }
    public function register(Request $rqst)
    {
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
        Session::put('Name', $rqst->newFullname);
        Session::put('Phone', $rqst->newPhone);
        Session::put('Address', $rqst->newAddress);
        
        return redirect('home');
    }
    public function logout()
    {
        Session::forget('cart');
        Session::forget('userID');
        Session::forget('userName');
        Session::forget('Name');
        Session::forget('Phone');
        Session::forget('Address');
        
        return redirect('home');
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

            return response()->json(['msg' => 'Cart updated successfully', 'total' => $total, 'subTotal' => $subTotal]);
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
            $order_data['SubTotal'] = $rqst->input('total');
            $order_data['PaymentMethod'] = $rqst->input('payment');
        } else {
            $order_data['OrderID'] = $order_id;
            $order_data['OrderDate'] = $date;
            $order_data['UserID'] = session::get('userID');
            $order_data['CustomerName'] = $rqst->input('name');
            $order_data['CustomerPhone'] = $rqst->input('phone');
            $order_data['CustomerAddress'] = $rqst->input('address');
            $order_data['Note'] = $rqst->input('notes');
            $order_data['SubTotal'] = $rqst->input('total');
            $order_data['PaymentMethod'] = $rqst->input('payment');
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
            $order_details_data['Price'] = $item['Price']*$item['Quantity'];
            DB::table('OrderDetails')->insert($order_details_data);
        }

        Session::forget('cart');
        return redirect('home');
        // dd($order_data);
        // dd($order_details_data);
    }
}