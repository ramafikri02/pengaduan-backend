<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;

class PengaduanController extends Controller
{
    public function all() {
        return response()->json([
            'code' => 200,
            'data' => Pengaduan::all(),
            'message' => 'Success GET pengaduan',
        ]);
    }

    public function show($id) {
        return response()->json([
            'code' => 200,
            'data' => Pengaduan::find($id),
            'message' => 'Success GET pengaduan',
        ]);
    }

    public function store(Request $request) {
        return response()->json([
            'code' => 200,
            'data' => Pengaduan::create($request->all()),
            'message' => 'Success CREATE pengaduan',
        ]);
    }

    public function update($id, Request $request) {
        $pengaduan = Pengaduan::find($id);
        $pengaduan->update($request->all());
        return response()->json([
            'code' => 200,
            'data' => $pengaduan,
            'message' => 'Success UPDATE pengaduan',
        ]);
    }

    public function delete($id) {
        $pengaduan = Pengaduan::find($id);
        $pengaduan->delete();
        return response()->json([
            'code' => 200,
            'data' => null,
            'message' => 'Success DELETE pengaduan',
        ]);
    }
}
