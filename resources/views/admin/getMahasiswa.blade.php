@extends('template')

@section('content')
    <div class="max-w-sm mx-auto">
        <div class="mb-5">
            <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
            <input type="text" id="nama" name="nama" value="{{ $data->email }}" readonly
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                required />
        </div>
        <div class="mb-5">
            <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                Mahasiswa</label>
            <input type="text" id="nama" name="nama" value="{{ $data->nama }}" readonly
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                required />
        </div>
    </div>
@endsection
