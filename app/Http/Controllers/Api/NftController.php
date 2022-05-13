<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Nft;

class NftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $nfts = Nft::all();

        if (count($nfts) == 0) {
            return response()->json([
                'success' => false,
                'message' => 'No NFTs were found'
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
        $nft = Nft::where('id', $id)->get();

        if (count($nft) == 0) {
            return response()->json([
                'success' => false,
                'message' => 'NFT with id ' . $id . ' not found'
            ], 200);
        }

        return response()->json([
            'success' => true,
            'data' => $nft->toArray()
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
        //retorna la vista para editar un NFT
        return view();
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
        $nft = Nft::find($id);

        if (!$nft) {
            return response()->json([
                'success' => false,
                'message' => 'NFT with id ' . $id . ' not found'
            ], 200);
        }

        $validated = $request->validate([
            'price' => 'required',
            'user_id' => 'required',
            'description' => 'required',
            'category' => 'required|max:50',
            'onStock' => '',
            'photo' => ''
        ]);

        $nft->price = $validated['price'];
        $nft->user_id = $validated['user_id'];
        $nft->description = $validated['description'];
        $nft->category = $validated['category'];
        $nft->onStock = $validated['onStock'];
        $nft->photo = $validated['photo'];

        if (!$nft->update($validated)) {
            return response()->json([
                'success' => false,
                'message' => 'NFT with id ' . $id . ' can not be updated'
            ], 200);
        }

        return response()->json([
            'success' => true,
            'data' => 'NFT updated'
        ], 200);
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
        $nft = Nft::where('id', $id)->delete();

        if (!$nft) {
            return response()->json([
                'success' => false,
                'message' => 'NFT with id ' . $id . ' not found'
            ], 200);
        }

        return response()->json([
            'success' => true,
            'data' => 'NFT deleted'
        ], 200);
    }
}
