@extends('template')

@section('content')
    <form id="mahasiswaForm" class="max-w-sm mx-auto" method="POST"
        action="{{ route('updatePendaftaran', ['user' => $data->id]) }}">
        @csrf
        @method('PUT')
        <div class="mb-5">
            <p>1.</p>
            <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Lengkap
                (sesuai
                ijasah disertai gelar)</label>
            <input type="text" id="nama" name="nama" value="{{ $data->nama }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
            <small id="namaError" class="text-red-500"></small>
        </div>
        <div class="mb-5">
            <p>2.</p>
            <label for="alamat_ktp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat
                KTP</label>
            <textarea id="alamat_ktp" rows="4" name="alamat_ktp"
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    {{ $data->alamat_ktp }}
    </textarea>
            <small id="alamatKtpError" class="text-red-500"></small>
        </div>
        <div class="mb-5">
            <label for="alamat_sekarang" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Alamat Lengkap Saat Ini</label>
            <textarea id="alamat_sekarang" rows="4" name="alamat_sekarang"
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        {{ $data->alamat_sekarang }}
    </textarea>
            <small id="alamatSekarangError" class="text-red-500"></small>
        </div>
        <div class="mb-5">
            <label for="provinsi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Provinsi</label>
            <select id="provinsi" name="provinsi_id"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @foreach ($provinsi as $provinsi1)
                    <option value="{{ $provinsi1->id }}" {{ $data->provinsi_id == $provinsi1->id ? 'selected' : '' }}>
                        {{ $provinsi1->nama }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-5">
            <label for="kota"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kota/Kabupaten</label>
            <select id="kota" name="kota_id"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @foreach ($kot_kab as $kot_kab1)
                    <option value="{{ $kot_kab1->id }}" data-provinsi-id="{{ $kot_kab1->provinsi_id }}"
                        {{ $data->kota_id == $kot_kab1->id ? 'selected' : '' }}>
                        {{ $kot_kab1->nama }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-5">
            <label for="kecamatan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kecamatan</label>
            <input type="text" id="kecamatan" name="kecamatan" value="{{ $data->kecamatan }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
            <small id="kecamatanError" class="text-red-500"></small>
        </div>
        <div class="mb-5">
            <label for="no_telp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor
                Telepon</label>
            <input type="number" id="no_telp" name="no_telp" value="{{ $data->no_telp }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
            <small id="noTelpError" class="text-red-500"></small>
        </div>
        <div class="mb-5">
            <label for="no_hp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor HP</label>
            <input type="number" id="no_hp" name="no_hp" value="{{ $data->no_hp }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
            <small id="noHpError" class="text-red-500"></small>
        </div>
        <div class="mb-5">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
            <input type="email" id="email" name="email" value="{{ $data->email }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
            <small id="emailError" class="text-red-500"></small>
        </div>
        <div class="mb-5">
            <p>3.</p>
            <label for="nama"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kewarganegaraan</label>
            <div class="flex items-center mb-4">
                <input id="kewarganegaraan-1" type="radio" value="WNI Asli" name="kewarganegaraan"
                    {{ $data->kewarganegaraan == 'WNI Asli' ? 'checked' : '' }}
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="kewarganegaraan-1" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    WNI Asli
                </label>
            </div>
            <div class="flex items-center mb-4">
                <input id="kewarganegaraan-2" type="radio" value="WNI Keturunan" name="kewarganegaraan"
                    {{ $data->kewarganegaraan == 'WNI Keturunan' ? 'checked' : '' }}
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="kewarganegaraan-2" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    WNI Keturunan
                </label>
            </div>
            <div class="flex items-center mb-4">
                <input id="kewarganegaraan-3" type="radio" value="WNA" name="kewarganegaraan"
                    {{ $data->kewarganegaraan == 'WNA' ? 'checked' : '' }}
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="kewarganegaraan-3" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    WNA
                </label>
            </div>
            <small id="kewarganegaraanError" class="text-red-500"></small>
            <input type="text" id="negara" name="negara"
                placeholder="Bila WNA Sebutkan Negaranya, jika bukan isi (-)" value="{{ $data->negara }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
            <small id="negaraError" class="text-red-500"></small>
        </div>
        <div class="mb-5">
            <p>4.</p>
            <label for="tanggal_lahir" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                Tanggal Lahir (sesuai ijasah)
            </label>
            <div class="relative max-w-sm">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                    </svg>
                </div>
                <input id="tanggal_lahir" datepicker datepicker-buttons datepicker-autohide datepicker-autoselect-today
                    type="text" name="tanggal_lahir" value="{{ $data->tanggal_lahir }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Select date">
            </div>
            <small id="tanggalLahirError" class="text-red-500"></small>
        </div>
        <div class="mb-5">
            <p>5.</p>
            <label for="tempat_lahir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Tempat Lahir (sesuai ijasah)
            </label>
            <input type="text" id="tempat_lahir" name="tempat_lahir" value="{{ $data->tempat_lahir }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
            <small id="tempatLahirError" class="text-red-500"></small>
        </div>
        <div class="mb-5">
            <label for="negara_lahir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Bila tempat lahir di luar negeri sebutkan negaranya
            </label>
            <input type="text" id="negara_lahir" name="negara_lahir" value="{{ $data->negara_lahir }}"
                placeholder="jika bukan isi (-)"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
            <small id="negaraLahirError" class="text-red-500"></small>
        </div>
        <div class="mb-5">
            <label for="provinsi_lahir"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Provinsi</label>
            <select id="provinsi_lahir" name="provinsi_lahir_id"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @foreach ($provinsi as $provinsi1)
                    <option value="{{ $provinsi1->id }}"
                        {{ $data->provinsi_lahir_id == $provinsi1->id ? 'selected' : '' }}>{{ $provinsi1->nama }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-5">
            <label for="kota_lahir"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kota/Kabupaten</label>
            <select id="kota_lahir" name="kota_lahir_id"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @foreach ($kot_kab as $kot_kab1)
                    <option value="{{ $kot_kab1->id }}" data-provinsi-lahir-id="{{ $kot_kab1->provinsi_id }}"
                        {{ $data->kota_lahir_id == $kot_kab1->id ? 'selected' : '' }}>
                        {{ $kot_kab1->nama }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-5">
            <p>6.</p>
            <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                Kelamin</label>
            <div class="flex items-center mb-4">
                <input id="jenis_kelamin-1" type="radio" value="Pria" name="jenis_kelamin"
                    {{ $data->jenis_kelamin == 'Pria' ? 'checked' : '' }}
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="jenis_kelamin-1" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    Pria
                </label>
            </div>
            <div class="flex items-center mb-4">
                <input id="jenis_kelamin-2" type="radio" value="Wanita" name="jenis_kelamin"
                    {{ $data->jenis_kelamin == 'Wanita' ? 'checked' : '' }}
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="jenis_kelamin-2" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    Wanita
                </label>
            </div>
            <small id="jenisKelaminError" class="text-red-500"></small>
        </div>
        <div class="mb-5">
            <p>7.</p>
            <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status
                Menikah</label>
            <div class="flex items-center mb-4">
                <input id="status_menikah-1" type="radio" value="Belum Menikah" name="status_menikah"
                    {{ $data->status_menikah == 'Belum Menikah' ? 'checked' : '' }}
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="status_menikah-1" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    Belum Menikah
                </label>
            </div>
            <div class="flex items-center mb-4">
                <input id="status_menikah-2" type="radio" value="Menikah" name="status_menikah"
                    {{ $data->status_menikah == 'Menikah' ? 'checked' : '' }}
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="status_menikah-2" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    Menikah
                </label>
            </div>
            <div class="flex items-center mb-4">
                <input id="status_menikah-3" type="radio" value="Lain-lain (janda/duda)" name="status_menikah"
                    {{ $data->status_menikah == 'Lain-lain (janda/duda)' ? 'checked' : '' }}
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="status_menikah-3" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    Lain-lain (janda/duda)
                </label>
            </div>
            <small id="statusMenikahError" class="text-red-500"></small>
        </div>
        <div class="mb-5">
            <p>8.</p>
            <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Agama</label>
            <div class="flex items-center mb-4">
                <input id="agama-1" type="radio" value="Islam" name="agama"
                    {{ $data->agama == 'Islam' ? 'checked' : '' }}
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="agama-1" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    Islam
                </label>
            </div>
            <div class="flex items-center mb-4">
                <input id="agama-2" type="radio" value="Katolik" name="agama"
                    {{ $data->agama == 'Katolik' ? 'checked' : '' }}
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="agama-2" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    Katolik
                </label>
            </div>
            <div class="flex items-center mb-4">
                <input id="agama-3" type="radio" value="Kristen" name="agama"
                    {{ $data->agama == 'Kristen' ? 'checked' : '' }}
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="agama-3" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    Kristen
                </label>
            </div>
            <div class="flex items-center mb-4">
                <input id="agama-4" type="radio" value="Hindu" name="agama"
                    {{ $data->agama == 'Hindu' ? 'checked' : '' }}
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="agama-4" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    Hindu
                </label>
            </div>
            <div class="flex items-center mb-4">
                <input id="agama-5" type="radio" value="Budha" name="agama"
                    {{ $data->agama == 'Budha' ? 'checked' : '' }}
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="agama-5" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    Budha
                </label>
            </div>
            <div class="flex items-center mb-4">
                <input id="agama-6" type="radio" value="Lain-lain" name="agama"
                    {{ $data->agama == 'Lain-lain' ? 'checked' : '' }}
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="agama-6" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    Lain-lain
                </label>
            </div>
            <small id="agamaError" class="text-red-500"></small>
        </div>
        <div class="text-center mt-20 print:hidden">
            <button type="submit"
                class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 ">
                Ubah Data
            </button>
            <a href="#" onclick="downloadPDF()">
                <button
                    class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-green-400 to-blue-600 group-hover:from-green-400 group-hover:to-blue-600 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800">
                    <span
                        class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                        Print PDF
                    </span>
                </button>
            </a>
        </div>
    </form>
@endsection

@section('script')
    <script>
        $(document).ready(function() {

            $('#provinsi').val('{{ $data->provinsi_id }}')
            $('#kota').val('{{ $data->kota_id }}')
            $('#kota option').hide()

            $('#provinsi').change(function() {
                var provinsiID = $(this).val()
                $('#kota option').hide()
                $('#kota option[data-provinsi-id="' + provinsiID + '"]').show()
            })


            $('#provinsi_lahir').val('{{ $data->provinsi_lahir_id }}')
            $('#kota_lahir').val('{{ $data->kota_lahir_id }}')
            $('#kota_lahir option').hide()

            $('#provinsi_lahir').change(function() {
                var provinsiLahirID = $(this).val()
                $('#kota_lahir option').hide()
                $('#kota_lahir option[data-provinsi-lahir-id="' + provinsiLahirID + '"]').show()
            })
        })

        //validasi form
        document.getElementById('mahasiswaForm').addEventListener('submit', function(event) {
            let isValid = true;

            // Mengambil nilai dari input
            const nama = document.getElementById('nama').value.trim();
            const alamatKtp = document.getElementById('alamat_ktp').value.trim();
            const alamatSekarang = document.getElementById('alamat_sekarang').value.trim();
            const provinsi = document.getElementById('provinsi').value;
            const kota = document.getElementById('kota').value;
            const kecamatan = document.getElementById('kecamatan').value.trim();
            const noTelp = document.getElementById('no_telp').value.trim();
            const noHp = document.getElementById('no_hp').value.trim();
            const email = document.getElementById('email').value.trim();
            const kewarganegaraan = document.querySelector('input[name="kewarganegaraan"]:checked');
            const negara = document.getElementById('negara').value.trim();
            const tanggalLahir = document.getElementById('tanggal_lahir').value.trim();
            const tempatLahir = document.getElementById('tempat_lahir').value.trim();
            const negaraLahir = document.getElementById('negara_lahir').value.trim();
            const provinsiLahir = document.getElementById('provinsi_lahir').value;
            const kotaLahir = document.getElementById('kota_lahir').value;
            const jenisKelamin = document.querySelector('input[name="jenis_kelamin"]:checked');
            const statusMenikah = document.querySelector('input[name="status_menikah"]:checked');
            const agama = document.querySelector('input[name="agama"]:checked');

            // Validasi input
            if (nama === '') {
                isValid = false;
                document.getElementById('namaError').textContent = 'Nama tidak boleh kosong';
            } else {
                document.getElementById('namaError').textContent = '';
            }

            if (alamatKtp === '') {
                isValid = false;
                document.getElementById('alamatKtpError').textContent = 'Alamat KTP tidak boleh kosong';
            } else {
                document.getElementById('alamatKtpError').textContent = '';
            }

            if (alamatSekarang === '') {
                isValid = false;
                document.getElementById('alamatSekarangError').textContent = 'Alamat sekarang tidak boleh kosong';
            } else {
                document.getElementById('alamatSekarangError').textContent = '';
            }

            if (provinsi === '') {
                isValid = false;
                document.getElementById('provinsiError').textContent = 'Provinsi tidak boleh kosong';
            } else {
                document.getElementById('provinsiError').textContent = '';
            }

            if (kota === '') {
                isValid = false;
                document.getElementById('kotaError').textContent = 'Kota/Kabupaten tidak boleh kosong';
            } else {
                document.getElementById('kotaError').textContent = '';
            }

            if (kecamatan === '') {
                isValid = false;
                document.getElementById('kecamatanError').textContent = 'Kecamatan tidak boleh kosong';
            } else {
                document.getElementById('kecamatanError').textContent = '';
            }

            if (noTelp === '' || noTelp.length < 10) {
                isValid = false;
                document.getElementById('noTelpError').textContent = 'Nomor telepon tidak valid';
            } else {
                document.getElementById('noTelpError').textContent = '';
            }

            if (noHp === '' || noHp.length < 10) {
                isValid = false;
                document.getElementById('noHpError').textContent = 'Nomor HP tidak valid';
            } else {
                document.getElementById('noHpError').textContent = '';
            }

            if (email === '' || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                isValid = false;
                document.getElementById('emailError').textContent = 'Email tidak valid';
            } else {
                document.getElementById('emailError').textContent = '';
            }

            if (!kewarganegaraan) {
                isValid = false;
                document.getElementById('kewarganegaraanError').textContent = 'Kewarganegaraan harus dipilih';
            } else {
                document.getElementById('kewarganegaraanError').textContent = '';
            }

            if (!negara) {
                isValid = false;
                document.getElementById('negaraError').textContent = 'Silahkan isi (-) jika selain WNA';
            } else {
                document.getElementById('negaraError').textContent = '';
            }

            if (tanggalLahir === '') {
                isValid = false;
                document.getElementById('tanggalLahirError').textContent = 'Tanggal lahir tidak boleh kosong';
            } else {
                document.getElementById('tanggalLahirError').textContent = '';
            }

            if (tempatLahir === '') {
                isValid = false;
                document.getElementById('tempatLahirError').textContent = 'Tempat lahir tidak boleh kosong';
            } else {
                document.getElementById('tempatLahirError').textContent = '';
            }

            if (!negaraLahir) {
                isValid = false;
                document.getElementById('negaraLahirError').textContent = 'Silahkan isi (-) jika selain WNA';
            } else {
                document.getElementById('negaraLahirError').textContent = '';
            }

            if (provinsiLahir === '') {
                isValid = false;
                document.getElementById('provinsiLahirError').textContent = 'Provinsi kelahiran tidak boleh kosong';
            } else {
                document.getElementById('provinsiLahirError').textContent = '';
            }

            if (kotaLahir === '') {
                isValid = false;
                document.getElementById('kotaLahirError').textContent =
                    'Kota/Kabupaten kelahiran tidak boleh kosong';
            } else {
                document.getElementById('kotaLahirError').textContent = '';
            }

            if (!jenisKelamin) {
                isValid = false;
                document.getElementById('jenisKelaminError').textContent = 'Jenis kelamin harus dipilih';
            } else {
                document.getElementById('jenisKelaminError').textContent = '';
            }

            if (!statusMenikah) {
                isValid = false;
                document.getElementById('statusMenikahError').textContent = 'Status menikah harus dipilih';
            } else {
                document.getElementById('statusMenikahError').textContent = '';
            }

            if (!agama) {
                isValid = false;
                document.getElementById('agamaError').textContent = 'Agama harus dipilih';
            } else {
                document.getElementById('agamaError').textContent = '';
            }

            // Prevent form submission if validation fails
            if (!isValid) {
                event.preventDefault();
            }
        });

        function downloadPDF() {
            window.print();
        }
    </script>
@endsection
