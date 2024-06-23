<?php

namespace App\Http\Controllers\frontEnd\shope;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Coupons;
use App\Models\shop\cart;
use App\Models\shop\order;
use App\Models\shop\orderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ShoppingController extends Controller
{
    // public function shop($take = null)
    // {
    //     if ($take == null) {
    //         $category = Category::all();

    //         $list = Product::take(20)->get();
    //         $titlePass = "Cửa hàng";
    //         return view("frontEnd/shop/shop", [
    //             "titlePass" => $titlePass,
    //             "list" => $list,
    //             "category" =>  $category
    //         ]);
    //     } else {
    //         $category = Category::all();

    //         // $list = Product::take(20)->get();\
    //         $id_cate = Category::where("alias_sp", $take)->first();
    //         if ($id_cate) {
    //             $list = Product::where('categories_id', $id_cate->id)->take(20)->get();
    //         }
    //         $titlePass = "Cửa hàng";
    //         return view("frontEnd/shop/shop", [
    //             "titlePass" => $titlePass,
    //             "list" => $list,
    //             "category" =>  $category

    //         ]);
    //     }
    // }


    public function shop($take = null, $barnd_alias = null)
    {
        if ($take == null && $barnd_alias == null) {
            // tong san pham 
            $totalProduct = Product::count();
            $titlePass = "Cửa hàng";
            $category = Category::all();
            $list = Product::take(10)->get();

            $brand = Brand::all();

            return view("frontEnd/shop/shop", [
                "titlePass" => $titlePass,
                "list" => $list,
                "brand" =>  $brand,
                'totalProduct' => $totalProduct
            ]);
        } else {
            $titlePass = "Cửa hàng";
            $category = Category::all();
            $id_cate = Category::where('alias_sp', $take)->first();
            if ($id_cate == true && $barnd_alias == null) {
                $brand = Brand::where("categories_id", $id_cate->id)->get();
                $list = Product::take(20)->get();
                // tong san pham 
                $totalProduct = Product::where("categories_id", $id_cate->id)->count();
                $titlePass = "Cửa hàng";
                return view("frontEnd/shop/shop", [
                    "titlePass" => $titlePass,
                    "list" => $list,
                    "category" =>  $category,
                    "brand" =>  $brand,
                    'totalProduct' => $totalProduct

                ]);
            } else {
                $brand = Brand::where("categories_id", $id_cate->id)->get();
                $brands = Brand::where("alias", $barnd_alias)->first();
                $list = Product::where('categories_id', $id_cate->id)->where('brands_id', $brands->id)->take(20)->get();
              // tong san pham 
              $totalProduct = Product::where("categories_id", $id_cate->id)->where('brands_id', $brands->id)->count();
                return view("frontEnd/shop/shop", [
                    "titlePass" => $titlePass,
                    "list" => $list,
                    "category" =>  $category,
                    "brand" =>  $brand,
                    'totalProduct' => $totalProduct

                ]);
            }
        }
    }


    // public function addTocart(Request $request)
    // {

    //     $products_id = $request->input('products_id');
    //     $quantity = $request->input('quantity');
    //     $price_new = $request->input('price_new');

    //     if (Auth::check()) {
    //         $product_check = Product::where("id", $products_id)->first();

    //         if ($product_check) {

    //             if (cart::where("products_id", $products_id)->where('users_id', Auth::id())->exists()) {
    //                 return response()->json(['status' => $product_check->name . "Đã có trong giỏ hàng"]);
    //             } else {
    //                 $CartItem = new cart();
    //                 $CartItem->users_id = Auth::id();
    //                 $CartItem->products_id = $products_id;
    //                 $CartItem->product_price = $price_new;
    //                 $CartItem->quantity = $quantity;
    //                 $CartItem->total = $price_new * $quantity;
    //                 $CartItem->save();
    //                 return response()->json(['status' => "Đã thêm " . $product_check->name . "thành công"]);
    //             }
    //         }
    //     } else {
    //         return response()->json(['status' => "Bạn đang nhập trước khi thêm vào giỏ hàng"]);
    //     }



    // }

    // public function cart()
    // {
    //     $titlePass = "Giỏ hàng";
    //     $cartItem = cart::where('users_id', Auth::id())->get();
    //     $product = Product::all();
    //     return view("frontEnd/shop/cart", [
    //         "titlePass" => $titlePass,
    //         'cartItem' => $cartItem,
    //     ]);
    // }
    public function cart()
    {
        $titlePass = "Giỏ hàng";
        // $cartItems = Session::get('cart', []);
        // $cartItems = Session::get('cart', [])->where('users_id', Auth::id())->toArray();
        $cartItems = collect(Session::get('cart', []))->where('users_id', Auth::id())->toArray();
        $productIds = array_keys($cartItems);
        $products = Product::whereIn('id', $productIds)->get();


        return view("frontEnd/shop/cart", [
            "titlePass" => $titlePass,
            'cartItems' => $cartItems,
            'products' => $products,
        ]);
    }


    public function addToCart(Request $request)
    {

        $products_id = $request->input('products_id');
        $quantity = $request->input('quantity');
        $priceNew = $request->input('price_new');
        if (Auth::check()) {
            $productCheck = Product::where("id", $products_id)->first();

            if ($productCheck) {
                // Get the cart from the session or create an empty array
                $cart = Session::get('cart', []);

                // Check if the product already exists in the cart
                if (isset($cart[$products_id])) {


                    $cart[$products_id] = [
                        'users_id' => Auth::id(),
                        'product_id' => $products_id,
                        'quantity' => $quantity,
                        'price_new' => $priceNew,
                        'coupons_id' => 1,
                        'total' => $priceNew * $quantity,
                    ];

                    // Store the updated cart in the session
                    Session::put('cart', $cart);



                    return response()->json(['status' => $productCheck->name . " đã có trong giỏ hàng"]);
                } else {
                    // Add the product to the cart
                    $cart[$products_id] = [
                        'users_id' => Auth::id(),
                        'product_id' => $products_id,
                        'quantity' => $quantity,
                        'price_new' => $priceNew,
                        'total' => $priceNew * $quantity,
                    ];

                    // Store the updated cart in the session
                    Session::put('cart', $cart);

                    return response()->json(['status' => "Đã thêm " . $productCheck->name . " thành công"]);
                }
            }
        } else {
            return response()->json(['status' => "Bạn cần đăng nhập trước khi thêm vào giỏ hàng"]);
        }
    }






    public  function cartCheckout()
    {

        $titlePass = "Giỏ hàng";
        // $cartItem = cart::where('users_id', Auth::id())->get();


        $cartItems = collect(Session::get('cart', []))->where('users_id', Auth::id())->toArray();
        // @dd($cartItem);
        $products = Product::all();
        return view("frontEnd/shop/checkout", [
            "titlePass" => $titlePass,
            // 'cartItem' => $cartItem,
            'cartItem' => $cartItems,
            'products' => $products,


        ]);
    }

    public function coupons(Request $request)
    {
        $code = $request->all(); // lấy tất cả các dữ liệu đầu vào từ yêu cầu và gán chúng cho biến $code. 

        /*
        Ví dụ, nếu mã giảm giá được gửi dưới dạng tham số truy vấn trong URL 
        như example.com/coupons?code=ABC123, thì $code['code'] sẽ chứa giá trị "ABC123".
        */

        $Coupons = Coupons::where('code', $code['code'])->first(); // lấy giá trị trên data có bằng code nhập vào hay không
        if ($Coupons) {
            $code = $Coupons->count();
            if ($code > 0) {
                $dateEnd = $Coupons->date_end;
                $today = date('Y-m-d H:i:s');
                if ($dateEnd >  $today) {
                    $cou[] = array(
                        'code' => $Coupons->code, // thêm vào mã code cho Session
                        'reduce' => $Coupons->reduce, // thêm vào mã code cho giá 
                        'date_end' => $Coupons->date_end,
                    );
                    Session::put('Coupons', $cou);
                    // Session::save();x
                    return response()->json(['status' => "mã chính xác"]);
                } else {
                    $cou[] = array(
                        'code' => $Coupons->code, // thêm vào mã code cho Session
                        'reduce' => $Coupons->reduce, // thêm vào mã code cho giá 
                        'date_end' => $Coupons->date_end,
                    );
                    Session::put('Coupons', $cou);
                    return response()->json(['status' => "Mã giám giá đã quá han"]);
                }
            }
        } else {
            return response()->json(['status' => "mã không chính xác"]);
        }
    }


    public  function cartSuccess(Request $request)
    {


        if (Auth::check()) {

            $order = new order();
            $order->users_id = Auth::id();
            $order->name = $request->input('name');
            $order->addess = $request->input('addess');
            $order->phone = $request->input('phone');
            $order->email = $request->input('email');
            $order->note = $request->input('note');
            $order->total_order = $request->input('total_order');
            $order->save();


            $cartItems  =  collect(Session::get('cart', []))->where('users_id', Auth::id());

            foreach ($cartItems as $item) {
                orderItem::create(
                    [
                        'orders_id' => $order->id,
                        'products_id' => $item['product_id'],
                        'quantity' => $item['quantity'],
                        'product_price' => $item['price_new'],
                    ]
                );
            }
            return redirect()->route('cart');
        }
    }

    // public function deleteToCart(Request $request)
    // {
    //     $products_id = $request->input('products_id');

    //     if (Auth::check()) {

    //         if (cart::where("products_id", $products_id)->where('users_id', Auth::id())->exists()) {
    //             $cartItem = cart::where("products_id", $products_id)->where('users_id', Auth::id())->first();
    //             $cartItem->delete();

    //             return redirect('/gio-hang');
    //         }
    //     } else {
    //         return response()->json(['status' => "Bạn đang nhập trước khi thêm vào giỏ hàng"]);
    //     }
    // }

    // nút cập nhật tăng giá

    public function increasePrice(Request $request)
    {

        $products_id = $request->input('products_id');
        $quantity = $request->input('quantity');
        $priceNew = $request->input('price_new');

        $productCheck = Product::where("id", $products_id)->first();

        if ($productCheck) {
            $cart = Session::get('cart', []);
            if (isset($cart[$products_id])) {


                $cart[$products_id] = [
                    'users_id' => Auth::id(),
                    'product_id' => $products_id,
                    'quantity' => $quantity,
                    'price_new' => $priceNew,
                    'total' => $priceNew * $quantity,
                ];

                // Store the updated cart in the session
                Session::put('cart', $cart);

                return response()->json(['status' => "câp nhật thành công"]);
            }
        }
    }


    public function deleteToCart($productId)
    {
        $cart = Session::get('cart', []);

        if (array_key_exists($productId, $cart)) {
            unset($cart[$productId]);
            Session::put('cart', $cart);
            Session::get("code");
        }

        // Redirect back to the cart page or perform any other desired action
        return redirect()->route('cart');
    }
}
