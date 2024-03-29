@extends('mahasiswa.layouts.main')

@section('title')
    <title>Portal Mahasiswa</title>
@endsection

@section('judul-navigasi')
    Keasramaan IT Del
@endsection

@section('judul-halaman')
    <a href="{{ route('mahasiswa.show.check-out') }}"><span class="text-gray-600">Check Out / </a></span>Data Check Out
@endsection

@section('statistics')
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 py-2">
    </div>
@endsection

@section('table')
    <p class="font-poppins font-normal text-lg py-2">Detail Check Out</p>

    <div class="bg-white shadow rounded-sm my-2.5 overflow-x-auto">

        <table class="min-w-max w-full table-auto">

            @foreach ($detailCheckOut as $data)
                <tbody class="text-gray-600 text-sm">
                    <tr class="border-b bg-slate-200 border-gray-200 ">
                        <td class="py-3 px-6 text-left whitespace-nowrap font-poppins font-bold">
                            Nama Mahasiswa
    </div>
    </td>
    <td class="py-3 px-6 text-left">
        <div class="flex items-center">
            <span class="font-poppins">
                {{ ucwords($data->isAnyMahasiswa->nama) }}
            </span>
        </div>
    </td>
    </tr>

    <tr class="border-b border-gray-200 ">
        <td class="py-3 px-6 text-left whitespace-nowrap font-poppins font-bold">
            NIM Mahasiswa
        </td>
        <td class="py-3 px-6 text-left whitespace-nowrap font-poppins">
            {{ $data->isAnyMahasiswa->nim }}
        </td>
    </tr>

    <tr class="border-b bg-slate-200 border-gray-200 ">
        <td class="py-3 px-6 text-left whitespace-nowrap font-poppins font-bold">
            Angkatan
        </td>
        <td class="py-3 px-6 text-left whitespace-nowrap font-poppins">
            {{ $data->isAnyMahasiswa->angkatan }}
        </td>
    </tr>

    <tr class="border-b border-gray-200 ">
        <td class="py-3 px-6 text-left whitespace-nowrap font-poppins font-bold">
            Program Studi
        </td>
        <td class="py-3 px-6 text-left whitespace-nowrap font-poppins">
            {{ Str::of($data->isAnyMahasiswa->prodi)->upper()->explode('_')->implode(' ') }}
        </td>
    </tr>

    <tr class="border-b bg-slate-200 border-gray-200 ">
        <td class="py-3 px-6 text-left whitespace-nowrap font-poppins font-bold">
            Asrama Asal
        </td>
        <td class="py-3 px-6 text-left whitespace-nowrap font-poppins">
           {{ ucwords($dataAsramaMahasiswa->nama_asrama) }}
        </td>
    </tr>

    <tr class="border-b border-gray-200 ">
        <td class="py-3 px-6 text-left font-poppins font-bold">
            Tanggal Check Out
        </td>

        <td class="py-3 px-6 text-left font-poppins">
            {{ \Carbon\Carbon::parse($data->tanggal_check_in)->isoFormat('DD MMMM YYYY H:mm') }}
        </td>
    </tr>

    <tr class="border-b bg-slate-200 border-gray-100 ">
        <td class="py-3 px-6 text-left font-poppins font-bold">
            Keperluan Check Out
        </td>

        <td class="py-3 px-6 text-left font-poppins">
            {{ $data->keperluan }}
        </td>
    </tr>


    <tr class="border-b border-gray-200 ">
        <td class="py-3 px-6 text-left font-poppins font-bold">
            Status Request
        </td>

        <td class="py-3 px-6 text-center font-poppins">
            @if ($data->status_request == null)
                <div class="flex">
                    <span class="font-poppins bg-yellow-300 text-dark font-semibold py-1 px-3 rounded text-xs">
                        Menunggu Persetujuan
                    </span>
                </div>
            @elseif ($data->status_request == 1)
                <div class="flex">
                    <span class="font-poppins bg-green-700 text-slate-50 py-1 px-3 rounded text-xs">
                        Disetujui
                    </span>
                </div>
            @elseif ($data->status_request == 2)
                <div class="flex">
                    <span class="font-poppins bg-red-500 text-slate-50 py-1 px-3 rounded text-xs">
                        Ditolak
                    </span>
                </div>
            @endif
        </td>
    </tr>

    <tr class="border-b bg-slate-200 border-gray-200 ">
        <td class="py-3 px-6 text-left font-poppins font-bold">
            @if ($data->status_request == 1)
                Disetujui oleh
            @elseif($data->status_request == 2)
                Ditolak oleh
            @else
                Membutuhkan konfirmasi
            @endif
        </td>

        <td class="py-3 px-6 text-left font-poppins">
            {{ !empty($data->isAnyPetugas->nama) ? $data->isAnyPetugas->nama : 'Pengurus Asrama' }}
        </td>
    </tr>

    </tbody>
    @endforeach

    </div>
    </table>

    </div>
@endsection
