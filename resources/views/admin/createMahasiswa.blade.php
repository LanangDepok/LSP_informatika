@extends('template')

@section('content')
    <form id="mahasiswaForm" class="max-w-sm mx-auto" method="POST" action="{{ route('storeMahasiswa') }}">
        @csrf
        <div class="mb-5">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
            <input type="email" id="email" name="email"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
            <small id="emailError" class="text-red-500"></small>
        </div>
        <div class="mb-5">
            <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                Mahasiswa</label>
            <input type="text" id="nama" name="nama"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
            <small id="namaError" class="text-red-500"></small>
        </div>
        <div class="mb-5">
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
            <input type="password" id="password" name="password"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
            <small id="passwordError" class="text-red-500"></small>
        </div>
        <div class="text-center">
            <button type="submit"
                class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 ">
                Tambah Mahasiswa
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
            document.getElementById('passwordError').innerText = '';

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

            // Password validation
            const password = document.getElementById('password').value;
            if (password === '') {
                document.getElementById('passwordError').innerText = 'Password tidak boleh kosong';
                isValid = false;
            }

            // Prevent form submission if validation fails
            if (!isValid) {
                event.preventDefault();
            }
        });
    </script>
@endsection
