<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function home()
    {
        return view('index');
    }

    public function shopList()
    {
        return view('shop.index');
    }

    public function shopDetail(Request $req, $id, $slug)
    {
        $product = [
            'name' => 'Jam Tangan Bagus',
            'desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis quas porro, nesciunt, rerum repellendus tempore voluptatem est ipsam neque voluptas reiciendis itaque? Mollitia exercitationem aliquid facere eum, expedita voluptatibus! Harum?',
            'price' => 50000
        ];

        $data = [
            'id' => $id,
            'slug' => $slug,
            'product' => $product
        ];
        return view('shop.detail', $data);
    }
}
