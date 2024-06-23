<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\JenisPekerjaan;

class JenisPekerjaanController extends Controller
{
    public function index()
    {
        $jenis_pekerjaan = JenisPekerjaan::all();
        return response()->json($jenis_pekerjaan);
    }

    public function store(Request $request)
    {
        $jenis_pekerjaan = JenisPekerjaan::create($request->all());
        return response()->json($jenis_pekerjaan, 201);
    }

    public function show(JenisPekerjaan $jenis_pekerjaan)
    {
        return response()->json($jenis_pekerjaan);
    }

    public function update(Request $request, JenisPekerjaan $jenis_pekerjaan)
    {
        $jenis_pekerjaan->update($request->all());
        return response()->json($jenis_pekerjaan);
    }

    public function destroy(JenisPekerjaan $jenis_pekerjaan)
    {
        $jenis_pekerjaan->delete();
        return response()->json(null, 204);
    }
}
