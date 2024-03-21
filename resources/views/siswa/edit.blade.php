@extends('layouts.main')

@section('container')
<div class="container mx-auto" style="margin-left: 1cm;">
    <div style="margin-left: 3cm; margin-top: 2rem;">
        <div class="bg-white shadow-md h-auto mb-4 max-w-4xl relative">
            <div class="bg-[#8BE8E5] h-10 flex items-center text-lg justify-center font-semibold text-[#363062]">
                Buat Data Siswa
            </div>
            <form action="{{route('siswa.update', $siswa->id_siswa)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4 m-3 flex flex-wrap">
                    <div class="mb-4 m-3 flex flex-wrap">
                        <div class="mx-auto mb-4">
                            <label class="block text-gray-700 text-base font-semibold mb-2 font-[poppins]" for="nisn">
                                NISN
                            </label>
                            <input name="nisn" class="shadow appearance-none border rounded w-96 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nisn" type="number" placeholder="NISN" value="{{$siswa->nisn}}">
                        </div>
                        
                    </div>
                    <div class="mb-4 m-3 flex flex-wrap">
                        <div class="mx-auto mb-4">
                            <label class="block text-gray-700 text-base font-semibold mb-2 font-[poppins]" for="nama_siswa">
                                Nama Siswa
                            </label>
                            <input name="nama_siswa" class="shadow appearance-none border rounded w-96 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nama_siswa" type="text" placeholder="Nama Siswa" value="{{$siswa->nama_siswa}}">
                        </div>
                    </div>
                    <div class="mb-4 m-3 flex flex-wrap">
                        <div class="mx-auto mb-4 ml-60">
                            <label class="block text-gray-700 text-base font-semibold mb-2 font-[poppins]" for="jenis_kelamin">
                                Jenis Kelamin
                            </label>
                            <div class="flex items-center">
                                <input type="radio" id="laki-laki" name="jenis_kelamin" value="Laki-laki" {{$siswa->jenis_kelamin == 'Laki-laki' ? 'checked' : ''}} class="mr-2">
                                <label for="laki-laki" class="mr-4">Laki-laki</label>
                                <input type="radio" id="perempuan" name="jenis_kelamin" value="Perempuan" {{$siswa->jenis_kelamin == 'Perempuan' ? 'checked' : ''}} class="mr-2">
                                <label for="perempuan">Perempuan</label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-4 m-3 flex flex-wrap">
                        <div class="mx-auto mb-4">
                            <label class="block text-gray-700 text-base font-semibold mb-2 font-[poppins]" for="alamat">
                                Alamat
                            </label>
                            <textarea name="alamat" class="shadow appearance-none border rounded w-96 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="alamat" placeholder="Alamat">{{$siswa->alamat}}</textarea>
                        </div>
                    </div>
                </div>
                <!-- Tambahkan dropdown untuk memilih jurusan -->
                <div class="mb-4 m-3 flex flex-wrap">
                    <div class="mx-auto mb-4">
                        <label class="block text-gray-700 text-base font-semibold mb-2 font-[poppins]" for="jurusan">
                            Jurusan
                        </label>
                        <select id="jurusan" name="id_jurusan" class="shadow appearance-none border rounded w-96 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            <option value="">Pilih Jurusan</option>
                            @foreach ($jurusans as $id => $nama)
                            <option value="{{ $id }}"" {{ $siswa->id_jurusan == $id ? 'selected' : '' }}>{{ $nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="absolute bottom-0 right-0 mb-1 mr-4">
                    <button type="submit" class="bg-[#A084E8] hover:bg-[#6F61C0] text-white font-semibold py-2 px-4 rounded-lg">
                        Simpan Data
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection