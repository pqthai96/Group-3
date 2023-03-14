<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class HomeController extends Controller
{
    public function home() {

        $pizza = DB::table('pizza') -> limit(4) -> orderByDesc('PizzaSoldCount')-> get();
        return view('pages.home') -> with(['pizza' => $pizza]);
    }

    public function menu() {

        $pizza = DB::table('pizza') -> get();
        return view('pages.menu') -> with(['pizza' => $pizza]);
    }

    // public function cart() {
    //     $userID =  Session::get('userID');
    //     if($userID != null) {
    //     }
    //     else {
    //         return view('pages.menu');
    //     }
    // }

    public function product($id) {
        $pizza = DB::table('pizza')->where('PizzaID', $id)->get();

        $rating = DB::table('rating') 
        ->join('User', 'Rating.UserID', '=', 'User.UserID')
        ->where('PizzaID', $id)
        ->select('User.Username', 'Rating.*')
        ->get();

        $count = DB::table('Rating')
          ->where('PizzaID', '=', $id)
          ->count();

          return view('pages.product') -> with(['pizza' => $pizza, 'rating' => $rating, 'count' => $count]);
    }

    // public function login(Request $rqst){
    //         $credentials = $rqst->only('email', 'password');
        
    // dump($credentials);
    //     if (Auth::attempt($credentials)) {

    //         $user = Auth::user();
    //         // $userID = Auth::id();
    //         $userID = $user->UserID;
    //         Session::put('userID', $userID);

    //         return redirect()->intended('menu');
    //     } else {
    //         //return redirect('home')->withErrors(['wrong' => 'Wrong Email or Password']);
    //         dd(Auth::attempt($credentials));
    //     }
    // }

public function login(Request $request)
{
    $email = $request->input('email');
    $password = $request->input('password');

    $user = User::where('Email', $email)->first();

    if ($user && $password === $user->Password) {
        $userID = $user->UserID;
        Session::put('userID', $userID);
        Session::put('userName', $user->Username);
        return redirect()->intended('menu');
    } else {
        return redirect('home')->withErrors(['error' => 'Wrong Email or Password']);
    }
}


    public function register(Request $rqst) {
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

        return redirect('home');
    }

    public function logout() {
      Session::forget('userID');
      return redirect('home');
    }

    public function cart() {
        return view('pages.cart');
    }

    public function addToCart(Request $rqst, $id)
    {
        // $product = Product::find($id);
        $pizza = DB::table('Pizza')->where('PizzaID', $id)->first();

        if(!$pizza) {

            abort(404);

        }

        $size = $rqst->input('size');
        $crust = $rqst->input('crust');
        $xcheese = $rqst->input('xcheese');
        $quantity = $rqst->input('quantity');
        
        $cart = session()->get('cart');

        // if cart is empty then this the first product
        if(!$cart) {

            $cart = [
                    $id => [
                        "PizzaName" => $pizza->PizzaName,
                        "Quantity" => $quantity,
                        "ImageURL" => $pizza->ImageURL
                    ]
            ];

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {

            $cart[$id]['Quantity']++;

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');

        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "PizzaName" => $pizza->PizzaName,
            "Quantity" => $quantity,
            "ImageURL" => $pizza->ImageURL
        ];

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }


}