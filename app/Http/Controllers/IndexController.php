<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function home()
    {
        $item = Item::orderBy('name', 'ASC')
                    ->limit(8)
                    ->get();
        
        // $item to sql
        // SELECT * FROM items WHERE price <= 100000 ORDER BY name ASC LIMIT 8

        $data = [
            'items' => $item
        ];
        return view('index', $data);
    }

    public function login()
    {
        return view('login');
    }

    public function shopIndex(Request $req)
    {
        $data['categories'] = Category::with('childs')
                    ->where(['id_parent' => NULL],['name' => 1])
                    ->get();

        $item = Item::select('*');

        if(isset($req->sorting)) {
            if ($req->sorting == 'name_za') {
                $sorting = 'name';
                $by = 'DESC';
            } else if ($req->sorting == 'price_low') {
                $sorting = 'price';
                $by = 'ASC';
            } else if ($req->sorting == 'price_high') {
                $sorting = 'price';
                $by = 'DESC';
            } else {
                $sorting = 'name';
                $by = 'ASC';
            }

            $item = $item->orderBy($sorting, $by);
        }

        $data['items'] = $item->paginate(6);

        return view('shop.index', $data);
    }

    public function shopDetail(Request $req, $id, $slug)
    {
        // $product = Item::find($id);
        $product = Item::where([
            'id' => $id,
            'slug' => $slug
        ])->first();

        if(!$product) abort(404);

        $data = [
            'id' => $id,
            'slug' => $slug,
            'product' => $product
        ];
        return view('shop.detail', $data);
    }

    public function cartIndex()
    {
        return view('cart.index');
    }

    public function cartCheckout()
    {
        return view('cart.checkout');
    }
}
