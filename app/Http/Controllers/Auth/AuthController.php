<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ForgotRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function LoadLoginform()
    {
        if (Auth::check()) {
            return redirect()->route('home')->with('warning', 'Bạn đã đăng nhập, vui lòng đăng xuất trước khi đăng nhập với tài khoản khác');
        }
        return view("Auth.login");
    }
    public function LoadRegisterform()
    {
        if (Auth::check()) {
            return redirect()->route('home')->with('warning', 'Bạn đã đăng nhập, vui lòng đăng xuất trước khi thực hiện hành động đăng ký');
        }
        return view("Auth.register");
    }

    public function LoadForgotForm()
    {
        return view("Auth.forgot");
    }

    public function submitFomrForgot(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);
        $email = $request->email;
        $token = Str::random(60);
        $existingToken = DB::table('password_reset_tokens')
            ->where('email', $email)
            ->first();

        if ($existingToken) {
            DB::table('password_reset_tokens')
                ->where('email', $email)
                ->update([
                    'token' => $token,
                    'created_at' => Carbon::now(),
                ]);
        } else {
            // Nếu token không tồn tại, tạo mới
            DB::table('password_reset_tokens')->insert([
                'email' => $email,
                'token' => $token,
                'created_at' => Carbon::now(),
            ]);
        }

        Mail::send('Auth.forgetPassword', ['token' => $token], function ($message) use ($email) {
            $message->to($email);
            $message->subject('Vie send Reset Password');
        });
        return back()->with('success', 'Chúng tôi đã gửi một email để reset mật khẩu');
    }

    public function resetPassword($token)
    {
        return view('Auth.resetPassword', compact('token'));
    }

    public function submitResetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);
        $token = $request->token;
        $password = Hash::make($request->password);
        $tokenRow = DB::table('password_reset_tokens')
            ->where('token', $token)
            ->first();
        if (!$tokenRow) {
            return back()->with('error', 'Token không hợp lệ');
        }
        DB::table('users')
            ->where('email', $tokenRow->email)
            ->update([
                'password' => $password,
            ]);
        DB::table('password_reset_tokens')
            ->where('token', $token)
            ->delete();
        return redirect()->route('auth.LoadLoginform')->with('success', 'Đổi mật khẩu thành công');
    }


    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();
            if ($user->role_id == 1) {
                return redirect()->route('admin.dashboard')->with('success', 'Login Success');
            }
            return redirect()->route('home')->with('success', 'Login Success');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function register(RegisterRequest $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => 2,
        ]);
        return redirect()->route('auth.LoadLoginform')->with('success', 'Register Success');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home')->with('success', 'Đã đăng xuất');
    }
}
