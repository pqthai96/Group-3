<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class AdminController extends Controller
{
    public function index() {
        return view('admin_login');
    }
    
    public function show_dashboard() {
        return view('admin_pages.dashboard');
    }

    public function dashboard(Request $rqst) {

        //validate
        $rqst->validate([
            'admin_name' => 'required',
            'admin_password' => 'required'
        ]);
        
        $admin_name = $rqst->admin_name;
        $admin_password = $rqst->admin_password;

        $result = DB::table('Admin')->where('AdminName', $admin_name)->where('AdminPassword', $admin_password)->first();
        if($result) {
            Session::put('admin_name', $result->AdminName);
            Session::put('admin_id', $result->AdminID);
            Session::put('role', $result->Role);
            return redirect::to('dashboard');
        } else {
            Session::put('msg','Wrong username or password!');
            return redirect::to('index');
        }
    }

    public function logout() {
        Session::put('admin_name', null);
        Session::put('admin_id', null);
        return redirect::to('index');
    }

    public function all_admin() {
        $admin = DB::table('Admin')->paginate(8);
        return view('admin_pages.all_admin')->with(['admin' => $admin]);
    }

    public function add_admin() {
        return view('admin_pages.add_admin');
    }

    public function save_admin(Request $rqst) {
        
        //validate
        $rqst->validate([
            'admin_name' => 'required',
            'admin_password' => 'required',
            'admin_password_confirm' => 'required|same:admin_password'
        ]);

        //admin
        $admin = array();
        $admin['AdminName'] = $rqst->admin_name;
        $admin['AdminPassword'] = $rqst->admin_password;
        $admin['Role'] = $rqst->admin_role;
        
        DB::table('Admin')->insert($admin);
        
        Session::put('msg', 'Added Admin Successfully.');
        return redirect::to('add-admin');
    }

    public function all_pizza() {
        $pizza = DB::table('Product')->where('CategoryID', '1')
            ->join('ProductDetails', 'Product.ProductID', '=', 'ProductDetails.ProductID')
            ->select('Product.*', 'ProductDetails.*')->paginate(8);
        return view('admin_pages.all_pizza')->with(['pizza' => $pizza]);
    }
    public function add_pizza() {
        return view('admin_pages.add_pizza');
    }

    public function save_pizza(Request $rqst) {

        //validate
        $rqst->validate([
            'pizza_name' => 'required',
            'description' => 'required',
            'imageURL' => 'required',
            'price_s' => 'required',
            'price_m' => 'required',
            'price_l' => 'required',
            'quantity_s' => 'required',
            'quantity_m' => 'required',
            'quantity_l' => 'required'
        ],[
            'imageURL.required' => 'Image URL is required.',
            'pizza_name.required' => 'Pizza Name is required.',
            'description.required' => 'Description is required.',
            'price_s.required' => 'Price size S is required.',
            'price_m.required' => 'Price size M is required.',
            'price_l.required' => 'Price size L is required.',
            'quantity_s.required' => 'Quantity size S is required.',
            'quantity_m.required' => 'Quantity size M is required.',
            'quantity_l.required' => 'Quantity size L is required.'
        ]);

        //product
        $product = array();
        $product['ProductName'] = $rqst->pizza_name;
        $product['Description'] = $rqst->description;
        $product['CategoryID'] = 1;
        
        //image
        $get_image = $rqst->file('imageURL');
        $get_image_name = $get_image->getClientOriginalName();
        $name_image = current(explode('.',$get_image_name));
        $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
        $get_image->move('frontend/images/pizza', $new_image);

        $product['ImageURL'] = 'frontend/images/pizza/' . $new_image;
        $productID = DB::table('Product')->insertGetId($product);
        
        //productdetails
        $productDetails = array();
        $productDetails['ProductID'] = $productID;
        $productDetails['PriceS'] = $rqst->price_s;
        $productDetails['PriceM'] = $rqst->price_m;
        $productDetails['PriceL'] = $rqst->price_l;
        $productDetails['QuantityS'] = $rqst->quantity_s;
        $productDetails['QuantityM'] = $rqst->quantity_m;
        $productDetails['QuantityL'] = $rqst->quantity_l;

        DB::table('ProductDetails')->insert($productDetails);
        
        Session::put('msg', 'Added Pizza Successfully.');
        return redirect::to('add-pizza');
    }

    public function edit_pizza($pizza_id) {
        $pizza = DB::table('Product')->where('Product.ProductID', $pizza_id)
        ->join('ProductDetails', 'Product.ProductID', '=', 'ProductDetails.ProductID')
        ->select('Product.*','ProductDetails.*')
        ->first();

        return view('admin_pages.edit_pizza')->with(['pizza' => $pizza]);
    }

    public function update_pizza(Request $rqst, $pizza_id) {
        
        //validate
        $rqst->validate([
            'pizza_name' => 'required',
            'description' => 'required',
            'price_s' => 'required',
            'price_m' => 'required',
            'price_l' => 'required',
            'quantity_s' => 'required',
            'quantity_m' => 'required',
            'quantity_l' => 'required'
        ],[
            'pizza_name.required' => 'Pizza Name is required.',
            'description.required' => 'Description is required.',
            'price_s.required' => 'Price size S is required.',
            'price_m.required' => 'Price size M is required.',
            'price_l.required' => 'Price size L is required.',
            'quantity_s.required' => 'Quantity size S is required.',
            'quantity_m.required' => 'Quantity size M is required.',
            'quantity_l.required' => 'Quantity size L is required.'
        ]);

        //product
        $product = array();
        $product['ProductName'] = $rqst->pizza_name;
        $product['Description'] = $rqst->description;
        $product['CategoryID'] = 1;
        
        //image
        $get_image = $rqst->file('imageURL');
        if ($get_image) {
            $get_image_name = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_image_name));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('frontend/images/pizza', $new_image);

            $product['ImageURL'] = 'frontend/images/pizza/' . $new_image;
            DB::table('Product')->where('ProductID', $pizza_id)->update($product);
        }
        DB::table('Product')->where('ProductID', $pizza_id)->update($product);
        
        //productdetails
        $productDetails = array();
        $productDetails['ProductID'] = $pizza_id;
        $productDetails['PriceS'] = $rqst->price_s;
        $productDetails['PriceM'] = $rqst->price_m;
        $productDetails['PriceL'] = $rqst->price_l;
        $productDetails['QuantityS'] = $rqst->quantity_s;
        $productDetails['QuantityM'] = $rqst->quantity_m;
        $productDetails['QuantityL'] = $rqst->quantity_l;

        DB::table('ProductDetails')->where('ProductID', $pizza_id)->update($productDetails);
        
        Session::put('msg', 'Updated Pizza Successfully.');
        return redirect::to('all-pizza');
    }

    public function remove_pizza($pizza_id) {
        
        DB::table('ProductDetails')->where('ProductID', $pizza_id)->delete();
        DB::table('Product')->where('ProductID', $pizza_id)->delete();
        
        Session::put('msg', 'Deleted Pizza Successfully.');
        return redirect::to('all-pizza');
    }
    

    public function all_user() {
        $user = DB::table('User')->paginate(8);
        return view('admin_pages.all_user')->with(['user' => $user]);
    }

    public function all_supplement() {
        $side = DB::table('Product')->where('CategoryID', '2')
            ->join('ProductDetails', 'Product.ProductID', '=', 'ProductDetails.ProductID')
            ->select('Product.*', 'ProductDetails.*')->paginate(4, ['*'], 'pageSide');
        $salad = DB::table('Product')->where('CategoryID', '3')
            ->join('ProductDetails', 'Product.ProductID', '=', 'ProductDetails.ProductID')
            ->select('Product.*', 'ProductDetails.*')->paginate(4, ['*'], 'pageSalad');
        $dessert = DB::table('Product')->where('CategoryID', '4')
            ->join('ProductDetails', 'Product.ProductID', '=', 'ProductDetails.ProductID')
            ->select('Product.*', 'ProductDetails.*')->paginate(4, ['*'], 'pageDessert');
        $drink = DB::table('Product')->where('CategoryID', '5')
            ->join('ProductDetails', 'Product.ProductID', '=', 'ProductDetails.ProductID')
            ->select('Product.*', 'ProductDetails.*')->paginate(4, ['*'], 'pageDrink');
        return view('admin_pages.all_supplement')->with(['side' => $side, 'salad' => $salad, 'dessert' => $dessert, 'drink' => $drink]);
    }

    public function add_supplement() {
        return view('admin_pages.add_supplement');
    }

    public function save_supplement(Request $rqst) {
        
        //validate
        $rqst->validate([
            'product_name' => 'required',
            'product_price' => 'required',
            'imageURL' => 'required',
            'product_quantity' => 'required',
        ],[
            'imageURL.required' => 'Image URL is required.',
            'product_name.required' => 'Supplement Name is required.',
            'product_price.required' => 'Supplement Price is required.',
            'product_quantity.required' => 'Supplement Quantity is required.'
        ]);

        //product
        $product = array();
        $product['ProductName'] = $rqst->product_name;
        $product['CategoryID'] = $rqst->category;
        
        //image
        $get_image = $rqst->file('imageURL');
        $get_image_name = $get_image->getClientOriginalName();
        $name_image = current(explode('.',$get_image_name));
        $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
        $get_image->move('frontend/images/pizza', $new_image);

        $product['ImageURL'] = 'frontend/images/pizza/' . $new_image;
        $productID = DB::table('Product')->insertGetId($product);
        
        //productdetails
        $productDetails = array();
        $productDetails['ProductID'] = $productID;
        $productDetails['PriceM'] = $rqst->product_price;
        $productDetails['QuantityM'] = $rqst->product_quantity;
        DB::table('ProductDetails')->insert($productDetails);
        
        Session::put('msg', 'Added Supplement Successfully.');
        return redirect::to('add-supplement');
    }
}