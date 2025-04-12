<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Session;

class GioHangController extends Controller
{
    // Thêm sản phẩm vào giỏ hàng
    public function addToCart($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return redirect()->back()->with('message', 'Sản phẩm không tồn tại!');
        }

        // Kiểm tra nếu có giỏ hàng trong session, nếu không thì tạo mới
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $id);

        // Lưu giỏ hàng vào session
        Session::put('cart', $cart);

        return redirect()->route('giohang.index')->with('message', 'Đã thêm sản phẩm vào giỏ hàng!');
    }

    // Hiển thị giỏ hàng
    public function index()
    {
        return view('giohang');
    }

    // Cập nhật số lượng sản phẩm trong giỏ hàng
    public function update(Request $request)
    {
        if (Session::has('cart')) {
            $cart = new Cart(Session::get('cart'));

            foreach ($request->product_id as $key => $id) {
                $qty = $request->quantity[$key];
                $cart->update($id, $qty);
            }

            // Cập nhật lại giỏ hàng trong session
            Session::put('cart', $cart);
            return redirect()->route('giohang.index')->with('message', 'Cập nhật giỏ hàng thành công!');
        }

        return redirect()->route('giohang.index')->with('message', 'Giỏ hàng trống.');
    }

    // Xóa sản phẩm khỏi giỏ hàng
    public function remove($id)
    {
        if (Session::has('cart')) {
            $cart = new Cart(Session::get('cart'));
            $cart->remove($id);
            Session::put('cart', $cart);
        }

        return redirect()->route('giohang.index')->with('message', 'Đã xóa sản phẩm khỏi giỏ hàng!');
    }

    // Xóa toàn bộ giỏ hàng
    public function clear()
    {
        Session::forget('cart');
        return redirect()->route('giohang.index')->with('message', 'Đã xóa toàn bộ giỏ hàng!');
    }

    // Đặt hàng (checkout)
    public function thanhtoan()
    {
        return view('thanhtoan');
    }
}
