<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Lokasi;

class LokasiController extends Controller
{
    public function index()
    {
        $lokasi = Lokasi::all();
        return response()->json($lokasi);
    }
    
    public function store(Request $request)
    {
        $lokasi = Lokasi::create($request->all());
        return response()->json($lokasi, 201);
    }
    
    public function show(Lokasi $lokasi)
    {
        return response()->json($lokasi);
    }
    
    public function update(Request $request, Lokasi $lokasi)
    {
        $lokasi->update($request->all());
        return response()->json($lokasi);
    }
    
    public function destroy(Lokasi $lokasi)
    {
        $lokasi->delete();
        return response()->json(null, 204);
    }
}
