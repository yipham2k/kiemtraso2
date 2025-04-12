<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PTB1Controller extends Controller
{
    // Hiển thị form nhập phương trình bậc 1
    public function showForm()
    {
        return view('ptb1', ['kq' => null]);
    }

    // Xử lý giải phương trình bậc 1
    public function solve(Request $req)
    {
        $kq = '';

        if ($req->has('hsa') && $req->has('hsb')) {
            $a = $req->input('hsa');
            $b = $req->input('hsb');

            if ($a == 0) {
                $kq = $b == 0 ? "Phương trình có vô số nghiệm" : "Phương trình vô nghiệm";
            } else {
                $x = -$b / $a;
                $kq = "Phương trình có nghiệm x = " . $x;
            }
        }

        return view('ptb1', ['kq' => $kq]);
    }
}
