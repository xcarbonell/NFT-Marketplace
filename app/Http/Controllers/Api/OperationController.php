<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Operation;

class OperationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $operations = Operation::all();

        if (count($operations) == 0) {
            return response()->json([
                'success' => false,
                'message' => 'No operations were found'
            ], 200);
        }
        return response()->json([
            'success' => true,
            'data' => $operations->toArray()
        ], 200);
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

        $validated = $request->validate([
            'price' => 'required',
            'nft_id' => 'required',
            'seller_id' => 'required',
            'buyer_id' => 'required'
        ]);

        $op = Operation::create([
            'price' => $validated['price'],
            'nft_id' => $validated['nft_id'],
            'seller_id' => $validated['seller_id'],
            'buyer_id' => $validated['buyer_id'],
            'comission' => $validated['price']*0.02
        ]);

        if (!$op) {
            return response()->json([
                'success' => false,
                'message' => 'Operation can not be stored'
            ], 200);
        }

        return response()->json([
            'success' => true,
            'data' => 'Operation stored'
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $operations = Operation::where('id', $id)->get(['id', 'created_at', 'seller_id', 'buyer_id', 'price', 'comission']);

        if (count($operations) == 0) {
            return response()->json([
                'success' => false,
                'message' => 'No operations were found'
            ], 200);
        }
        return response()->json([
            'success' => true,
            'data' => $operations->toArray()
        ], 200);
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
        $operation = Operation::where('id', $id)->delete();

        if (!$operation) {
            return response()->json([
                'success' => false,
                'message' => 'Operation with id ' . $id . ' not found'
            ], 200);
        }

        return response()->json([
            'success' => true,
            'data' => 'operation deleted'
        ], 200);
    }
}
