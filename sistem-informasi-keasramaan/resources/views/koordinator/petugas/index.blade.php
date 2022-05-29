@extends('koordinator.layouts.main')

@section('title')
    <title>Portal Koordinator</title>
@endsection

@section('judul-navigasi')
    Keasramaan IT Del
@endsection

@section('judul-halaman')
    Data Petugas Asrama &mdash; Institut Teknologi Del
@endsection

@section('statistics')
<div class="grid grid-cols-1 md:grid-cols-4 gap-4 py-2">
</div>
@endsection

@section('table')
<a href="{{ route('koordinator.form-tambah-petugas') }}">
    <button type="button" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 
    focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 
    dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 font-poppins">Tambah Petugas Asrama</button></a>

        <div class="bg-white shadow rounded-sm my-2.5 overflow-x-auto">
            <table class="min-w-max w-full table-auto">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">Nama</th>
                        <th class="py-3 px-6 text-left">Email</th>
                        <th class="py-3 px-6 text-center">Jabatan</th>
                        <th class="py-3 px-6 text-center">Jenis Kelamin</th>
                        <th class="py-3 px-6 text-center">Lokasi Bertugas</th>
                        <th class="py-3 px-6 text-center">Aksi</th>
                    </tr>
                </thead>
                @foreach ($dataPetugas as $key => $value) 
                <tbody class="text-gray-600 text-sm">
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left whitespace-nowrap font-poppins">
                                {{ $value->nama }}
                            </div>
                        </td>
                        <td class="py-3 px-6 text-left">
                            <div class="flex items-center">
                                <span class="font-poppins">
                                    {{ $value->email }}
                                </span>
                            </div>
                        </td>
                        <td class="py-3 px-6 text-center font-poppins">
                            {{ $value->jabatan }}
                        </td>
                        <td class="py-3 px-6 text-center font-poppins">
                            {{ Str::of($value->jenis_kelamin)->ucfirst()->explode('_')->implode(' ') }}
                        </td>
                        <td class="py-3 px-6 text-center">
                            {{ $value->asrama->nama_asrama }}
                        </td>
                        <td class="py-3 px-6 text-center">
                            <div class="flex item-center justify-center">
                                
                                <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110  cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                </div>
                                <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110  cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
                @endforeach
                
            </div>
            </table>
            <div class="row">
                <div class="col-md-12">
                    {{-- {{ $asrama->links('pagination::tailwind') }} --}}
                </div>
            </div>
    
        </div>
@endsection