<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    // tên hàm này viết trong route
    public function Index()
    {
        return view('product.prd', [
            "Product" => [
                ["id" => 1, "name" => "Bo", "price" => "17900.000"],
                ["id" => 2, "name" => "Dua Hau", "price" => "27300.000"],
                ["id" => 3, "name" => "Ga", "price" => "300.000"],
                ["id" => 4, "name" => "Kem", "price" => "700.000"],
                ["id" => 5, "name" => "Vit", "price" => "20.000"],
                ["id" => 6, "name" => "Cam", "price" => "1000.000"],
            ]
        ]);
    }
    //getdetil
    public function GetDetail(int $id)
    {

        $Product = [
            ["id" => 1, "name" => "Bo", "price" => "17900.000"],
            ["id" => 2, "name" => "Dua Hau", "price" => "27300.000"],
            ["id" => 3, "name" => "Ga", "price" => "300.000"],
            ["id" => 4, "name" => "Kem", "price" => "700.000"],
            ["id" => 5, "name" => "Vit", "price" => "20.000"],
            ["id" => 6, "name" => "Cam", "price" => "1000.000"],
        ];

        $prd_detail = null;
        foreach ($Product as $prd) {
            if ($prd['id'] == $id) {

                $prd_detail = $prd;
                break;
            }
        }

        // return view('product.detail_prd', ['id' => $id]);
        return view('product.detail_prd', ['prd_detail' => $prd_detail]);
    }

    public function CreatProduct()
    {

        return view('product.prd_create');
    }

    //     public function store(Request $request){

    //     $data = $request->all();
    //     return $data;

    // } 

    public function login()
    {
        return view('Login.login');
    }

    public function checkLogin(Request $request)
    {
        // if ($request->input('username') == 'hieulx' && $request->input('password') == '123') {
        //     return 'Đăng nhập thành công' . response()->json($request->all());
        // } else {
        //     return 'Đăng nhập thất bại';
        // }

        $user = session('register_user');

        if (
            $request->input('username') == $user['username'] &&
            $request->input('password') == $user['password']
        ) {
            // return 'Đăng nhập thành công' . response()->json($request->all());
            return view('Login.login', [
                'success' => 'Đăng nhập thành công!'
            ]);
        } else {
            // return 'Đăng nhập thất bại';
            return view('Login.login',[
                'error' => 'Sai tài khoản hoặc mật khẩu!'
            ]);
        }
    }

    //Register
    public function  register()
    {
        return view('Login.register');
    }

    public function checkRegister(Request $request)
    {

        // Kiểm tra mật khẩu nhập lại
        if ($request->password != $request->password_confirm) {
            // return back()->with('error', 'Mật khẩu nhập lại không khớp');
            return view('Login.register', [
                'error' => 'Mật khẩu nhập lại không khớp!'
            ]);
        }

        session([
            'register_user' => [
                'username' => $request->username,
                'password' => $request->password
            ]
        ]);

        // return 'Đăng ký thành công' . response()->json($request->all());

        //with(): lưu xuống session
        // return redirect('/login')->with('success', 'Đăng ký thành công, hãy đăng nhập');
        return view('Login.register', [
            'success' => 'Đăng ký thành công!'
        ]);


        // if ($request->input('username') == 'h' && $request->input('password') == '12') {

        //     return 'Đăng ký thành công' . response()->json($request->all());
        // } else {
        //     return 'Đăng Ký thất bại';
        // }
    }
}
