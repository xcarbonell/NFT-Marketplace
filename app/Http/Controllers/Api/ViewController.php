<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Nft;
use DB;

class ViewController extends Controller
{
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

        if (count($randomUsers) == 0) {
            return response()->json([
                'success' => false,
                'message' => 'No sellers were found'
            ], 200);
        }

        $categories = Nft::all()->groupBy('category');
        $randomCat = array_rand($categories->toArray(),3);

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
            $lista = User::find($u, ['id', 'name', 'photo'])->inRandomOrder()->limit(5);
            $users[] = $lista[0];
        }

        if (count($users) == 0) {
            return response()->json([
                'success' => false,
                'message' => 'No sellers were found'
            ], 200);
        }

        $categories = Nft::all()->groupBy('category')->inRandomOrder()->limit(5)->get(['id', 'category']);

        if (count($categories) == 0) {
            return response()->json([
                'success' => false,
                'message' => 'No categories were found'
            ], 200);
        }

        $nfts = Nft::where('onStock', 1)->inRandomOrder()->limit(5)->get(['id', 'title', 'price', 'user_id', 'category', 'photo']);

        if (count($nfts) == 0) {
            return response()->json([
                'success' => false,
                'message' => 'No categories were found'
            ], 200);
        }

        return response()->json([
            'success' => true,
            'data' => compact(['users' => $users, 'categories' => $categories, 'nfts' => $nfts])
        ], 200);
    }
}