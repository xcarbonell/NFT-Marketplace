<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Nft;
use DB;

class ViewController extends Controller
{

    public function __construct()
        {
            
            //$this->authorizeResource(View::class, 'view');

        }
    //pagina de inicio
    public function index()
    {
        $usersSellingID = Nft::where('onStock', 1)->groupBy('user_id')->get(['user_id']);

        $users = [];
        foreach ($usersSellingID as $u) {
            $lista = User::find($u, ['id', 'name', 'photo']);
            $users[] = $lista;
        }
        shuffle($users);

        $randomUsers[] = $users[0][0];
        $randomUsers[] = $users[1][0];
        $randomUsers[] = $users[2][0];
        $randomUsers[] = $users[3][0];

        if (count($randomUsers) == 0) {
            return response()->json([
                'success' => false,
                'message' => 'No sellers were found'
            ], 200);
        }

        $categories = Nft::all()->groupBy('category');
        $randomCat = array_rand($categories->toArray(), 4);

        if (count($randomCat) == 0) {
            return response()->json([
                'success' => false,
                'message' => 'No categories were found'
            ], 200);
        }

        return response()->json([
            'success' => true,
            'categories' => $randomCat,
            'users' => $randomUsers
        ], 200);
    }

    //pagina de inicio ya logueado
    public function loggedIndex()
    {
        $usersSellingID = Nft::where('onStock', 1)->groupBy('user_id')->get(['user_id']);

        $users = [];
        foreach ($usersSellingID as $u) {
            $lista = User::find($u, ['id', 'name', 'photo']);
            $users[] = $lista;
        }
        shuffle($users);

        $randomUsers[] = $users[0][0];
        $randomUsers[] = $users[1][0];


        if (count($randomUsers) == 0) {
            return response()->json([
                'success' => false,
                'message' => 'No sellers were found'
            ], 200);
        }

        $categories = Nft::all()->groupBy('category');
        $randomCat = array_rand($categories->toArray(), 3);

        if (count($randomCat) == 0) {
            return response()->json([
                'success' => false,
                'message' => 'No categories were found'
            ], 200);
        }

        $nftsAll = Nft::where('onStock', 1)->get('id');

        $nfts = [];
        foreach ($nftsAll as $nft) {
            $lista = Nft::find($nft, ['id', 'title', 'price', 'user_id', 'category', 'photo']);
            $nfts[] = $lista[0];
        }
        shuffle($nfts);

        $randomNFT[] = $nfts[0];
        $randomNFT[] = $nfts[1];

        if (count($nfts) == 0) {
            return response()->json([
                'success' => false,
                'message' => 'No nfts were found'
            ], 200);
        }

        return response()->json([
            'success' => true,
            'categories' => $randomCat,
            'users' => $randomUsers,
            'nfts' => $randomNFT
        ], 200);
    }

    //muestra todas las categorias
    public function categories(){

        $categories = Nft::all()->groupBy('category');
        $size = count($categories->toArray());
        $randomCat = array_rand($categories->toArray(), $size);
        //sort($randomCat);

        if (count($categories) == 0) {
            return response()->json([
                'success' => false,
                'message' => 'No nfts were found'
            ], 200);
        }

        return response()->json([
            'success' => true,
            'data' => $randomCat
        ], 200);

    }
}
