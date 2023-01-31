<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Transaction;
use App\Models\Ttype;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function depositForm()
    {
        return view('deposit');
    }

    public function deposit(Request $request){
        $request->validate([
            'amount' => 'required|integer|min:100'
        ]);
            $account = Account::find(auth()->user()->account->id);
            $account->balance += $request->amount;
            if($account->update()){
                $transaction = new Transaction();
                $transaction->user_id = auth()->id();
                $transaction->account_id = auth()->user()->account->id;
                $transaction->amount = $request->amount;
                $transaction->ttype_id = Ttype::Depositing;
                $transaction->save();
                return back()->with('status',  $request->amount.' RWF deposited Successful');
            }
            else{
                return back()->with('failed', 'Failed to Deposit '.$request->amount." RWF");
            }
    }

    public function withdrawform(){
        return view('withdraw');
    }

    public function withdraw(Request $request){
        $request->validate([
            'amount' => 'required|integer|min:100'
        ]);
        $account = Account::find(auth()->user()->account->id);
        if($account->balance >= $request->amount){
            $account->balance -= $request->amount;
            if($account->update()){
                $transaction = new Transaction();
                $transaction->user_id = auth()->id();
                $transaction->account_id = auth()->user()->account->id;
                $transaction->amount = $request->amount;
                $transaction->ttype_id = Ttype::Withdrawing;
                $transaction->save();
                return back()->with('status',  $request->amount.' RWF Withdrawn Successful');
                
            }
            else{
                return back()->with('failed', 'Failed to Withdraw '.$request->amount." RWF");
            }
        }
        else{
            return back()->with('failed', 'Your Balance is not enough to withdraw '.$request->amount." RWF");
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */




    public function openAccount (Request $request)
    {
        $request->validate([
            'accno' => 'required|integer|unique:accounts,accno',
            'balance' => 'required|integer|min:0'
        ]);

        $account = new Account();
        $account->accno = $request->accno;
        $account->user_id = auth()->id();
        $account->balance = $request->balance;
        $account->created_at = now();
        if($account->save()){
            if($request->balance > 0){
                $transaction = new Transaction();
                $transaction->user_id = auth()->id();
                $transaction->account_id = auth()->user()->account->id;
                $transaction->amount = $request->balance;
                $transaction->ttype_id = Ttype::InitialDepositing;
                $transaction->save();
            }
            return redirect('/');
        }

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Account $account)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        //
    }
}
