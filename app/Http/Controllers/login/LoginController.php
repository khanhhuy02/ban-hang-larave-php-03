<?php

namespace App\Http\Controllers\login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\authLogin\UserInformations;
use Illuminate\Support\Facades\Hash;
use App\Models\Category;
use App\Models\shop\order;
use App\Models\shop\orderItem;

class LoginController extends Controller
{

    public function login()
    {
        $titlePass = "Đang nhập";
        return view("frontEnd/login/login", [
            "titlePass" => $titlePass
        ]);
    }

    // AM3
    public function loginAdmin()
    {
        $titlePass = "Đăng nhập admin";
        return view("login/loginAdmin", [
            "titlePass" => $titlePass
        ]);
    }

    public function PostloginAdmin(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => 1])) {

            return redirect()->route('product.store');
        } else {
            return redirect()->route('loginAdmin.login')->with('error', 'Tài Khoản hoặc mật khẩu không chính xác');
        }
    }

    // USER
    public function register(Request $request)
    {
        $request->merge(['password' => Hash::make($request->password)]);
        try {
            $user_informations = User::create($request->all());
            $cerate = new UserInformations;
            $cerate->users_id =  $user_informations->id;

            $cerate->save();
        } catch (\Throwable $th) {
            //throw $th;

        }
        return redirect()->route('login.login');
    }


    public function PostLogin(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            # code...
            return redirect()->route('home');
        } else {
            return redirect()->route('login.login')->with('error', 'Tài Khoản hoặc mật khẩu không chính xác');
        }
    }


    public function MyAccount()
    {
        $titlePass = "Đang nhập";
        $account = User::where("id", Auth::user()->id)->first();
        $showProduct = Order::where("users_id", Auth::user()->id)->get();


        $orderIds = $showProduct->pluck('id')->toArray();
      

        $order_items = OrderItem::whereIn("orders_id", $orderIds)->get();
        // dd($orderIds);

        return view("frontEnd/login/myAccount", [
            "titlePass" => $titlePass,
            'account' => $account,
            'order_items' => $order_items,
            'showProduct' => $showProduct,
        ]);




        // $titlePass = "Đang nhập";
        // $account = User::where("id", Auth::user()->id)->first();

        // $showProduct = Order::where("users_id", Auth::user()->id)->get();


        // return view("frontEnd/login/myAccount", [
        //     "titlePass" => $titlePass,
        //     'account' => $account,
        //     'showProduct' => $showProduct,
        // ]);
    }

    public function UpdateMyAccount(Request $request)
    {
        if (Auth::check()) {
            $data = array();
            $data['name'] = $request->name;
            $data['email'] = $request->input('email');
            $user_id = auth()->user()->id;
            $user_updated = User::where('id', $user_id)->update($data);

            if ($user_updated) {
                $user_informations = UserInformations::where('users_id', $user_id)->first();
                if ($user_informations) {
                    $user_informations->phone = $request->phone;
                    $user_informations->address = $request->address;
                    $user_informations->update();
                }
                // else {
                //     $new_user_informations = new UserInformations();
                //     $new_user_informations->users_id = $user_id;
                //     $new_user_informations->phone = $request->phone;
                //     $new_user_informations->address = $request->address;
                //     $new_user_informations->update();
                // }
            }
        }
        return redirect()->route('myAccount.login');
    }


    // public function showProduct(){

    // }

    public function loginOut()
    {
        $titlePass = "Đang nhập";
        Auth::logout();

        return redirect()->back();
    }
}
