<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Nft;
use App\User;
use Illuminate\Support\Facades\Auth;


class NftController extends Controller
{

    //constructor para las policies

    public function __construct()
    {
        //$this->authorizeResource(Nft::class, 'nft');
        //$this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$user = Auth::User();
        //$this->authorize('viewAny', $user);
        //
        $nfts = Nft::all();

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
        $nft = Nft::where('id', $id)->get();

        $user = User::where('id', $nft[0]->user_id)->get();

        $nft[0]->user_id = $user[0]->name;
        $nft[0]->userData = $user[0]->photo;

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
        //
        $user = User::where('id', $id)->get(['id', 'name', 'email', 'photo', 'isBanned']);

        if (count($user) == 0) {
            return response()->json([
                'success' => false,
                'message' => 'User with id ' . $id . ' not found'
            ], 200);
        }

        return response()->json([
            'success' => true,
            'data' => $user->toArray()
        ], 200);
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

        //$this->authorize('update');

        $nft = Nft::find($id);

        if (!$nft) {
            return response()->json([
                'success' => false,
                'message' => 'NFT with id ' . $id . ' not found'
            ], 200);
        }

        $validated = $request->validate([
            'title' => 'required|max:50',
            'price' => 'required',
            'description' => 'required',
            'price' => 'required',
            'category' => 'required|max:50',
            'onStock' => 'required'
        ]);

        $nft->title = $validated['title'];
        $nft->price = $validated['price'];
        $nft->description = $validated['description'];
        $nft->category = $validated['category'];
        $nft->onStock = $validated['onStock'];
        $nft->updated_at = now();

        if (!$nft->update()) {
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
    }

    /**
     * Mostrar NFT por categoria.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexCategory($category)
    {
        //
        $nfts = Nft::where('category', $category)->where('onStock', 1)->get();

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
}
