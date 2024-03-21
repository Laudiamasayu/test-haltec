@extends('layouts.main')

@section('container')
<form method="POST" action="{{route('jurusan.update', $jurusan->id_jurusan)}}">
  @csrf
  @method('PUT')
  <div class="container mx-auto" style="margin-left: 1cm">
    <div style="margin-left: 3cm; margin-top: 2rem">
      <div class="bg-white shadow-md h-56 mb-4 max-w-4xl relative rounded">
        <div class="bg-[#8BE8E5] h-10 flex items-center text-lg justify-center font-semibold text-[#363062] rounded">
          Buat Data Jurusan
        </div>
        <div class="mb-4 m-3 flex flex-wrap">
          <div class="mx-auto mb-4">
            <label for="" class="block text-gray-700 text-base font-semibold mb-2 font-[poppins]">
              Nama Jurusan
            </label>
            <input class="shadow appearance-none border rounded w-96 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="nama_jurusan" value="{{$jurusan->nama_jurusan}}" required>
            <button type="submit" class="bg-[#A084E8] hover:bg-[#6F61C0] text-white font-semibold py-2 px-4 rounded-lg">
              Simpan Data
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
@endsection