<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Schedule;

class ScheduleController extends Controller
{
    // Menampilkan daftar jadwal kerja dalam format JSON
    public function index()
    {
        $schedule = Schedule::all();
        return response()->json($schedule);
    }

    // Menyimpan jadwal kerja baru ke database dan mengembalikan data yang disimpan dalam format JSON
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'tanggal' => 'required|date',
            'lokasi_kerja' => 'required|string|max:255',
            'jenis_pekerjaan' => 'required|string|max:255',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i',
            'istirahat_mulai' => 'nullable|date_format:H:i',
            'istirahat_selesai' => 'nullable|date_format:H:i',
            'status' => 'required|string|max:255',
            'catatan' => 'nullable|string',
        ]);

        $jadwal = Schedule::create($validatedData);
        return response()->json($jadwal, 201);
    }

    // Menampilkan jadwal kerja spesifik dalam format JSON
    public function show(Schedule $schedule)
    {
        return response()->json($schedule);
    }

    // Memperbarui jadwal kerja di database dan mengembalikan data yang diperbarui dalam format JSON
    public function update(Request $request, $id)
    {
        $schedule = Schedule::findOrFail($id);
        
        // Atau secara lebih dinamis dengan:
        $schedule->fill($request->all());
        $schedule->save();
        
        return response()->json(['message' => 'Schedule updated successfully', 'data' => $schedule]);
    }

    // Menghapus jadwal kerja dari database dan mengembalikan respons JSON
    public function destroy(Schedule $schedule)
    {
        $schedule->delete();
        return response()->json([
            "message" => "Delete Success"
        ], 200);
    }

    /**
    * Update status jadwal kerja.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function updateStatus(Request $request, $id)
    {
        $schedule = Schedule::findOrFail($id);

        $validatedData = $request->validate([
            'status' => 'required|in:Approved,Pending,Canceled',
        ]);

        $schedule->status = $validatedData['status'];
        $schedule->save();

        return response()->json([
            'message' => 'Status jadwal kerja berhasil diperbarui.',
            'data' => $schedule
        ]);
    }
}