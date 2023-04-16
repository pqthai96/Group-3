<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Mail;
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

    //Admin
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
        ],[
            'admin_name.required' => 'Admin Name is required.',
            'admin_password.required' => 'Password is required.',
            'admin_password_confirm.required' => 'Password Confirm is required.',
            'admin_password_confirm.same' => 'Password does not match.'
        ]);

        //admin
        $admin = array();
        $admin['AdminName'] = $rqst->admin_name;
        $admin['AdminPassword'] = $rqst->admin_password;
        $admin['Role'] = $rqst->admin_role;
        
        DB::table('Admin')->insert($admin);
        
        Session::put('msg', 'Added Admin Successfully.');
        return redirect::to('all-admin');
    }
    public function edit_admin($admin_id) {
        $admin = DB::table('Admin')->where('AdminID', $admin_id)->first();
        return view('admin_pages.edit_admin')->with(['admin' => $admin]);
    }
    public function update_admin(Request $rqst, $admin_id) {
        
        //validate
        $rqst->validate([
            'admin_name' => 'required',
            'admin_password' => 'required',
            'admin_password_confirm' => 'required|same:admin_password'
        ],[
            'admin_name.required' => 'Admin Name is required.',
            'admin_password.required' => 'Password is required.',
            'admin_password_confirm.required' => 'Password Confirm is required.',
            'admin_password_confirm.same' => 'Password does not match.'
        ]);

        //admin
        $admin = array();
        $admin['AdminName'] = $rqst->admin_name;
        $admin['AdminPassword'] = $rqst->admin_password;
        $admin['Role'] = $rqst->admin_role;

        DB::table('Admin')->where('AdminID', $admin_id)->update($admin);
        
        Session::put('msg', 'Updated Admin Successfully.');
        return redirect::to('all-admin');
    }
    public function remove_admin($admin_id) {
    
    DB::table('Admin')->where('AdminID', $admin_id)->delete();
    
    Session::put('msg', 'Removed Admin Account Successfully.');
    return redirect::to('all-admin');
    }

    //Pizza
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
            'imageURL' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'price_s' => 'required|numeric|min:0',
            'price_m' => 'required|numeric|min:0',
            'price_l' => 'required|numeric|min:0',
            'quantity_s' => 'required|numeric|min:0',
            'quantity_m' => 'required|numeric|min:0',
            'quantity_l' => 'required|numeric|min:0'
        ],[
            'pizza_name.required' => 'Pizza Name is required.',
            'description.required' => 'Description is required.',
            'imageURL.required' => 'Image URL is required.',
            'imageURL.image' => 'File upload must be image',
            'imageURL.mimes' => 'format is jpeg, png, jpg, gif or svg',
            'price_s.required' => 'Price size S is required.',
            'price_s.numeric' => 'Price size S must be a number.',
            'price_s.min' => 'Price size S must be at least 0.',
            'price_m.required' => 'Price size M is required.',
            'price_m.numeric' => 'Price size M must be a number.',
            'price_m.min' => 'Price size M must be at least 0.',
            'price_l.required' => 'Price size L is required.',
            'price_l.numeric' => 'Price size L must be a number.',
            'price_l.min' => 'Price size L must be at least 0.',
            'quantity_s.required' => 'Quantity size S is required.',
            'quantity_s.numeric' => 'Quantity size S must be a number.',
            'quantity_s.min' => 'Quantity size S must be at least 0.',
            'quantity_m.required' => 'Quantity size M is required.',
            'quantity_m.numeric' => 'Quantity size M must be a number.',
            'quantity_m.min' => 'Quantity size M must be at least 0.',
            'quantity_l.required' => 'Quantity size L is required.',
            'quantity_l.numeric' => 'Quantity size L must be a number.',
            'quantity_l.min' => 'Quantity size L must be at least 0.'
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
        return redirect::to('all-pizza');
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
            'imageURL' => 'image|mimes:jpeg,png,jpg|max:2048',
            'price_s' => 'required|numeric|min:0',
            'price_m' => 'required|numeric|min:0',
            'price_l' => 'required|numeric|min:0',
            'quantity_s' => 'required|numeric|min:0',
            'quantity_m' => 'required|numeric|min:0',
            'quantity_l' => 'required|numeric|min:0'
        ],[
            'pizza_name.required' => 'Pizza Name is required.',
            'description.required' => 'Description is required.',
            'imageURL.image' => 'File upload must be image',
            'imageURL.mimes' => 'format is jpeg, png, jpg, gif or svg',
            'price_s.required' => 'Price size S is required.',
            'price_s.numeric' => 'Price size S must be a number.',
            'price_s.min' => 'Price size S must be at least 0.',
            'price_m.required' => 'Price size M is required.',
            'price_m.numeric' => 'Price size M must be a number.',
            'price_m.min' => 'Price size M must be at least 0.',
            'price_l.required' => 'Price size L is required.',
            'price_l.numeric' => 'Price size L must be a number.',
            'price_l.min' => 'Price size L must be at least 0.',
            'quantity_s.required' => 'Quantity size S is required.',
            'quantity_s.numeric' => 'Quantity size S must be a number.',
            'quantity_s.min' => 'Quantity size S must be at least 0.',
            'quantity_m.required' => 'Quantity size M is required.',
            'quantity_m.numeric' => 'Quantity size M must be a number.',
            'quantity_m.min' => 'Quantity size M must be at least 0.',
            'quantity_l.required' => 'Quantity size L is required.',
            'quantity_l.numeric' => 'Quantity size L must be a number.',
            'quantity_l.min' => 'Quantity size L must be at least 0.'
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
        
        Session::put('msg', 'Removed Pizza Successfully.');
        return redirect::to('all-pizza');
    }
    
    //User
    public function all_user() {
        $user = DB::table('User')->paginate(8);
        return view('admin_pages.all_user')->with(['user' => $user]);
    }
    public function edit_user($user_id) {
        $user = DB::table('User')->where('UserID', $user_id)->first();

        return view('admin_pages.edit_user')->with(['user' => $user]);
    }
    public function update_user(Request $rqst, $userID) {
        
        //validate
        $rqst->validate([
            'user_name' => 'required',
            'user_phone' => 'required|numeric|min:0',
            'user_email' => 'required|email',
            'user_fullname' => 'required',
            'user_address' => 'required',
        ],[
            'user_name.required' => 'Username is required.',
            'user_phone.required' => 'Phone Number is required.',
            'user_phone.numeric' => 'Invalid Phone Number.',
            'user_email.required' => 'Email is required.',
            'user_email.email' => 'Invalid Email.',
            'user_fullname.required' => 'Full name is required.',
            'user_address.required' => 'Address is required.'
        ]);

        $user = array();
        $user['Username'] = $rqst->user_name;
        $user['Email'] = $rqst->user_email;
        $user['Phone'] = $rqst->user_phone;
        $user['Name'] = $rqst->user_fullname;
        $user['Gender'] = $rqst->user_gender;
        $user['Address'] = $rqst->user_address;
        $user['UserStatus'] = $rqst->user_status;

        DB::table('User')->where('UserID', $userID)->update($user);
        Session::put('msg', 'Updated User Successfully.');
        
        return redirect::to('all-user');
    }

    //Supplement
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
            'product_price' => 'required|numeric|min:0',
            'imageURL' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'product_quantity' => 'required|numeric|min:0',
        ],[
            'imageURL.required' => 'Image URL is required.',
            'imageURL.image' => 'File upload must be image',
            'imageURL.mimes' => 'format is jpeg, png, jpg, gif or svg',
            'product_name.required' => 'Supplement Name is required.',
            'product_price.required' => 'Supplement Price is required.',
            'product_price.numeric' => 'Supplement Price must be a number.',
            'product_price.min' => 'Supplement Price must be at least 0.',
            'product_quantity.required' => 'Supplement Quantity is required.',
            'product_quantity.numeric' => 'Supplement Quantity must be a number.',
            'product_quantity.min' => 'Supplement Quantity must be at least 0.'
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
        if ($rqst->category == '2') {
            $get_image->move('frontend/images/side', $new_image);

            $product['ImageURL'] = 'frontend/images/side/' . $new_image;
            $productID = DB::table('Product')->insertGetId($product);
        } else if ($rqst->category == '3') {
            $get_image->move('frontend/images/salad', $new_image);

            $product['ImageURL'] = 'frontend/images/salad/' . $new_image;
            $productID = DB::table('Product')->insertGetId($product);
        }else if ($rqst->category == '4') {
            $get_image->move('frontend/images/dessert', $new_image);

            $product['ImageURL'] = 'frontend/images/dessert/' . $new_image;
            $productID = DB::table('Product')->insertGetId($product);
        } else {
            $get_image->move('frontend/images/drink', $new_image);

            $product['ImageURL'] = 'frontend/images/drink/' . $new_image;
            $productID = DB::table('Product')->insertGetId($product);
        }
        
        //productdetails
        $productDetails = array();
        $productDetails['ProductID'] = $productID;
        $productDetails['PriceM'] = $rqst->product_price;
        $productDetails['QuantityM'] = $rqst->product_quantity;
        DB::table('ProductDetails')->insert($productDetails);
        
        Session::put('msg', 'Added Supplement Successfully.');
        return redirect::to('all-supplement');
    }
    public function edit_supplement($supplement_id) {
        $supplement = DB::table('Product')->where('Product.ProductID', $supplement_id)
        ->join('ProductDetails', 'Product.ProductID', '=', 'ProductDetails.ProductID')
        ->select('Product.*','ProductDetails.*')
        ->first();

        return view('admin_pages.edit_supplement')->with(['supplement' => $supplement]);
    }
    public function update_supplement(Request $rqst, $supplement_id) {
        
        //validate
        $rqst->validate([
            'product_name' => 'required',
            'product_price' => 'required|numeric|min:0',
            'product_quantity' => 'required|numeric|min:0',
            'imageURL' => 'image|mimes:jpeg,png,jpg|max:2048'
        ],[
            'imageURL.image' => 'File upload must be image',
            'imageURL.mimes' => 'format is jpeg, png, jpg, gif or svg',
            'product_name.required' => 'Supplement Name is required.',
            'product_price.required' => 'Supplement Price is required.',
            'product_price.numeric' => 'Supplement Price must be a number.',
            'product_price.min' => 'Supplement Price must be at least 0.',
            'product_quantity.required' => 'Supplement Quantity is required.',
            'product_quantity.numeric' => 'Supplement Quantity must be a number.',
            'product_quantity.min' => 'Supplement Quantity must be at least 0.'
        ]);

        //product
        $product = array();
        $product['ProductName'] = $rqst->product_name;
        $product['CategoryID'] = $rqst->category;
        
        //image
        $get_image = $rqst->file('imageURL');
        if ($get_image) {
            $get_image_name = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_image_name));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            
            if ($rqst->category == '2') {
                $get_image->move('frontend/images/side', $new_image);

                $product['ImageURL'] = 'frontend/images/side/' . $new_image;
                DB::table('Product')->where('ProductID', $supplement_id)->update($product);
            } else if ($rqst->category == '3') {
                $get_image->move('frontend/images/salad', $new_image);

                $product['ImageURL'] = 'frontend/images/salad/' . $new_image;
                DB::table('Product')->where('ProductID', $supplement_id)->update($product);
            }else if ($rqst->category == '4') {
                $get_image->move('frontend/images/dessert', $new_image);

                $product['ImageURL'] = 'frontend/images/dessert/' . $new_image;
                DB::table('Product')->where('ProductID', $supplement_id)->update($product);
            } else {
                $get_image->move('frontend/images/drink', $new_image);

                $product['ImageURL'] = 'frontend/images/drink/' . $new_image;
                DB::table('Product')->where('ProductID', $supplement_id)->update($product);
            }
        }
        DB::table('Product')->where('ProductID', $supplement_id)->update($product);
        
        //productdetails
        $productDetails = array();
        $productDetails['ProductID'] = $supplement_id;
        $productDetails['PriceM'] = $rqst->product_price;
        $productDetails['QuantityM'] = $rqst->product_quantity;
        DB::table('ProductDetails')->where('ProductID', $supplement_id)->update($productDetails);
        
        Session::put('msg', 'Updated Supplement Successfully.');
        return redirect::to('all-supplement');
    }
    public function remove_supplement($supplement_id) {
        
        DB::table('ProductDetails')->where('ProductID', $supplement_id)->delete();
        DB::table('Product')->where('ProductID', $supplement_id)->delete();
        
        Session::put('msg', 'Removed Supplement Successfully.');
        return redirect::to('all-supplement');
    }

    //Order
    public function all_order() {

        $order = DB::table('Orders')->orderByDesc('OrderDate')
        ->join('User', 'Orders.UserID', '=', 'User.UserID')
        ->select('Orders.*', 'User.*')->paginate(8);
        
        return view('admin_pages.all_order')->with(['order' => $order]);
    }
    public function order_info($order_id) {
        
        $order = DB::table('Orders')->where('OrderID', $order_id)->first();

        $order_detail = DB::table('OrderDetails')
            ->join('Product','Product.ProductID','=','OrderDetails.ProductID')
            ->join('ProductDetails','Product.ProductID','=','ProductDetails.ProductID')
            ->select('OrderDetails.*','Product.*','ProductDetails.*')
            ->get();

        return view('admin_pages.order_info')->with(['order' => $order, 'order_detail' => $order_detail]);
    }
    public function update_order($order_id) {
        DB::table('Orders')->where('OrderID', $order_id)->update(['OrderStatus' => 'Delivered']);
        
        Session::put('msg', 'Updated Order Status Successfully.');
        return redirect::to('all-order');
    }
    public function order_search(Request $rqst) {
        
    $keyword = $rqst->input('search');

    $order_search = DB::table('Orders')->where(function($query) use ($keyword) {
        $query->where('OrderID', 'LIKE', '%'.$keyword.'%')
              ->orWhere('Username', 'LIKE', '%'.$keyword.'%');
        })
        ->orderByDesc('OrderDate')->join('User', 'Orders.UserID', '=', 'User.UserID')
        ->select('Orders.*', 'User.*')->paginate(8);

    return view('admin_pages.all_order', compact('order_search'));
    }
    
    //Blog
    public function add_blog() {
        return view('admin_pages.add_blog');
    }
    public function save_blog(Request $rqst){
        $rqst->validate([
            'BlogTitle' => 'required',
            'BlogContent' => 'required',
            'BlogIMG' => 'required'
        ],[
            'BlogTitle.required' => 'Title is required.',
            'BlogContent.required' => 'Content is required.',
            'BlogIMG.required' => 'Image is required.'
        ]);

        $Blog = array();
        $Blog['BlogTitle'] = $rqst->BlogTitle;
        $Blog['BlogContent'] = $rqst->BlogContent;
        //image
        $get_image = $rqst->file('BlogIMG');
        $get_image_name = $get_image->getClientOriginalName();
        $name_image = current(explode('.',$get_image_name));
        $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
        $get_image->move('frontend/images/blog', $new_image);

        $Blog['BlogIMG'] = 'frontend/images/blog/' . $new_image;
        DB::table('blog')->insert($Blog);
        return redirect::to('add_blog')->with('success','Added Blog Successfully.');
    }
    public function edit_blog($BlogID){
        $Blog = DB::table('blog')->where('blog.BlogID', $BlogID)->first();
        return view('admin_pages.edit_blog')->with(['blog' => $Blog]);
    }
    public function update_blog(Request $rqst,$BlogID){
        $rqst->validate([
            'BlogTitle' => 'required',
            'BlogContent' => 'required',
        ],[
            'BlogTitle.required' => 'Title is required.',
            'BlogContent.required' => 'Content is required.',
        ]);

        $Blog = array();
        $Blog['BlogTitle'] = $rqst->BlogTitle;
        $Blog['BlogContent'] = $rqst->BlogContent;
        //image

        $get_image = $rqst->file('BlogIMG');
        if ($get_image) {
            $get_image_name = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_image_name));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('frontend/images/blog', $new_image);
            $Blog['BlogIMG'] = 'frontend/images/blog/' . $new_image;
            DB::table('blog')->where('BlogID',$BlogID)->update($Blog);
        }
        DB::table('blog')->where('BlogID',$BlogID)->update($Blog);
        return redirect::to('all_blog')->with('success','Updated Blog Successfully.');
    }
    public function remove_blog($BlogID) {

        DB::table('blog')->where('BlogID',$BlogID)->delete();
        return redirect::to('all_blog')->with('success','Removed Blog Successfully.');
    }
    public function all_blog() {
        $blog = DB::table('blog')->get();
        return view('admin_pages.all_blog')->with(['blog' => $blog]);
    }

    //Promotions
    public function all_promotions(){
        $discount = DB::table('discount')->get();
        foreach ($discount as $item) {
            $item->MinimumAmount = number_format($item->MinimumAmount, 0);
            $item->MaximumAmount = number_format($item->MaximumAmount, 0);
        }
        return view('admin_pages.all_promotions')->with(['discount' => $discount]);
    }
    public function add_promotions(){
        return view('admin_pages.add_promotions');
    }
    public function save_promotions(Request $request) {
        
        $request->validate([
            'DiscountIMG' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'DiscountID' => 'required|max:20',
            'DiscountValue' => 'required|regex:/^\d+(\d{1})?%?$/|min:0',
            'DiscountName' => 'required',
            'MinimumAmount' => 'required|numeric|min:0',
            'MaximumAmount' => 'required|numeric|min:0',
            'StartDate' => 'required|date|after_or_equal:today',
            'EndDate' => 'required|date|after_or_equal:StartDate'
        ], [
            'DiscountIMG.required' => 'Please choose image',
            'DiscountIMG.image' => 'File upload must be image',
            'DiscountIMG.mimes' => 'format is jpeg, png, jpg.',
            'DiscountIMG.max' => 'Size must be smaller than or equal 2MB',
            'DiscountID.required' => 'Please enter the discount code',
            'DiscountID.max' => 'Discount codes cant exceed 20 characters',
            'DiscountValue.required' => 'Please enter the discount value',
            'DiscountName.required' => 'Please enter the discount name',
            'MinimumAmount.required' => 'Please enter the minimum quantity applicable to the discount',
            'MinimumAmount.numeric' => 'The minimum quantity to which the discount applies must be the number',
            'MaximumAmount.required' => 'Please enter the maximum quantity applicable to the discount',
            'MaximumAmount.numeric' => 'The maximum amount applicable to the discount must be the number',
            'StartDate.required' => 'Please enter the date your discount will start',
            'StartDate.date' => 'The discount start date must be a valid date',
            'StartDate.after_or_equal' => 'The discount start date must be greater than or equal to the current date',
            'EndDate.required' => 'Please enter the end date of the discount application',
            'EndDate.date' => 'The end date of the dicount must be a valid date',
            'EndDate.after_or_equal' => 'The end date of application of the discount must be greater than or to the current date'
        ]);
        
        $discount = array();
        $discount['DiscountID'] = $request->DiscountID;
        $discount['DiscountValue'] = $request->DiscountValue;
        $discount['DiscountName'] = $request->DiscountName;
        $discount['MinimumAmount'] = $request->MinimumAmount;
        $discount['MaximumAmount'] = $request->MaximumAmount;
        $discount['StartDate'] = $request->StartDate . ' 00:00:00';
        $discount['EndDate'] = $request->EndDate . ' 23:59:59';

        $get_image = $request->file('DiscountIMG');
        $get_image_name = $get_image->getClientOriginalName();
        $name_image = current(explode('.',$get_image_name));
        $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
        $get_image->move('frontend/images/promotion', $new_image);
        $discount['DiscountIMG'] = 'frontend/images/promotion/' . $new_image;

        DB::table('discount')->insert($discount);
        return redirect::to('add_promotions')->with('success','Added Discount Successfully.');
    }
    public function edit_promotions($DiscountID){
        $discount = DB::table('discount')->where('DiscountID',$DiscountID)->first();
        return view('admin_pages.edit_promotions')->with(['discount' => $discount]);
    }
    public function update_promotions(Request $request,$DiscountID){
        $request->validate([
            'DiscountIMG' => 'image|mimes:jpeg,png,jpg|max:2048',
            'DiscountID' => 'required|max:20',
            'DiscountValue' => 'required|regex:/^\d+(\d{1})?%?$/|min:0',
            'DiscountName' => 'required',
            'MinimumAmount' => 'required|numeric|min:0',
            'MaximumAmount' => 'required|numeric|min:0',
            'StartDate' => 'required|date|after_or_equal:today',
            'EndDate' => 'required|date|after_or_equal:StartDate'
        ], [
            'DiscountIMG.mimes' => 'Format is jpeg, png, jpg.',
            'DiscountIMG.max' => 'Size must be smaller than or equal 2MB',
            'DiscountID.required' => 'Please enter the discount code',
            'DiscountID.max' => 'Discount codes cant exceed 20 characters',
            'DiscountValue.required' => 'Please enter the discount value',
            'DiscountName.required' => 'Please enter the discount name',
            'MinimumAmount.required' => 'Please enter the minimum quantity applicable to the discount',
            'MinimumAmount.numeric' => 'The minimum quantity to which the discount applies must be the number',
            'MaximumAmount.required' => 'Please enter the maximum quantity applicable to the discount',
            'MaximumAmount.numeric' => 'The maximum amount applicable to the discount must be the number',
            'StartDate.required' => 'Please enter the date your discount will start',
            'StartDate.date' => 'The discount start date must be a valid date',
            'StartDate.after_or_equal' => 'The discount start date must be greater than or equal to the current date',
            'EndDate.required' => 'Please enter the end date of the discount application',
            'EndDate.date' => 'The end date of the discount must be a valid date',
            'EndDate.after_or_equal' => 'The end date of application of the discount must be greater than or to the current date'
        ]);
        
        $discount = array();
        $discount['DiscountID'] = $request->DiscountID;
        $discount['DiscountValue'] = $request->DiscountValue;
        $discount['DiscountName'] = $request->DiscountName;
        $discount['MinimumAmount'] = $request->MinimumAmount;
        $discount['MaximumAmount'] = $request->MaximumAmount;
        $discount['StartDate'] = $request->StartDate . ' 00:00:00';
        $discount['EndDate'] = $request->EndDate . ' 23:59:59';

        $get_image = $request->file('DiscountIMG');
        if ($get_image) {
            $get_image_name = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_image_name));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('frontend/images/promotion', $new_image);
            $discount['DiscountIMG'] = 'frontend/images/promotion/' . $new_image;
        }
        DB::table('discount')->where('DiscountID',$DiscountID)->update($discount);
        return redirect('all_promotions')->with('success','Updated Promotion Successfully.');
    }
    public function remove_promotions($DiscountID) {
        DB::table('discount')->where('DiscountID',$DiscountID)->delete();
        return redirect('all_promotions')->with('success','Remove Promotion Successfully.');
    }

    //Contact Us
    public function all_contact_pending() {
        $contact = DB::table('ContactUs')->where('ContactStatus','pending')->paginate(8);
        return view('admin_pages.all_contact_pending')->with(['contact' => $contact]);
    }
    public function all_contact_processed() {
        $contact = DB::table('ContactUs')->where('ContactStatus', 'processed')->paginate(8);
        return view('admin_pages.all_contact_processed')->with(['contact' => $contact]);
    }
    public function form_contact($contact_id) {
        $reply = DB::table('ContactUs')->where('ContactID', $contact_id)->first();
        return view('admin_pages.form_contact')->with(['reply' => $reply]);
    }
    public function reply_contact(Request $rqst, $contact_id) {

        $rqst->validate([
            'reply_subject' => 'required',
            'admin_reply' => 'required'
        ],[
            'reply_subject.required' => 'Reply Subject is required.',
            'admin_reply.required' => 'Admin Reply is required.'
        ]);
        
        $reply = array();
        $reply['AdminReply'] = $rqst->admin_reply;
        $reply['ContactEmail'] = $rqst->contact_email;
        $reply['ContactStatus'] = 'processed';

        DB::table('ContactUs')->where('ContactID', $contact_id)->update($reply);

        $reply_success = DB::table('ContactUs')->where('ContactID', $contact_id)->first();
        Session::put('reply_success', $reply_success->AdminReply);
        
        //argument 2 là 1 array, có thể dùng $reply hoặc khai báo mảng khác vd:array('message' => $reply['AdminReply'])
        //ở đây dùng session put để put lên trang reply contact nên không cần dùng mảng ở đây
        Mail::send('admin_pages.reply_contact',[], function($message) use ($rqst) {
            $message->from('support@testo.vn');
            $message->to($rqst->contact_email);
            $message->subject($rqst->reply_subject);
        });

        Session::put('msg', 'Reply to Customer successfully!');
        return redirect::to('all-contact-processed');
    }
}