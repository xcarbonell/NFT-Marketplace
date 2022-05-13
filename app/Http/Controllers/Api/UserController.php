<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

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
        $users = User::where('role_id', 2)->get(['name', 'photo']);

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
     * Lista de usuarios registrados en el sitio web.
     *
     * @return \Illuminate\Http\Response
     */
    public function showSellers()
    {
        //
        $users = User::where('role_id', 2)->get(['name', 'photo']);

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
}
