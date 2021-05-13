<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = User::where('type', 'client')->get();

        foreach($clients as $client){
            unset($client->dni, $client->phone, $client->salary);
        }
        return response()->json($clients, 201);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $client = User::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Client creado correctamente',
            'user' => $client,
        ], status:200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = User::find($id);
        unset($client->dni, $client->phone, $client->salary);

        return response()->json($client, 201);
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
        $client = User::findOrFail($id);
        $client->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Client actualizado correctamente',
            'user' => $client,
        ], status:200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = User::findOrFail($id);
        $client->delete();

        return response()->json([
            'success' => true,
            'message' => 'Client eliminado correctamente',
        ], status:200);
    }
}
