<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;
use Alert;
use App\Helpers\OrderHelper;
use App\Models\Transaction;
use App\Models\TransactionItem;
use Carbon\Carbon;
use Cart;
use Illuminate\Support\Facades\Auth;

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
        $items = \Cart::getContent();
        $data['carts'] = $items;

        $subtotal = 0;
        foreach($items as $item) {
            $subtotal += $item->price * $item->quantity;
        }
        $data['subtotal'] = $subtotal;

        return view('cart.index', $data);
    }

    public function cartCheckout()
    {
        if(!Auth::check()) {
            return redirect('/login');
        }

        $items = \Cart::getContent();
        $data['carts'] = $items;

        $subtotal = 0;
        foreach($items as $item) {
            $subtotal += $item->price * $item->quantity;
        }
        $data['subtotal'] = $subtotal;

        return view('cart.checkout', $data);
    }

    public function createOrder(Request $req)
    {
        $last_order = Transaction::count();
        $items = \Cart::getContent();


        $total = 0;
        foreach($items as $item) {
            $total += $item->price * $item->quantity;
        }

        $trans = new Transaction;
        $trans->invno = OrderHelper::generateInvNo($last_order);
        $trans->date = Carbon::now();
        $trans->id_user = Auth::id();
        $trans->total = $total;
        $trans->status = 'created';

        $trans->user_name = $req->name;
        $trans->user_email = $req->email;
        $trans->user_telp = $req->telp;
        $trans->user_province = $req->province;
        $trans->user_city = $req->city;
        $trans->user_address = $req->address;
        $trans->user_kodepos = $req->kodepos;
        $trans->save();


        // detail trans;
        foreach($items as $item) {
            $tr_item = new TransactionItem;
            $tr_item->id_trans = $trans->id;
            $tr_item->id_item = $item->id;
            $tr_item->qty = $item->quantity;
            $tr_item->price = $item->price;
            $tr_item->subtotal = $item->quantity * $item->price;
            $tr_item->save();   

            // stock item berkurang
            $dbitem = Item::find($item->id);
            if($dbitem) {
                $dbitem->stock = $dbitem->stock - $item->quantity;
                $dbitem->save();
            }
        }


        \Cart::clear();
        
        Alert::success('Berhasil', 'Berhasil membeli belanjaan!');
        return redirect(url('/'));
    
    }

    public function addToCart($id, $qty)
    {
        $product = Item::find($id);
        if(!$product) {
            Alert::error('Gagal', 'Gagal! Produk tidak ditemukan');
        }

        if($product->stock < $qty) {
            Alert::error('Gagal', 'Gagal! Stock produk kurang dari ' . $qty . ' items');
        }

        $data = array(
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => (int) $qty,
            'attributes' => array(),
            'associatedModel' => $product
        );

        Cart::add($data);
        Alert::success('Berhasil', 'Berhasil menambahkan produk ke keranjang!');

        return redirect()->back();
    }

    public function updateItemInCart($id, $qty)
    {
        $product = Item::find($id);
        if(!$product) {
            Alert::error('Gagal', 'Gagal! Produk tidak ditemukan');
        }

        if($product->stock < $qty) {
            Alert::error('Gagal', 'Gagal! Stock produk kurang dari ' . $qty . ' items');
        }

        Cart::remove($id);
        $data = array(
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => (int) $qty,
            'attributes' => array(),
            'associatedModel' => $product
        );

        Cart::add($data);
        Alert::success('Berhasil', 'Berhasil mengupdate barang!');

        return redirect()->back();
    }

    public function removeFromCart($id)
    {
        Cart::remove($id);
        Alert::success('Berhasil', 'Berhasil menghapus barang!');
        return redirect()->back();
    }
}
