<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Wallet;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'values' => 'required|int|max:5000000',
            'resource' => 'required',
            'user_id' => 'required',
            'type' => 'required',
        ]);
        $wallet = Wallet::where('user_id', $data['user_id'])->first();
        $newwallet = $wallet->toArray();
        if ($data['type'] == 0) {
            $newwallet['money'] = $newwallet['money'] + $data['values'];
        } else {
            $newwallet['money'] = $newwallet['money'] - $data['values'];
            if ($newwallet['money'] < 0) {
                return redirect()->route('category.create');
            }
        }
        $wallets = $wallet->update($newwallet);
        $category = Category::create($data);
        if ($category) {
            return redirect()->route('category.show', $data['type']);
        } else {
            return redirect()->route('category.show', $data['type']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($type)
    {
        $data = Category::where('user_id', Auth::id())
                        ->where('type', $type)
                        ->get();
        return view('categories.show')->with('category', $data);
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
