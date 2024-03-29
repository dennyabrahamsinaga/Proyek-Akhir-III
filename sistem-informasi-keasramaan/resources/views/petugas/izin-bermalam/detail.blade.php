@extends('petugas.layouts.main')

@section('title')
    <title>Portal Petugas</title>
@endsection

@section('judul-navigasi')
    Keasramaan IT Del
@endsection

@section('judul-halaman')
    <a href="{{ route('petugas.izin-bermalam') }}"><span class="text-gray-600">Daftar Izin Bermalam Mahasiswa / </a>Detail
    Izin Bermalam
    Mahasiswa</span>
@endsection

@section('statistics')
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 py-2">
    </div>
@endsection

@section('table')
    @if (Session::get('success'))
        <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
            role="alert">
            <span class="font-medium font-poppins">{{ Session::get('success') }}</span>
        </div>
    @endif

    @if (Session::get('fail'))
        <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
            <span class="font-medium font-poppins">{{ Session::get('fail') }}</span>
        </div>
    @endif

    @if (Session::get('fail-format'))
        <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
            <span class="font-medium font-poppins">{{ Session::get('fail-format') }}</span>
        </div>
    @endif

    <p class="font-poppins font-normal text-lg py-2">Detail Izin Bermalam</p>
    <div class="bg-white shadow rounded-sm my-2.5 overflow-x-auto">

        <table class="min-w-max w-full table-auto">

            @foreach ($detailReqIB as $key => $data)
                <tbody class="text-gray-600 text-sm">
                    <tr class="border-b bg-slate-200 border-gray-200 ">
                        <td class="py-3 px-6 text-left whitespace-nowrap font-poppins font-bold">
                            Nama Mahasiswa
    </div>
    </td>
    <td class="py-3 px-6 text-left">
        <div class="flex items-center">
            <span class="font-poppins">
                {{ ucwords($data->nama) }}
            </span>
        </div>
    </td>
    </tr>

    <tr class="border-b border-gray-200 ">
        <td class="py-3 px-6 text-left whitespace-nowrap font-poppins font-bold">
            NIM Mahasiswa
        </td>
        <td class="py-3 px-6 text-left whitespace-nowrap font-poppins">
            {{ $data->nim }}
        </td>
    </tr>

    <tr class="border-b bg-slate-200 border-gray-200 ">
        <td class="py-3 px-6 text-left font-poppins font-bold">
            Rencana Berangkat
        </td>

        <td class="py-3 px-6 text-left font-poppins">
            {{ \Carbon\Carbon::parse($data->rencana_berangkat)->isoFormat('DD MMMM YYYY H:mm') }}
        </td>
    </tr>

    <tr class="border-b border-gray-200">
        <td class="py-3 px-6 text-left font-poppins font-bold">
            Rencana Kembali
        </td>

        <td class="py-3 px-6 text-left font-poppins">
            {{ \Carbon\Carbon::parse($data->rencana_kembali)->isoFormat('DD MMMM YYYY H:mm ') }}
        </td>
    </tr>

    <tr class="border-b bg-slate-200 bg-slate-200border-gray-100 ">
        <td class="py-3 px-6 text-left font-poppins font-bold">
            Keperluan IB
        </td>

        <td class="py-3 px-6 text-left font-poppins">
            {{ $data->keperluan_ib }}
        </td>
    </tr>

    <tr class="border-b border-gray-200 ">
        <td class="py-3 px-6 text-left font-poppins font-bold">
            Tempat Tujuan IB
        </td>

        <td class="py-3 px-6 text-left font-poppins">
            {{ $data->tempat_tujuan }}
        </td>
    </tr>

    <tr class="border-b bg-slate-200 border-gray-200 ">
        <td class="py-3 px-6 text-left font-poppins font-bold">
            Status Request
        </td>

        <td class="py-3 px-6 text-center font-poppins">
            @if ($data->status == null)
                <div class="flex">
                    <span class="font-poppins bg-yellow-300 text-dark font-semibold py-1 px-3 rounded text-xs">
                        Menunggu Persetujuan
                    </span>
                </div>
            @elseif ($data->status == 1)
                <div class="flex">
                    <span class="font-poppins bg-green-700 text-slate-50 py-1 px-3 rounded text-xs">
                        Disetujui
                    </span>
                </div>
            @elseif ($data->status == 2)
                <div class="flex">
                    <span class="font-poppins bg-red-500 text-slate-50 py-1 px-3 rounded text-xs">
                        Ditolak
                    </span>
                </div>
            @endif
        </td>
    </tr>

    <tr class="border-b border-gray-200 ">
        <td class="py-3 px-6 text-left font-poppins font-bold">
            @if ($data->status == 1)
                Disetujui oleh
            @elseif($data->status == 2)
                Ditolak oleh
            @else
                Membutuhkan konfirmasi
            @endif
        </td>

        <td class="py-3 px-6 text-left font-poppins">
            {{ !empty($data->petugas->nama) ? $data->petugas->nama : ' ' }}
            {{-- {{ Auth::guard('petugas')->user()->nama }} --}}
        </td>
    </tr>

    @if ($data->status == 2)
    <tr class="border-b bg-slate-200 border-gray-200 ">
        <td class="py-3 px-6 text-left font-poppins font-bold">
                Alasan Penolakan
        </td>

        <td class="py-3 px-6 text-left font-poppins">
            {{ ucfirst($data->alasan_tolak) }}
        </td>
    </tr>
    @endif

    @if ($data->status == null)
        <tr class="border-b bg-slate-200 border-gray-100 ">
            <td class="py-3 px-6 text-left font-poppins font-bold">
                Alasan Penolakan <span class="text-xs text-red-500 font-normal">*jika Anda ingin menolak izin</span>
            </td>

            <form action="{{ route('petugas.reject.izin-bermalam', $data->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <td class="py-3 px-6 text-left font-poppins">
                    <textarea id="alasan_tolak" name="alasan_tolak" rows="4"
                        class="font-poppins placeholder:text-gray-500 block p-2.5 w-full text-sm text-gray-900 bg-indigo-50 rounded-md border border-blue-600 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Isi alasan mengapa Anda menolak permintaan mahasiswa..">
                        {{ old('alasan_tolak') }}
                    </textarea>
                </td>

                <span class="text-red-800 text-sm font-poppins">
                    @error('alasan_tolak')
                        {{ $message }}
                    @enderror
                </span>

        <tr class="border-b border-gray-100 ">
            <td class="py-3 px-6 text-left font-poppins font-bold">
                <a href="{{ route('petugas.reject.izin-bermalam', $data->id) }}">
                    <button type="submit"
                        class="font-poppins text-white bg-red-700 focus:ring-4 
        focus:outline-none focus:ring-red-300 font-normal rounded-lg text-sm px-3 
        py-2 text-center inline-flex items-center mr-2.5 mb-3 mt-4">
                        <svg class="w-4 h-4 mr-2 -ml-1" fill="currentColor" id="icon-cross" viewBox="0 0 32 32">
                            <path
                                d="M31.708 25.708c-0-0-0-0-0-0l-9.708-9.708 9.708-9.708c0-0 0-0 0-0 0.105-0.105 0.18-0.227 0.229-0.357 0.133-0.356 0.057-0.771-0.229-1.057l-4.586-4.586c-0.286-0.286-0.702-0.361-1.057-0.229-0.13 0.048-0.252 0.124-0.357 0.228 0 0-0 0-0 0l-9.708 9.708-9.708-9.708c-0-0-0-0-0-0-0.105-0.104-0.227-0.18-0.357-0.228-0.356-0.133-0.771-0.057-1.057 0.229l-4.586 4.586c-0.286 0.286-0.361 0.702-0.229 1.057 0.049 0.13 0.124 0.252 0.229 0.357 0 0 0 0 0 0l9.708 9.708-9.708 9.708c-0 0-0 0-0 0-0.104 0.105-0.18 0.227-0.229 0.357-0.133 0.355-0.057 0.771 0.229 1.057l4.586 4.586c0.286 0.286 0.702 0.361 1.057 0.229 0.13-0.049 0.252-0.124 0.357-0.229 0-0 0-0 0-0l9.708-9.708 9.708 9.708c0 0 0 0 0 0 0.105 0.105 0.227 0.18 0.357 0.229 0.356 0.133 0.771 0.057 1.057-0.229l4.586-4.586c0.286-0.286 0.362-0.702 0.229-1.057-0.049-0.13-0.124-0.252-0.229-0.357z">
                            </path>
                        </svg>
                        Tolak
                    </button>
                </a>
                </form>
                <a href="{{ route('petugas.accept.izin-bermalam', $data->id) }}">
                    <button type="button"
                        class="font-poppins text-white bg-login focus:ring-4 
                            focus:outline-none focus:ring-blue-300 font-normal rounded-lg text-sm px-3 
                            py-2 text-center inline-flex items-center mr-2.5 mb-3">
                        <svg class="w-4 h-4 mr-2 -ml-1" fill="currentColor" id="icon-checkmark" viewBox="0 0 32 32">
                            <path d="M27 4l-15 15-7-7-5 5 12 12 20-20z"></path>
                        </svg>
                        Terima
                    </button>
                </a>
            </td>
        </tr>
        </tr>

        </tbody>
    @endif
    @endforeach

    </div>
    </table>

    </div>

    {{-- @if ($data->status == null)
        <h2 class="font-poppins pt-2 pb-2 text-lg">
            Tolak Izin Mahasiswa
        </h2>
        <div class="px-3.5 py-2.5 max-w-xs bg-gray-700 rounded-lg border border-gray-200 shadow-md">
            <h5 class="font-poppins mb-2 text-xl font-bold tracking-tight text-white">
                Alasan Penolakan
            </h5>

            <form action="{{ route('petugas.reject.izin-bermalam', $data->id) }}" method="POST">
                @csrf
                @method('PATCH')

                <textarea id="alasan_tolak" name="alasan_tolak" rows="4"
                    class="font-poppins placeholder:text-gray-500 block p-2.5 w-full text-sm text-gray-900 bg-indigo-50 rounded-md border border-blue-600 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Isi alasan mengapa Anda menolak permintaan mahasiswa..">
                    
                </textarea>
                </td>
                <span class="text-red-800 text-sm font-poppins">
                    @error('alasan_tolak')
                        {{ $message }}
                    @enderror
                </span>

                <a href="{{ route('petugas.reject.izin-bermalam', $data->id) }}">
                    <button type="submit"
                        class="font-poppins text-white bg-red-700 focus:ring-4 
    focus:outline-none focus:ring-red-300 font-normal rounded-lg text-sm px-3 
    py-2 text-center inline-flex items-center mr-2.5 mb-3 mt-4">
                        <svg class="w-4 h-4 mr-2 -ml-1" fill="currentColor" id="icon-cross" viewBox="0 0 32 32">
                            <path
                                d="M31.708 25.708c-0-0-0-0-0-0l-9.708-9.708 9.708-9.708c0-0 0-0 0-0 0.105-0.105 0.18-0.227 0.229-0.357 0.133-0.356 0.057-0.771-0.229-1.057l-4.586-4.586c-0.286-0.286-0.702-0.361-1.057-0.229-0.13 0.048-0.252 0.124-0.357 0.228 0 0-0 0-0 0l-9.708 9.708-9.708-9.708c-0-0-0-0-0-0-0.105-0.104-0.227-0.18-0.357-0.228-0.356-0.133-0.771-0.057-1.057 0.229l-4.586 4.586c-0.286 0.286-0.361 0.702-0.229 1.057 0.049 0.13 0.124 0.252 0.229 0.357 0 0 0 0 0 0l9.708 9.708-9.708 9.708c-0 0-0 0-0 0-0.104 0.105-0.18 0.227-0.229 0.357-0.133 0.355-0.057 0.771 0.229 1.057l4.586 4.586c0.286 0.286 0.702 0.361 1.057 0.229 0.13-0.049 0.252-0.124 0.357-0.229 0-0 0-0 0-0l9.708-9.708 9.708 9.708c0 0 0 0 0 0 0.105 0.105 0.227 0.18 0.357 0.229 0.356 0.133 0.771 0.057 1.057-0.229l4.586-4.586c0.286-0.286 0.362-0.702 0.229-1.057-0.049-0.13-0.124-0.252-0.229-0.357z">
                            </path>
                        </svg>
                        Tolak
                    </button>
                </a>
            </form>
        </div>
    @endif --}}
@endsection
