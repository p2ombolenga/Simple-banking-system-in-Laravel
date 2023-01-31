<?php

namespace App\Http\Controllers;
use App\Models\Ttype;
use App\Models\Account;
use App\Models\Loan;
use App\Models\Transaction;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('requestLoan');
    }

    public function getLoan(Request $request){
        $request->validate([
            'amount' => 'required|integer|min:1000'
        ]);

        $loan = new Loan();
        $loan->user_id = auth()->id();
        $loan->account_id = auth()->user()->account->id;
        $loan->amount = $request->amount;
        if($loan->save()){
            $account = Account::find(auth()->user()->account->id);
            $account->balance += $request->amount;
            if($account->update()){
                $transaction = new Transaction();
                $transaction->user_id = auth()->id();
                $transaction->account_id = auth()->user()->account->id;
                $transaction->amount = $request->amount;
                $transaction->ttype_id = Ttype::GettingLoan;
                $transaction->save();
                return back()->with('status', auth()->user()->firstname.' '.auth()->user()->lastname .' You Got loan of: '.$request->amount.' RWF');
            }
        }

    }


    public function payForm(){
        return view('payLoan');
    }

    public function payLoan(Request $request){
        $request->validate([
             'amount' => 'required|integer'
         ]);
        
         $loan = Loan::where('user_id', auth()->id());

        if($request->amount == auth()->user()->loans->sum('amount') && $request->amount > 0){
            $account = Account::find(auth()->user()->account->id);

            if($account->balance >= $request->amount){
                $account->balance -= $request->amount;
                if($account->update()){
                    $transaction = new Transaction();
                    $transaction->user_id = auth()->id();
                    $transaction->account_id = auth()->user()->account->id;
                    $transaction->amount = $request->amount;
                    $transaction->ttype_id = Ttype::PayingLoan;
                    if($transaction->save()){
                        $loan->delete();
                        return back()->with('status', 'Dear customer you have paid your full loan of: '.$request->amount.' RWF');
                    }
                    else {
                        return back()->with('failed', 'Failed to process your loan paymment ');
                    }
                }
            }
            else {
                return back()->with('failed', 'You do not have enough funds to pay your full loan');
            }
    }
        else{
            return back()->with('failed', auth()->user()->loans->sum('amount') != 0 ? 'We Only Allow Full Loan Payment!!  your Full Loan is '.auth()->user()->loans->sum('amount').' RWF Check the amount you are paying and try again' : 'You have no Loan');
        }

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function show(Loan $loan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function edit(Loan $loan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Loan $loan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Loan $loan)
    {
        //
    }
}
