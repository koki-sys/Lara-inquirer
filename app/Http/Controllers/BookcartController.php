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

        return view(
            'bookcart.index',
            [
                'img_arry' => $img_arry,
                'nowurl' => $nowurl,
                'indexurl' => $indexurl,
                'cartcnt' => $cartcnt,
                'rentalcnt' => $rentalcnt
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

            return view(
                'bookcart.store',
                [
                    'img_arry' => $img_arry,
                    'addurl' => $addurl,
                    'nowurl' => $nowurl,
                    'rentalcnt' => $rentalcnt,
                    'cartcnt' => $cartcnt
                ]
            );
        } else {
            // 非ログイン時の処理
            return redirect('/login');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
