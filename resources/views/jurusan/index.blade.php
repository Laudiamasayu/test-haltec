@extends('layouts.main')

@section('container')
<form method="POST" action="{{ route('jurusan.store') }}">
  @csrf
  <div class="container mx-auto" style="margin-left: 1cm">
    <div style="margin-left: 3cm; margin-top: 2rem">
      <div class="bg-white shadow-md h-56 mb-4 max-w-4xl relative">
        <div class="bg-[#8BE8E5] h-10 flex items-center text-lg justify-center font-semibold text-[#363062]">
          Buat Data Jurusan
        </div>
        <div class="mb-4 m-3 flex flex-wrap">
          <div class="mx-auto mb-4">
            <label for="" class="block text-gray-700 text-base font-semibold mb-2 font-[poppins]">
              Nama Jurusan
            </label>
            <input class="shadow appearance-none border rounded w-96 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="nama_jurusan" placeholder="Nama Jurusan" required>
            <button type="submit" class="bg-[#A084E8] hover:bg-[#6F61C0] text-white font-semibold py-2 px-4 rounded-lg" onclick="confirm('Apakah kamu yakin?')">
              Simpan Data
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>

<div class="container mx-auto" style="margin-left: 1cm;">
  <div style="margin-left: 3cm; margin-top: 2rem;">
    <div class="bg-white shadow-md h-56 mb-4 max-w-4xl relative">
      <div class="bg-[#A084E8] h-10 flex items-center text-lg justify-center font-semibold text-white">
        Data Jurusan
      </div>
      <div class="mb-4 m-3 flex flex-wrap">
        <table class="w-full">
          <thead>
            <tr class="bg-[#D5FFE4]">
              <th class="py-2 px-4 text-[#363062] border">No</th>
              <th class="py-2 px-4 text-[#363062] border">Nama Jurusan</th>
              <th class="py-2 px-4 text-[#363062] border">Aksi</th>
          </tr>
      </thead>
      <tbody>
          @foreach ($jurusans as $jurusan)
          <tr>
              <td class="py-2 px-4 border">{{ $jurusan->id_jurusan }}</td>
              <td class="py-2 px-4 border">{{ $jurusan->nama_jurusan }}</td>
              <td class="py-2 px-4 border text-center">
                  <a href="{{ route('jurusan.edit', $jurusan->id_jurusan) }}" class="bg-[#A084E8] hover:bg-[#6F61C0] text-white font-semibold py-2 px-4 rounded-lg">Edit</a>
                  <form method="POST" action="{{ route('jurusan.destroy', $jurusan->id_jurusan) }}" class="inline" onclick="return confirm('Apakah kamu mau menghapus data?')">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="bg-[#A084E8] hover:bg-[#6F61C0] text-white font-semibold py-2 px-4 rounded-lg">Delete</button>
                  </form>
              </td>
          </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection