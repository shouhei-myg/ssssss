<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;

class UserController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // itemDBから取得し一覧画面に表示
    public function index() {
        //userテーブルからname,を$usersに格納
        $items = DB::table('items')
            ->select('items.id as item_id', 'users.id as user_id', 'product_name', 'name', 'usage', 'items.created_at', 'situation', 'url')
            ->join('users', 'items.user_id', '=', 'users.id')
            ->get();
        $user = Auth::user();

        //viewを返す(compactでviewに$usersを渡す)
        return view('user/index', compact('items', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     // itemの申請一覧画面
    public function create() {

        return view('user/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $item=new Item;
        $item->product_name = $request->input('product_name');
        $item->url = $request->input('url');
        $item->usage = $request->input('usage');
        $item->user_id = Auth::id();
        $item->save();

        //一覧表示画面にリダイレクト
        return redirect('user/index');
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
        $item = Item::find($id);

        return view('user/edit', compact('item'));

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
        $item = Item::find($id);
        $item->situation=$request->input('situation');

        //DBに保存
        $item->save();

        //処理が終わったらmember/indexにリダイレクト
        return redirect('user/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id) {
        // itemテーブルから指定のIDのレコード1件を取得
        $item = Item::find($id);
        $user_id = Auth::id();
        // dd($item->situation);
        if($item->situation == null && $item->user_id == $user_id) {
            // レコードを削除
            $item->delete();
        }
        // 削除したら一覧画面にリダイレクト
        return redirect()->route('user.index');
    }
}
