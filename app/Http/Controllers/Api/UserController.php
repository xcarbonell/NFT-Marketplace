<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Nft;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function __construct()
        {
            
            //$this->authorizeResource(User::class, 'user');

        }
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
        $path = $request->file('photo')->store('photos', 'public');
        return view('foto');
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
        $user = User::where('id', $id)->get(['id', 'name', 'email', 'photo', 'isBanned']);

        if (count($user) == 0) {
            return response()->json([
                'success' => false,
                'message' => 'User with id ' . $id . ' not found'
            ], 200);
        }

        return response()->json([
            'success' => true,
            'data' => $user[0]
        ], 200);
    }

    /**
     * Mostra el perfil d'un usuari registrat al lloc, amb les seves dades i NFT
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function userProfile($name)
    {
        //
        $user = User::where('name', $name)->get(['id', 'name', 'email', 'photo', 'isBanned']);

        if (count($user) == 0) {
            return response()->json([
                'success' => false,
                'message' => 'User with name ' . $name . ' not found'
            ], 200);
        }

        $nfts = Nft::where('user_id', $user[0]->id)->get();

        if (count($nfts) == 0) {
            return response()->json([
                'success' => false,
                'message' => 'This user has no NFTs'
            ], 200);
        }

        return response()->json([
            'success' => true,
            'user' => $user[0],
            'nfts' => $nfts
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
            'data' => $user[0]
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $user = User::find($request->userid);
        //dd($request->email);

        $validated = $request->validate([
            'user' => 'required|max:50',
            'email' => 'required|max:100',
            'curentpassword' => 'nullable|max:100',
            'new_password' => 'nullable|max:100',
            'confirm_password' => 'nullable|max:100',
            'photo' => 'nullable'
        ]);

        //dd($request);

        if (!Hash::check($validated['curentpassword'], $user->password)) {
            return back();
        }

        if ($validated['new_password'] != $validated['confirm_password']) {
            return back();
        }

        $user->name = $validated['user'];
        $user->email = $validated['email'];
        if($request->photo){
            $user->photo = $validated['photo'];
        }
        if($request->new_password){
            $user->password = Hash::make($validated['new_password']);
        }
        $user->updated_at = now();

        $user->save();

        return back();
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

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User with id ' . $id . ' not found'
            ], 200);
        }

        if ($user->isBanned == 1) {
            $user->isBanned = 0;
        } else {
            $user->isBanned = 1;
        }

        if (!$user->save()) {
            return response()->json([
                'success' => false,
                'message' => 'User with id ' . $id . ' can not be banned'
            ], 200);
        }

        return response()->json([
            'success' => true,
            'data' => 'User banned',
            'user' => $user
        ], 200);
    }
}
