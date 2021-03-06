<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Operation;
use App\Nft;
use App\User;
use Illuminate\Support\Facades\Auth;

class OperationController extends Controller
{

    public function __construct()
    {

        //$this->authorizeResource(Operation::class, 'operation');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $operations = Operation::all();

        foreach ($operations as $operation) {
            $comprador = User::where('id', $operation->buyer_id)->get('name');

            $vendedor = User::where('id', $operation->seller_id)->get('name');

            $operation->buyer_id = $comprador[0]->name;
            $operation->seller_id = $vendedor[0]->name;
        }

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

    public function operation($id, $comprador)
    {

        //$comprador = Auth::user()->id;
        $nft = Nft::find($id);
        $price = $nft->price;
        $vendedor = $nft->user_id;

        $this->store($comprador, $price, $vendedor, $id);

        $nft->user_id = $comprador;
        $nft->onStock = 0;
        $nft->price = 0;
        if (!$nft->update()) {
            return response()->json([
                'success' => false,
                'message' => 'This NFT cannot be bought'
            ], 200);
        }

        return response()->json([
            'success' => true,
            'data' => 'NFT bought correctly'
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($comprador, $precio, $vendedor, $id)
    {
        //

        $op = Operation::create([
            'price' => $precio,
            'nft_id' => $id,
            'seller_id' => $vendedor,
            'buyer_id' => $comprador,
            'comission' => $precio * 0.02
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

    public function userOperations($id)
    {

        $user = User::where('id', $id)->get();
        if ($user[0]->role_id == 1) {
            return $this->index();
        }

        $operations = Operation::where('buyer_id', $id)->orWhere('seller_id', $id)->get(['id', 'created_at', 'seller_id', 'buyer_id', 'price', 'comission']);

        foreach ($operations as $buy) {
            $seller = User::where('id', $buy->seller_id)->get();
            $buy->buyer_id = $user[0]->name;
            $buy->seller_id = $seller[0]->name;
        }
        if (count($operations) == 0) {
            return response()->json([
                'success' => false,
                'message' => 'You have no operations'
            ], 200);
        }
        return response()->json([
            'success' => true,
            'data' => $operations->toArray()
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
            'data' => 'Operation deleted'
        ], 200);
    }

    public function calculateBenefits()
    {

        $benefits = Operation::all()->sum('comission');

        if (!$benefits) {
            return response()->json([
                'success' => false,
                'message' => 'No benefits'
            ], 200);
        }

        return response()->json([
            'success' => true,
            'data' => $benefits
        ], 200);
    }
}
