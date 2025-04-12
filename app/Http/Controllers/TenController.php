<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class TenController extends Controller
{
    public function index()
    {
        $new_products = Product::where('is_new', 1)->get(); // hoặc bất kỳ logic nào bạn muốn
    
        return view('index', compact('new_products'));
    }
    public function getIndex()
    {
        $new_products = Product::orderBy('id', 'desc')->take(4)->get();
        return view('index', compact('new_products'));
    }
    
    public function showRegisterForm()
    {
        return view('dangky');
    }

    public function postRegister(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('index')->with('success', 'Đăng ký thành công!');
    }

    public function showLoginForm()
    {
        return view('dangnhap');
    }

    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('index')->with('success', 'Đăng nhập thành công!');
        }

        return back()->withErrors(['email' => 'Thông tin đăng nhập không chính xác.']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('index');
    }
    public function search(Request $request)
    {
        $keyword = $request->input('s');

        $products = Product::where('name', 'like', "%$keyword%")
            ->orWhere('description', 'like', "%$keyword%")
            ->get();

        return view('timkiem', compact('products', 'keyword'));
    }
    public function show($id)
    {
        $product = Product::findOrFail($id);
        $related_products = Product::where('id', '!=', $id)
                            ->where('category_id', $product->category_id)
                            ->take(3)
                            ->get();
        return view('product', compact('product', 'related_products'));
    }
    public function getGioHang()
    {
        $cart = session('cart', []); // mảng chứa sản phẩm trong giỏ hàng
        return view('giohang', compact('cart'));
    }
}
