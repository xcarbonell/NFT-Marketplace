<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Nft;

class UserController extends Controller
{
    /**
     * Lista de usuarios registrados en el sitio web.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::where('role_id', 2)->get(['id', 'name', 'photo']);

        if (count($users) == 0) {
            return response()->json([
                'success' => false,
                'message' => 'No users were found'
            ], 200);
        }
        return response()->json([
            'success' => true,
            'data' => $users->toArray()
        ], 200);
    }

    /**
     * Lista de usuarios que tienen un NFT en venta.
     *
     * @return \Illuminate\Http\Response
     */
    public function showSellers()
    {
        //
        //id de los usuarios con items en venta
        $usersSellingID = Nft::where('onStock', 1)->groupBy('user_id')->get(['user_id']);
        $users = [];
        foreach ($usersSellingID as $u) {
            $lista = User::find($u, ['id', 'name', 'photo']);
            $users[] = $lista[0];
        }

        if (count($users) == 0) {
            return response()->json([
                'success' => false,
                'message' => 'No sellers were found'
            ], 200);
        }
        return response()->json([
            'success' => true,
            'data' => $users
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
     * Mostra el perfil de l'usuari loguejat
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user = User::find($id)->get(['id', 'name', 'email', 'photo', 'isBanned']);

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
     * Mostra el perfil d'un usuari registrat al lloc, amb les seves dades i NFT
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function userProfile($id)
    {
        //
        $user = User::find($id)->get(['id', 'name', 'email', 'photo', 'isBanned']);

        if (count($user) == 0) {
            return response()->json([
                'success' => false,
                'message' => 'User with id ' . $id . ' not found'
            ], 200);
        }

        $nfts = Nft::where('user_id', $id)->get();

        if (count($nfts) == 0) {
            return response()->json([
                'success' => false,
                'message' => 'This user has no NFTs'
            ], 200);
        }

        return response()->json([
            'success' => true,
            'data' => compact(['user' => $user->toArray(), 'nfts' => $nfts])
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $user = User::find($id);

        $validated = $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|max100',
            'photo' => '',
            'isBanned' => ''
        ]);

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->photo = $validated['photo'];
        $user->isBanned = $validated['isBanned'];
        $user->updated_at = now();

        if (!$user->update($validated)) {
            return response()->json([
                'success' => false,
                'message' => 'User with id ' . $id . ' can not be updated'
            ], 200);
        }

        return response()->json([
            'success' => true,
            'data' => 'User updated'
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
     * Bannejar usuari
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function banUser($id)
    {
        //
        $user = User::find($id);
        if ($user->isBanned == 1) {
            $user->isBanned = 0;
        }
        if ($user->isBanned == 0) {
            $user->isBanned = 1;
        }
        $user->update();
    }
}
