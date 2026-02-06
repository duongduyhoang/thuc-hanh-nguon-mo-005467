<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //

    public function login()
    {
        return view('Login.login');
    }

    public function checkLogin(Request $request)
    {

        $dataForm = $request->only('email', 'password');


        // 2. Auth::attempt sẽ tự tìm User theo 'email', giải mã 'password' trong DB để so sánh
        if (
            Auth::attempt($dataForm)
        ) {

            $request->session()->regenerate();
            session(['user' => Auth::user()]);
            return redirect()->route('checkAge');

            // return 'Đăng nhập thành công' . response()->json($request->all());

        } else {
            // return 'Đăng nhập thất bại';
            return view('Login.login', [
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

        User::create([
            'name' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        // session([
        //     'register_user' => [
        //         'username' => $request->username,
        //         'password' => $request->password
        //     ]
        // ]);

        // return 'Đăng ký thành công' . response()->json($request->all());

        //with(): lưu xuống session
        // return redirect('/login')->with('success', 'Đăng ký thành công, hãy đăng nhập');
        // return view('Login.register', [
        //     'success' => 'Đăng ký thành công!'
        // ]);
        return redirect()
            ->route('login')
            ->with("message", "đăng nhập thành công");
    }

    //Logout
    public function Logout()
    {

        // session()->forget('register_user');
        //session()->flush();
        session()->forget(['user', 'is_adult', 'register_user']);
        return redirect()->route('login');
    }


    // check tuổi

    public function GetAge()
    {
        return view('CheckAge.checkAge');
    }

    public function CheckAge(Request $request)
    {

        session([
            'ageuser' => $request->confirm,
        ]);

        if (session('ageuser') == 'yes') {
            // Thiết lập session
            session(['is_adult' => true]);
            return redirect()->route('admin');
        } else {
            session()->forget(['user', 'is_adult', 'register_user']);
            return redirect()->route('login');
        }
    }
}
