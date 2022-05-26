<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $transacts = DB::table('transactions')
            ->join('caisses', 'caisses.id', '=', 'transactions.id_caisse')
            ->select('transactions.*', 'caisses.type_caisse')
            ->get();
        return response()->json($transacts,200);
        // return view('transactList',['transacts'=>$transacts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'type_trans' => 'required',
            'solde_trans' => 'required',
            'id_caisse' => 'required',
            'solde_caisse' => 'required',
            'date_trans' => 'required'
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }
        $transact = Transaction::create($request->all());
        return response()->json($transact,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transact = Transaction::find($id);
        if(is_null($transact)){
            return response()->json('Record not found',404);
        }
        return response()->json($transact,200);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $transact = Transaction::find($id);
        if(is_null($transact)){
            return response()->json('Record not found',404);
        }
        $transact->update($request->all());
        return response()->json($transact,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $transact = Transaction::find($id);
        if(is_null($transact)){
            return response()->json('Record not found',404);
        }
        $transact->delete();
        return response()->json(null,204);

    }
}
