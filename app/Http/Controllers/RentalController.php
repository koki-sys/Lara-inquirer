<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Rental;
use App\Models\Library;
use Illuminate\Support\Facades\DB;

class RentalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('rental.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()) {
            // ユーザidで取得
            $user_id = Auth::user()->id;

            // ブックカートに入っている個数をカウント
            $rente_cnt = DB::table('rentals')
                ->where('user_id', $user_id)
                ->where('rental_flg', 0)
                ->count();

            if ($rente_cnt != 0) {
                // 予約IDを生成
                $random = mt_rand(1, mt_getrandmax());

                // 貸出処理
                $rente = DB::table('rentals')
                    ->where('user_id', $user_id)
                    ->where('rental_flg', 0)
                    ->update(['rental_flg' => 1, 'rental_number' => $random]);

                // 貸出情報を取得
                $query = DB::table('rentals')
                    ->where('user_id', $user_id)
                    ->where('rental_flg', 1)
                    ->where('rental_number', $random)
                    ->first();

                //予約個数確認
                $cnt = DB::table('rentals')
                    ->where('user_id', $user_id)
                    ->where('rental_flg', 1)
                    ->where('rental_number', $random)
                    ->count();

                $library = '';
                $library = Library::find($query->receipt_library_id);

                return view('rental.create', compact('query', 'library', 'cnt'));
            } else {
                return redirect('/')->with('message', 'ブックカートが空です。書籍を予約する際は、ブックカートに入れて予約してください。');
            }
        } else {
            return redirect('/login');
        }
    }

    // mylibraryの機能
    public function mybook()
    {
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $mybook = Rental::with('book')
                ->where('user_id', 1)
                ->where('rental_flg', 1)
                ->get();

            return view('rental.mybook', compact('mybook'));
        } else {
            return redirect('/login');
        }
    }

    public function mydetail()
    {
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $detail = Rental::where('user_id', $user_id)
                ->where('rental_flg', 1)
                ->get();

            return view('rental.mydetail', compact('detail'));
        } else {
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
        if (Auth::check()) {
            $book = Rental::with('book')
                ->find($id);

            $library = Library::find($book->receipt_library_id);

            return view('rental.show', compact('book', 'library'));
        } else {
            return redirect('/login');
        }
    }
}
