<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use App\Http\Requests\StoreproductRequest;
use App\Http\Requests\UpdateproductRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     function index()
    {
        $data=product::all();
        return view('products',['products'=>$data]);
    }
    public function detail($id)
    {
        $product = Product::find($id); // Fetch the product details by ID
        if ($product) {
            return view('detail', ['product' => $product]);
        } else {
            return redirect('/')->with('error', 'Product not found');
        }
    }
    public function search(Request$req)
    {
       
        //$query = $req->input('query');
    // $data = Product::where('name', 'like', '%',$req->input('query') ,'%')->get();
    // return view('search', ['products' => $data]);
    $query = $req->input('query');
    $data = Product::where('name', 'like', '%' . $query . '%')->get();
    return view('search', ['products' => $data]);
    }
    public function cartItemCount()
    {
        if (Session::has('user')) {
            $userId = Session::get('user')['id'];
            return Cart::where('user_id', $userId)->count();
        }
        return 0;
    }

    public function addToCart(Request $request)
{
    if ($request->session()->has('user')) {
        $userId = $request->session()->get('user')['id'];
        $productId = $request->product_id;

        // Check if the item already exists in the cart for this user
        $existingCartItem = Cart::where('user_id', $userId)
                                ->where('product_id', $productId)
                                ->first();

        if ($existingCartItem) {
            // If item exists, increase the quantity
            $existingCartItem->quantity += 1;
            $existingCartItem->save();
        } else {
            // Otherwise, create a new cart item
            $cart = new Cart;
            $cart->user_id = $userId;
            $cart->product_id = $productId;
            $cart->quantity = 1; // Default quantity
            $cart->save();
        }

        return redirect('/')->with('success', 'Product added to cart successfully');
    } else {
        return redirect('/login')->with('error', 'You need to be logged in to add to cart');
    }
}
    public function cartlist()
    {
        if (Session::has('user')) {
            $userId = Session::get('user')['id'];
            // Fetch distinct products from the cart associated with the user
            $cartItems = DB::table('carts')
                ->join('products', 'carts.product_id', '=', 'products.id')
                ->select('products.*', 'carts.id as id')
                ->where('carts.user_id', $userId)
                //->groupBy('carts.product_id')
                ->distinct()
                ->get();

            return view('cartlist', ['cartItems' => $cartItems]);
        } else {
            return redirect('/login')->with('error', 'You need to be logged in to view your cart');
        }
    }
        public function removeFromCart(Request $request)
        {
            if (Session::has('user')) {
                $cartId = $request->id;
                if ($cartId) {
                    DB::table('carts')->where('id', $cartId)->delete();
                    return redirect('/cartlist')->with('success', 'Product removed from cart successfully');
                } else {
                    return redirect('/cartlist')->with('error', 'Cart item ID not found');
                }
            } else {
                return redirect('/login')->with('error', 'You need to be logged in to remove items from the cart');
            }
        }

        public function order()
        {
            
            $userId = Session::get('user')['id'];
            $cartItems = Cart::join('products', 'carts.product_id', '=', 'products.id')
                            ->where('carts.user_id', $userId)
                            ->select('products.*', 'carts.quantity')
                            ->get();
    
            // Calculate total amount
            $total = $cartItems->sum(function ($item) {
                return $item->price * $item->quantity;
            });
    
            // Pass data to the view
            return view('order', compact('cartItems', 'total'));
        }
    
        public function placeOrder(Request $request)
        {
            
            return redirect('/')->with('success', 'Order placed successfully!');
        }
}

