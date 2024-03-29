@extends('petugas.layouts.main')

@section('title')
    <title>Portal Petugas</title>
@endsection

@section('judul-navigasi')
    Keasramaan IT Del
@endsection

@section('judul-halaman')
    <a href="{{ route('petugas.data-penghuni-asrama') }}"><span class="text-gray-600">Data Penghuni Asrama /
    </a></span>Daftar Penghuni Asrama {{ $asramaID->nama_asrama }}
@endsection

@section('table')
    <div class="bg-white shadow rounded-sm my-2.5 overflow-x-auto">

        <table class="min-w-max w-full table-auto">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">Nama Mahasiswa</th>
                    <th class="py-3 px-6 text-left">NIM</th>
                    <th class="py-3 px-6 text-center">Angkatan</th>
                    <th class="py-3 px-6 text-center">Prodi</th>
                    <th class="py-3 px-6 text-center">Aksi</th>
                </tr>
            </thead>
            @foreach ($dataPenghuniAsrama as $key => $value)
                <tbody class="text-gray-600 text-sm">
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left whitespace-nowrap font-poppins">
                            {{ ucwords($value->nama) }}
    </div>
    </td>
    <td class="py-3 px-6 text-left">
        <div class="flex items-center">
            <span class="font-poppins">
                {{ $value->nim }}
            </span>
        </div>
    </td>
    <td class="py-3 px-6 text-center font-poppins">
        {{ $value->angkatan }}
    </td>
    <td class="py-3 px-6 text-center">
        {{ Str::of($value->prodi)->upper()->explode('_')->implode(' ') }}
    </td>
    <td class="py-3 px-6 text-center">
        <div class="flex item-center justify-center">
            <span class="bg-blue-500 text-slate-50 py-1 px-3 rounded-full text-xs">
                <a href="#">Detail</a>
            </span>
        </div>
    </td>
    </tr>
    </tbody>
    @endforeach

    </div>
    </table>
    <div class="row">
        <div class="col-md-12">
            {{ $dataPenghuniAsrama->links('pagination::tailwind') }}
        </div>
    </div>

    </div>
@endsection
