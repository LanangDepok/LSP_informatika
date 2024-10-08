@extends('template')

@section('content')
    <form id="mahasiswaForm" class="max-w-sm mx-auto" method="POST"
        action="{{ route('updateMahasiswa', ['user' => $data->id]) }}">
        @method('PUT')
        @csrf
        <div class="mb-5">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
            <input type="email" id="email" name="email" value="{{ $data->email }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
            <small id="emailError" class="text-red-500"></small>
        </div>
        <div class="mb-5">
            <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                Mahasiswa</label>
            <input type="text" id="nama" name="nama" value="{{ $data->nama }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
            <small id="namaError" class="text-red-500"></small>
        </div>
        <div class="mb-5">
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
            <input type="password" id="password" name="password"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
        </div>
        <div class="text-center">
            <button type="submit"
                class="text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                Edit Mahasiswa
            </button>
        </div>
    </form>
@endsection

@section('script')
    <script>
        document.getElementById('mahasiswaForm').addEventListener('submit', function(event) {
            let isValid = true;

            // Clear previous errors
            document.getElementById('emailError').innerText = '';
            document.getElementById('namaError').innerText = '';

            // Email validation
            const email = document.getElementById('email').value;
            if (email === '') {
                document.getElementById('emailError').innerText = 'Email tidak boleh kosong';
                isValid = false;
            }

            // Nama validation
            const nama = document.getElementById('nama').value;
            if (nama === '') {
                document.getElementById('namaError').innerText = 'Nama tidak boleh kosong';
                isValid = false;
            }

            // Prevent form submission if validation fails
            if (!isValid) {
                event.preventDefault();
            }
        });
    </script>
@endsection
