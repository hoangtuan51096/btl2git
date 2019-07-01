<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wallet;
use App\Models\Category;
use App\Models\Transaction;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('transactions.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = User::where('id', '!=', Auth::id())->get();
        return view('transactions.create')->with('data_user', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        Validator::make($data, [
            'to_wallet_id' => ['required'],
            'from_wallet_id' => ['required'],
            'values' => ['required', 'int', 'max:255'],
            'desc' => ['required', 'string'],
        ]);
        if ($data['to_wallet_id'] == null) {
            session()->flash('error', 'Vui long chon tai khoan nhan.');
            return redirect()->route('transaction.create');
        }
        $checkValue = Wallet::where('user_id', $data['from_wallet_id'])->first();
        $addValue = Wallet::where('user_id', $data['to_wallet_id'])->first();
        $data['from_wallet_id'] = $checkValue['from_wallet_id'];
        $data['to_wallet_id'] = $checkValue['to_wallet_id'];
        if (empty($addValue)) {
            session()->flash('error', 'Tai khoan nhan chua tao vi!');
            return redirect()->route('transaction.create');
        }
        if ($checkValue->money >= $data['values']) {
            $checkValue->money -= $data['values'];
            $addValue->money += $data['values'];
        } else {
            session()->flash('error', 'So du tai khoan khong du (<'.$checkValue->money.'$).');
            return redirect()->route('transaction.create');
        }
        $from_wallets = $checkValue->update($checkValue->toArray());
        $to_wallets = $addValue->update($addValue->toArray());
        $transactions = Transaction::create($data);
        if ($transactions) {
            session()->flash('status', 'Thuc hien giao dich thanh cong');
            return redirect()->route('transaction.show', $data['from_wallet_id']);
        } else {
            session()->flash('error', 'Thuc hien giao dich khong thanh cong vui long thu lai.');
            return redirect()->route('transaction.create');
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
        $data = Transaction::where('from_wallet_id', $id)
                            ->with('fromWallet', 'toWallet')
                            ->orwhere('to_wallet_id', $id)
                            ->paginate(5);
                            // dd($data);
        return view('transactions.show', compact('data'));
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
    public function search(Request $request)
    {
        if ($request->type == null) {
            return redirect('home');
        };
        $wallet = Wallet::where('user_id', $request->id)->first();
        $walletID = $wallet->id;
        if ($request->type == 0) {
            if ($request->values == 'Nhan tien') {
                $data = Transaction::where('to_wallet_id', $walletID)->paginate(5);
                session()->flash('searchgiaodich', 'Nhan tien');
                return view('transactions.show', compact('data'));
            } elseif ($request->values == 'Gui tien') {
                $data = Transaction::where('from_wallet_id', $walletID)->paginate(5);
                session()->flash('searchgiaodich', 'Gui tien');
                return view('transactions.show', compact('data'));
            }
        } else {
            $data = Transaction::where('from_wallet_id', $walletID)
                                ->whereDate('created_at', $request->values)
                                ->paginate(5);
            return view('transactions.show', compact('data'));
        }
    }
}
