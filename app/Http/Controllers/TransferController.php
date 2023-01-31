<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Transaction;
use App\Models\Transfer;
use App\Models\Ttype;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('send-money');
    }


    public function send(Request $request){
        $request->validate([
            'ReceiverAccountNumber' => 'required',
            'amount' => 'required|integer'
        ]);


        $receiver = Account::where('accno', $request->ReceiverAccountNumber)->first();
        if($receiver != null){
            if($receiver->user_id != auth()->id()){
                if(auth()->user()->account->balance >= $request->amount){
                    $sender = Account::where('accno', auth()->user()->account->accno)->first();
                    $sender->balance -= $request->amount;
                    if($sender->update()){
                        $receiver->balance += $request->amount;

                        if($receiver->update()){

                            $transaction = new Transaction();
                            $transaction->user_id = auth()->id();
                            $transaction->account_id = auth()->user()->account->id;
                            $transaction->amount = $request->amount;
                            $transaction->ttype_id = Ttype::SendMoney;
                            if($transaction->save()){
                                $transaction2 = new Transaction();
                                $transaction2->user_id = $receiver->user_id;
                                $transaction2->account_id = $receiver->id;
                                $transaction2->amount = $request->amount;
                                $transaction2->ttype_id = Ttype::ReceiveMoney;
                                if($transaction2->save()){
                                    $transfer = new Transfer();
                                    $transfer->sender_id = auth()->id();
                                    $transfer->receiver_id = $receiver->user_id;
                                    $transfer->account_id = $receiver->id;
                                    $transfer->amount = $request->amount;
                                    $transfer->save();
                                    return back()->with('status',  $request->amount.' RWF Successful sent to '.$receiver->accno);
                                }
                            }

                        }
                    }
                }
                else{
                    return back()->with('failed', 'You don\'t have enogh funds to send '.$request->amount.' RWF');
                }
            }
            else{
                return back()->with('failed', 'You can not send money to your own account: '.$request->ReceiverAccountNumber);
            }
        }
        else{
            return back()->with('failed', 'No account number matches: '.$request->ReceiverAccountNumber);
        }

    }

    public function sent(){
        return view('sent-money',['transfers' => Transfer::latest()->get()]);
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
     * @param  \App\Models\Transfer  $transfer
     * @return \Illuminate\Http\Response
     */
    public function show(Transfer $transfer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transfer  $transfer
     * @return \Illuminate\Http\Response
     */
    public function edit(Transfer $transfer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transfer  $transfer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transfer $transfer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transfer  $transfer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transfer $transfer)
    {
        //
    }
}
