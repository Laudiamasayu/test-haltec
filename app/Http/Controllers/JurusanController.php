<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jurusan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


class JurusanController extends Controller
{
    public function index()
    {
        $jurusans = DB::table('jurusan')->get();
        return view('jurusan.index', ['jurusans' => $jurusans]);
    }

    public function create()
    {
        return view('jurusan.index');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_jurusan' => 'required',
        ], [
            'nama_jurusan.required' => 'Platform Harus Diisi',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
                'message' => 'Error Validation'
            ], 400);
        }
        $data = [
            'nama_jurusan' => $request->nama_jurusan,
        ];
        if (Jurusan::create($data)) {
            return redirect()->route('jurusan.index')->with('success', 'Data Berhasil Di Tambahkan');
        } else {
            return [
                'success' => false,
                'message' => 'Data Gagal Di Tambahkan'
            ];
        }
    }

    public function edit($id_jurusan)
    {
        $jurusans = DB::table('jurusan')->get();
        $jurusan = Jurusan::find($id_jurusan);

        if (!$jurusan) {
            return redirect()->route('jurusan.index')->with('error', 'No record found for the given ID');
        }

        return view('jurusan.edit')->with("jurusan", $jurusan);
    }

    public function update(Request $request, $id_jurusan) {
        // Validate the incoming request data if needed
        $validator = Validator::make($request->all(), [
            'nama_jurusan' => 'required',
        ], [
            'nama_jurusan.required' => 'nama jurusan Harus Di Isi',
        ]);
        if($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
                'message' => 'Error Validation'
            ], 400);
        }
        $data = [
            'nama_jurusan' => $request->nama_jurusan,
        ];
        $model = jurusan::findOrFail($id_jurusan);
        if($model->update($data)) {
            return redirect()->route('jurusan.index')->with('success', 'Data Berhasil Di Update');
        } else {
            return [
                'success' => false,
                'message' => 'Data Gagal Di Update'
            ];
        }
    }


    public function destroy($id_jurusan)
    {
        $jurusan = Jurusan::find($id_jurusan);

        if (!$jurusan) {
            return redirect()->route('jurusan.index')->with('error', 'No record found for the given ID');
        }

        $jurusan->delete();

        return redirect()->route('jurusan.index')->with('success', 'Record deleted successfully!');
    }
}
