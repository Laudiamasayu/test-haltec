<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{
    public function index()
    {
        $siswas = DB::table('siswa')
        ->join('jurusan', 'siswa.id_jurusan', '=', 'jurusan.id_jurusan')
        ->select('siswa.*', 'jurusan.nama_jurusan')
        ->get();
        $jurusans = Jurusan::pluck('nama_jurusan', 'id_jurusan');
        
        return view('siswa.index', compact('siswas', 'jurusans'));
    }
    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nisn' => 'required',
            'nama_siswa' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'id_jurusan' => 'required',
        ], [
            'nisn.required' => 'Platform Harus Diisi',
            'nama_siswa.required' => 'Platform Harus Diisi',
            'jenis_kelamin.required' => 'Platform Harus Diisi',
            'alamat.required' => 'Platform Harus Diisi',
            'id_jurusan.required' => 'Platform Harus Diisi',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
                'message' => 'Error Validation'
            ], 400);
        }
        $data = [
            'nisn' => $request->nisn,
            'nama_siswa' => $request->nama_siswa,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'id_jurusan' => $request->id_jurusan
        ];
        if (Siswa::create($data)) {
            return redirect()->route('siswa.index')->with('success', 'Data Berhasil Di Tambahkan');
        } else {
            return [
                'success' => false,
                'message' => 'Data Gagal Di Tambahkan'
            ];
        }
        
    }
    
    public function edit($id_siswa)
    {
        $jurusans = Jurusan::pluck('nama_jurusan', 'id_jurusan');
        $siswa = Siswa::find($id_siswa);

        return view('siswa.edit', compact('siswa', 'jurusans'));
    }

    public function update(Request $request, $id_siswa) {
        $validator = Validator::make($request->all(), [
            'nisn' => 'required',
            'nama_siswa' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'id_jurusan' => 'required', // Menambahkan aturan validasi untuk id_jurusan
        ], [
            'nisn.required' => 'NISN harus diisi',
            'nama_siswa.required' => 'Nama siswa harus diisi',
            'jenis_kelamin.required' => 'Jenis kelamin harus diisi',
            'alamat.required' => 'Alamat harus diisi',
            'id_jurusan.required' => 'Jurusan harus dipilih', // Pesan validasi disesuaikan
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
                'message' => 'Error Validation'
            ], 400);
        }
    
        $data = [
            'nisn' => $request->nisn,
            'nama_siswa' => $request->nama_siswa,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'id_jurusan' => $request->id_jurusan
        ];
    
        $model = Siswa::findOrFail($id_siswa);
        
        if($model->update($data)) {
            return redirect()->route('siswa.index')->with('success', 'Data Berhasil Di Update');
        } else {
            return [
                'success' => false,
                'message' => 'Data Gagal Di Update'
            ];
        }
    }

    public function destroy($id_siswa)
    {
        $siswa = Siswa::find($id_siswa);

        if (!$siswa) {
            return redirect()->route('siswa.index')->with('error', 'No record found for the given ID');
        }

        $siswa->delete();

        return redirect()->route('siswa.index')->with('success', 'Record deleted successfully!');
    }
}
