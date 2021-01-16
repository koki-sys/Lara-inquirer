<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BookcartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nowurl = (empty($_SERVER['HTTPS']) ? 'http://' : 'https://') . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $indexurl = route('bookcart.index');
        $user_id = Auth::user()->id;
        $user = Rental::where('user_id', $user_id);
        $cart = $user->where('rental_flg', 0)->get();
        $cartcnt = $user->where('rental_flg', 0)->count();
        $rentalcnt = $user->where('rental_flg', 1)->count();


        $img_arry = [];
        foreach ($cart as $row) {
            $current_cart = Book::find($row->book_id);
            $img_arry[] = $current_cart->img;
        }

        return json_encode($img_arry, $nowurl, $indexurl, $cartcnt, $rentalcnt);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nowurl = (empty($_SERVER['HTTPS']) ? 'http://' : 'https://') . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $addurl = route('bookcart.store');

        if (Auth::check()) {
            // ログイン時の処理
            // bookテーブルの情報を取得
            $book = Book::find($request->cartid);
            $user_id = Auth::user()->id;

            // Rentalインスタンスの作成
            $cart = new Rental;

            // Rentalテーブルに追加する項目をセット
            $cart->user_id = $user_id;
            $cart->rental_date = date("Y-m-d");
            $cart->receipt_date = date("Y-m-d", strtotime("+3 day"));
            $cart->rental_number = 0;
            $cart->rental_flg = 0;
            $cart->receipt_library_id = $book->library_id;
            $cart->book_id = $book->id;

            // 保存処理
            $cart->save();

            // bookcartをすべて表示(ログインユーザの分)
            $bookcart = Rental::where('user_id', $user_id);
            $bookcarts = $bookcart->where('rental_flg', 0)->get();
            $cartcnt = $bookcart->where('rental_flg', '=', 0)->count();
            $rentalcnt = $bookcart->where('rental_flg', '=', 1)->count();

            // 今ブックカートに入っているものを取得する(foreach)
            $img_arry = [];
            foreach ($bookcarts as $row) {
                $current_cart = Book::find($row->book_id);
                $img_arry[] = $current_cart->img;
            }

            return json_encode($img_arry, $addurl, $nowurl, $rentalcnt, $cartcnt);
        } else {
            // 非ログイン時の処理
            return redirect('/login');
        }
    }

}
