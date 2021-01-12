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
                    ->get();

                //予約個数確認
                $cnt = DB::table('rentals')
                    ->where('user_id', $user_id)
                    ->where('rental_flg', 1)
                    ->where('rental_number', $random)
                    ->count();

                $library = '';
                foreach ($query as $r) {
                    $library = Library::find($r->receipt_library_id);
                }
                return view('rental.create', compact('query', 'library', 'cnt'));
            } else {
                return redirect('/')->with('message', 'ブックカートが空です。書籍を予約する際は、ブックカートに入れて予約してください。');
            }
        } else {
            return redirect('/login');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
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

    // mylibraryの機能
    public function book()
    {
    }

    public function detail()
    {
    }
}
