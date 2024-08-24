@extends('template')

@if (Auth::user()->status == 'Belum mengajukan')
    @section('content')
        <form class="max-w-sm mx-auto" method="POST" action="{{ route('ajukanPendaftaran', ['user' => Auth::user()->id]) }}">
            @csrf
            @method('PUT')
            <div class="mb-5">
                <p>1.</p>
                <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Lengkap
                    (sesuai
                    ijasah disertai gelar)</label>
                <input type="text" id="nama" name="nama" value="{{ Auth::user()->nama }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required />
            </div>
            <div class="mb-5">
                <p>2.</p>
                <label for="alamat_ktp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat
                    KTP</label>
                <textarea id="alamat_ktp" rows="4" name="alamat_ktp"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            {{ Auth::user()->alamat_ktp }}
            </textarea>
            </div>
            <div class="mb-5">
                <label for="alamat_sekarang" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat
                    Lengkap
                    Saat
                    Ini</label>
                <textarea id="alamat_sekarang" rows="4" name="alamat_sekarang"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                {{ Auth::user()->alamat_sekarang }}
            </textarea>
            </div>
            <div class="mb-5">
                <label for="provinsi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Provinsi</label>
                <select id="provinsi" name="provinsi"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @foreach ($provinsi as $provinsi1)
                        <option value="{{ $provinsi1->id }}">{{ $provinsi1->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-5">
                <label for="kota"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kota/Kabupaten</label>
                <select id="kota" name="kota"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @foreach ($kot_kab as $kot_kab1)
                        <option value="{{ $kot_kab1->id }}" data-provinsi-id="{{ $kot_kab1->provinsi_id }}">
                            {{ $kot_kab1->nama }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-5">
                <label for="kecamatan"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kecamatan</label>
                <input type="text" id="kecamatan" name="kecamatan" value="{{ Auth::user()->kecamatan }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required />
            </div>
            <div class="mb-5">
                <label for="no_telp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor
                    Telepon</label>
                <input type="number" id="no_telp" name="no_telp" value="{{ Auth::user()->no_telp }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required />
            </div>
            <div class="mb-5">
                <label for="no_hp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor HP</label>
                <input type="number" id="no_hp" name="no_hp" value="{{ Auth::user()->no_hp }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required />
            </div>
            <div class="mb-5">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                <input type="email" id="email" name="email" value="{{ Auth::user()->email }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required />
            </div>
            <div class="mb-5">
                <p>3.</p>
                <label for="nama"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kewarganegaraan</label>
                <div class="flex items-center mb-4">
                    <input id="kewarganegaraan-1" type="radio" value="WNI Asli" name="kewarganegaraan"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="kewarganegaraan-1" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        WNI Asli
                    </label>
                </div>
                <div class="flex items-center mb-4">
                    <input id="kewarganegaraan-2" type="radio" value="WNI Keturunan" name="kewarganegaraan"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="kewarganegaraan-2" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        WNI Keturunan
                    </label>
                </div>
                <div class="flex items-center mb-4">
                    <input id="kewarganegaraan-3" type="radio" value="WNA" name="kewarganegaraan"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="kewarganegaraan-3" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        WNA
                    </label>
                </div>
                <input type="text" name="negara" placeholder="Bila WNA Sebutkan Negaranya, jika bukan isi (-)"
                    value="{{ Auth::user()->negara }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
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
                        type="text" name="tanggal_lahir"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Select date">
                </div>
            </div>
            <div class="mb-5">
                <p>5.</p>
                <label for="tempat_lahir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Tempat Lahir (sesuai ijasah)
                </label>
                <input type="text" id="tempat_lahir" name="tempat_lahir" value="{{ Auth::user()->tempat_lahir }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required />
            </div>
            <div class="mb-5">
                <label for="negara_lahir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Bila tempat lahir di luar negeri sebutkan negaranya
                </label>
                <input type="text" id="negara_lahir" name="negara_lahir" value="{{ Auth::user()->negara_lahir }}"
                    placeholder="jika bukan isi (-)"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
            </div>
            <div class="mb-5">
                <label for="provinsi_lahir"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Provinsi</label>
                <select id="provinsi_lahir" name="provinsi_lahir"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @foreach ($provinsi as $provinsi1)
                        <option value="{{ $provinsi1->id }}">{{ $provinsi1->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-5">
                <label for="kota_lahir"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kota/Kabupaten</label>
                <select id="kota_lahir" name="kota_lahir"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @foreach ($kot_kab as $kot_kab1)
                        <option value="{{ $kot_kab1->id }}" data-provinsi-lahir-id="{{ $kot_kab1->provinsi_id }}">
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
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="jenis_kelamin-1" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        Pria
                    </label>
                </div>
                <div class="flex items-center mb-4">
                    <input id="jenis_kelamin-2" type="radio" value="Wanita" name="jenis_kelamin"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="jenis_kelamin-2" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        Wanita
                    </label>
                </div>
            </div>
            <div class="mb-5">
                <p>7.</p>
                <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status
                    Menikah</label>
                <div class="flex items-center mb-4">
                    <input id="status_menikah-1" type="radio" value="Belum Menikah" name="status_menikah"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="status_menikah-1" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        Belum Menikah
                    </label>
                </div>
                <div class="flex items-center mb-4">
                    <input id="status_menikah-2" type="radio" value="Menikah" name="status_menikah"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="status_menikah-2" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        Menikah
                    </label>
                </div>
                <div class="flex items-center mb-4">
                    <input id="status_menikah-3" type="radio" value="Lain-lain (janda/duda)" name="status_menikah"3
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="status_menikah-3" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        Lain-lain (janda/duda)
                    </label>
                </div>
            </div>
            <div class="mb-5">
                <p>8.</p>
                <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Agama</label>
                <div class="flex items-center mb-4">
                    <input id="agama-1" type="radio" value="Islam" name="agama"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="agama-1" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        Islam
                    </label>
                </div>
                <div class="flex items-center mb-4">
                    <input id="agama-2" type="radio" value="Katolik" name="agama"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="agama-2" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        Katolik
                    </label>
                </div>
                <div class="flex items-center mb-4">
                    <input id="agama-3" type="radio" value="Kristen" name="agama"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="agama-3" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        Kristen
                    </label>
                </div>
                <div class="flex items-center mb-4">
                    <input id="agama-4" type="radio" value="Hindu" name="agama"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="agama-4" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        Hindu
                    </label>
                </div>
                <div class="flex items-center mb-4">
                    <input id="agama-5" type="radio" value="Budha" name="agama"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="agama-5" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        Budha
                    </label>
                </div>
                <div class="flex items-center mb-4">
                    <input id="agama-6" type="radio" value="Lain-lain" name="agama"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="agama-6" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        Lain-lain
                    </label>
                </div>
            </div>
            <div class="text-center mt-20">
                <button type="submit"
                    class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 ">
                    Ajukan Pendaftaran
                </button>
            </div>
        </form>
    @endsection

    @section('script')
        <script>
            $(document).ready(function() {

                $('#provinsi').val('{{ Auth::user()->provinsi }}')
                $('#kota').val('{{ Auth::user()->kota }}')
                $('#kota option').hide()

                $('#provinsi').change(function() {
                    var provinsiID = $(this).val()
                    $('#kota option').hide()
                    $('#kota option[data-provinsi-id="' + provinsiID + '"]').show()
                })


                $('#provinsi_lahir').val('{{ Auth::user()->provinsi }}')
                $('#kota_lahir').val('{{ Auth::user()->kota }}')
                $('#kota_lahir option').hide()

                $('#provinsi_lahir').change(function() {
                    var provinsiLahirID = $(this).val()
                    $('#kota_lahir option').hide()
                    $('#kota_lahir option[data-provinsi-lahir-id="' + provinsiLahirID + '"]').show()
                })
            })
        </script>
    @endsection
@else
    @section('content')
        <p class="text-4xl text-center font-bold text-gray-900 dark:text-white">Anda sudah mengajukan pendaftaran</p>
    @endsection
@endif
