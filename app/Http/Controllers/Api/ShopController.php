<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Nft;
use App\User;
use Gate;

class ShopController extends Controller
{


    public function __construct()
        {
            
            //$this->authorizeResource(Role::class, 'role');
            //$this->middleware('auth');

        }
    /**
     * Lista de NFT en venta.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$role = Auth::user()->role_id;
        //$this->authorize('shop-nft');

        /*if(Auth::user()){
            $role = Auth::user()->role_id;
            $this->authorize('shop-nft', $role);
        }*/
        

        $nfts = Nft::where('onStock', 1)->get(['id', 'title', 'price', 'user_id', 'category', 'photo']);

        foreach ($nfts as $nft) {
            $user = User::where('id', $nft->user_id)->get(['name']);
            $nft->user_id = $user[0]->name;
        }
        if (count($nfts) == 0) {
            return response()->json([
                'success' => false,
                'message' => 'No nfts were found'
            ], 200);
        }
        return response()->json([
            'success' => true,
            'data' => $nfts->toArray()
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

    /**
     * Vender un NFT
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function putOnStock($id, Request $request)
    {
        //
        $nft = Nft::where('id', $id)->get();

        $nft->onStock = true;
        $nft->price = $request->price;

        if (!$nft->update()) {
            return response()->json([
                'success' => false,
                'message' => 'This NFT cannot be sold'
            ], 200);
        }

        return response()->json([
            'success' => true,
            'data' => 'NFT got put on stock correctly'
        ], 200);
    }
}
