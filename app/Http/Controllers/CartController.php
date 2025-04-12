<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Session;

class CartController extends Controller
{
    // Thêm sản phẩm vào giỏ hàng
    public function addToCart(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);
        $cart = Session::get('cart', []);

        $found = false;

        foreach ($cart as &$item) {
            if ($item['item']->id === $product->id) {
                $item['qty']++;
                $item['price'] = $item['item']->price * $item['qty'];
                $found = true;
                break;
            }
        }

        if (!$found) {
            $cart[] = [
                'item' => $product,
                'qty' => 1,
                'price' => $product->price
            ];
        }

        Session::put('cart', $cart);
        return redirect()->back()->with('message', 'Đã thêm sản phẩm vào giỏ hàng!');
    }

    // Hiển thị giỏ hàng
    public function index()
    {
        $cart = Session::get('cart', []);
        return view('cart.index', compact('cart'));
    }

    // Cập nhật số lượng sản phẩm
    public function update(Request $request)
    {
        $cart = Session::get('cart', []);
        $productIds = $request->input('product_id');
        $quantities = $request->input('quantity');

        foreach ($cart as &$item) {
            $key = array_search($item['item']->id, $productIds);
            if ($key !== false && isset($quantities[$key])) {
                $item['qty'] = max(1, (int)$quantities[$key]);
                $item['price'] = $item['item']->price * $item['qty'];
            }
        }

        Session::put('cart', $cart);
        return redirect()->back()->with('message', 'Giỏ hàng đã được cập nhật!');
    }

    // Xóa một sản phẩm khỏi giỏ hàng
    public function remove($productId)
    {
        $cart = Session::get('cart', []);

        foreach ($cart as $key => $item) {
            if ($item['item']->id == $productId) {
                unset($cart[$key]);
                break;
            }
        }

        Session::put('cart', array_values($cart)); // Reset index array
        return redirect()->back()->with('message', 'Sản phẩm đã được xóa khỏi giỏ hàng!');
    }

    // Xóa toàn bộ giỏ hàng
    public function clear()
    {
        Session::forget('cart');
        return redirect()->back()->with('message', 'Đã xóa toàn bộ giỏ hàng!');
    }

    // Trang thanh toán
    public function thanhtoan()
    {
        $cart = Session::get('cart', []);
        return view('cart.checkout', compact('cart'));
    }
}
