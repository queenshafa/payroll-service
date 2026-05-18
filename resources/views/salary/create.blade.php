@extends('layouts.app')


@section('title', 'Input Gaji')


@section('content')


    {{-- ===== HEADER ===== --}}
    <div class="flex items-center gap-3 mb-6">
        <a href="#" class="p-2 rounded-lg hover:bg-gray-100 transition text-gray-400 hover:text-gray-600">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </a>
        <div>
            <h1 class="text-xl font-bold text-gray-800">Input Gaji Karyawan</h1>
            <p class="text-sm text-gray-400 mt-0.5">Isi form di bawah untuk membuat slip gaji</p>
        </div>
    </div>


    {{-- Flash error duplikat --}}
    @if (session('error'))
        <div class="flex items-center gap-2 bg-red-50 border border-red-200 text-red-600 text-sm rounded-xl px-4 py-3 mb-4">
            <svg class="w-4 h-4 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm-1-7V7a1 1 0 112 0v4a1 1 0 11-2 0zm1 4a1 1 0 100-2 1 1 0 000 2z"
                    clip-rule="evenodd" />
            </svg>
            {{ session('error') }}
        </div>
    @endif


    {{-- Validation Errors --}}
    @if ($errors->any())
        <div class="bg-red-50 border border-red-200 rounded-xl px-4 py-3 mb-4">
            <p class="text-sm font-semibold text-red-600 mb-2">Terdapat kesalahan input:</p>
            <ul class="list-disc list-inside space-y-1">
                @foreach ($errors->all() as $error)
                    <li class="text-sm text-red-500">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('salary.store') }}" method="POST">
        @csrf


        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">


            {{-- ===== KOLOM KIRI (form utama) ===== --}}
            <div class="lg:col-span-2 space-y-5">


                {{-- Pilih Karyawan & Periode --}}
                <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-6">
                    <h2 class="text-sm font-semibold text-gray-700 mb-4 pb-3 border-b border-gray-100">
                        Informasi Karyawan & Periode
                    </h2>


                    <div class="space-y-4">


                        {{-- Pilih Karyawan --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-1.5">
                                Pilih Karyawan <span class="text-red-400">*</span>
                            </label>
                            <input type="hidden" name="employee_id" value="{{ $employee->id }}" />
                            <input type="text" value="{{ $employee->name }} ({{ $employee->nik }})" disabled
                                class="w-full text-sm border border-gray-200 rounded-lg px-3 py-2.5 text-gray-700 bg-gray-50 cursor-not-allowed focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
                        </div>


                        {{-- Bulan & Tahun --}}
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-600 mb-1.5">
                                    Bulan <span class="text-red-400">*</span>
                                </label>
                                <select name="bulan"
                                    class="w-full text-sm border border-gray-200 rounded-lg px-3 py-2.5 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                    <option value="" disabled selected>-- Pilih Bulan --</option>
                                    <option value="1">Januari</option>
                                    <option value="2">Februari</option>
                                    <option value="3">Maret</option>
                                    <option value="4">April</option>
                                    <option value="5">Mei</option>
                                    <option value="6">Juni</option>
                                    <option value="7">Juli</option>
                                    <option value="8">Agustus</option>
                                    <option value="9">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">Desember</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-600 mb-1.5">
                                    Tahun <span class="text-red-400">*</span>
                                </label>
                                <select name="tahun"
                                    class="w-full text-sm border border-gray-200 rounded-lg px-3 py-2.5 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                    <option value="2025">2025</option>
                                    <option value="2026">2026</option>
                                    <option value="2027">2027</option>
                                </select>
                            </div>
                        </div>


                    </div>
                </div>


                {{-- Komponen Gaji --}}
                <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-6 mt-4">
                    <h2 class="text-sm font-semibold text-gray-700 mb-4 pb-3 border-b border-gray-100">
                        Komponen Gaji
                    </h2>


                    <div class="space-y-4">


                        {{-- Gaji Pokok --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-1.5">
                                Gaji Pokok <span class="text-red-400">*</span>
                            </label>
                            {{-- Hidden input yang benar-benar dikirim --}}
                            <input type="hidden" name="gaji_pokok" value="{{ $employee->salary }}" />
                            {{-- Input tampilan saja (disabled) --}}
                            <input value="{{ $employee->salary }}" disabled type="number"
                                class="w-full text-sm border border-gray-200 rounded-lg pl-9 pr-4 py-2.5 text-gray-700 bg-gray-50 cursor-not-allowed focus:outline-none" />
                            @error('gaji_pokok')
                                <p class="text-xs text-red-500 mt-1.5">{{ $message }}</p>
                            @enderror
                        </div>


                        {{-- Tunjangan --}}
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-600 mb-1.5">Tunjangan Makan</label>
                                <div class="relative">
                                    <input type="number" name="tunjangan_makan" placeholder="0"
                                        class="w-full text-sm border border-gray-200 rounded-lg pl-9 pr-4 py-2.5 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                        min="0" step="1000" />


                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-600 mb-1.5">Tunjangan Transportasi</label>
                                <div class="relative">
                                    <input type="number" name="tunjangan_transportasi" placeholder="0"
                                        class="w-full text-sm border border-gray-200 rounded-lg pl-9 pr-4 py-2.5 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                        min="0" step="1000" />
                                </div>
                            </div>
                        </div>


                        {{-- Potongan --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-1.5">Potongan</label>
                            <div class="relative">
                                <input type="number" name="potongan" placeholder="0"
                                    class="w-full text-sm border border-gray-200 rounded-lg pl-9 pr-4 py-2.5 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                    min="0" step="1000" />
                            </div>
                            <p class="text-xs text-gray-400 mt-1.5">Contoh: potongan BPJS, keterlambatan, dll.</p>
                        </div>


                    </div>
                </div>


            </div>
            {{-- ===== END KOLOM KIRI ===== --}}




            {{-- ===== KOLOM KANAN (ringkasan) ===== --}}
            <div class="space-y-5">


                {{-- Ringkasan Perhitungan --}}
                <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-6 mt-4">
                    <h2 class="text-sm font-semibold text-gray-700 mb-4 pb-3 border-b border-gray-100">
                        Ringkasan Gaji
                    </h2>


                    <div class="space-y-3 text-sm">


                        <div class="flex justify-between items-center text-gray-500">
                            <span>Gaji Pokok</span>
                            <span id="preview-gaji-pokok" class="font-medium text-gray-700">Rp 0</span>
                        </div>


                        <div class="flex justify-between items-center text-gray-500">
                            <span>Tunjangan Makan</span>
                            <span id="preview-t-makan" class="font-medium text-green-600">+ Rp 0</span>
                        </div>


                        <div class="flex justify-between items-center text-gray-500">
                            <span>Tunjangan Transport</span>
                            <span id="preview-t-transport" class="font-medium text-green-600">+ Rp 0</span>
                        </div>


                        <div class="flex justify-between items-center text-gray-500">
                            <span>Potongan</span>
                            <span id="preview-potongan" class="font-medium text-red-500">- Rp 0</span>
                        </div>


                        <div class="border-t border-dashed border-gray-200 pt-3 mt-3 flex justify-between items-center">
                            <span class="font-semibold text-gray-700">Gaji Bersih</span>
                            <span id="preview-gaji-bersih" class="font-bold text-blue-600 text-base">Rp 0</span>
                        </div>


                        {{-- Hidden input gaji_bersih --}}
                        <input type="hidden" name="gaji_bersih" id="input-gaji-bersih" value="0" />


                    </div>
                </div>


                {{-- Tombol Aksi --}}
                <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-6 space-y-3 mt-4">
                    <button type="submit"
                        class="w-full p-3 bg-blue-600 text-white text-sm font-semibold rounded-lg hover:bg-blue-700 transition">
                        Simpan Slip Gaji
                    </button>
                    <a href="#"
                        class="block w-full py-3 mt-3 text-center text-sm font-medium text-gray-500 bg-gray-50 rounded-lg hover:bg-gray-100 transition">
                        Batal
                    </a>
                </div>


                {{-- Info box --}}
                <div class="bg-blue-50 border border-blue-100 rounded-xl p-4 mt-6">
                    <div class="flex gap-2">
                        <svg class="w-4 h-4 text-blue-400 shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                clip-rule="evenodd" />
                        </svg>
                        <p class="text-xs text-blue-600 leading-relaxed">
                            Gaji bersih dihitung otomatis:<br>
                            <span class="font-medium">Gaji Pokok + Tunjangan − Potongan</span>
                        </p>
                    </div>
                </div>


            </div>
            {{-- ===== END KOLOM KANAN ===== --}}


        </div>


    </form>


    {{-- ===== SCRIPT KALKULASI REAL-TIME ===== --}}
    {{-- ===== SCRIPT KALKULASI REAL-TIME ===== --}}
    <script>
        // Gaji pokok ambil dari hidden input (nilainya static, tidak perlu listen event)
        const gajiPokokValue = parseInt(document.querySelector('[name="gaji_pokok"]').value) || 0;


        const fields = {
            tMakan: document.querySelector('[name="tunjangan_makan"]'),
            tTransport: document.querySelector('[name="tunjangan_transportasi"]'),
            potongan: document.querySelector('[name="potongan"]'),
        };


        const previews = {
            gajiPokok: document.getElementById('preview-gaji-pokok'),
            tMakan: document.getElementById('preview-t-makan'),
            tTransport: document.getElementById('preview-t-transport'),
            potongan: document.getElementById('preview-potongan'),
            gajiBersih: document.getElementById('preview-gaji-bersih'),
            inputBersih: document.getElementById('input-gaji-bersih'),
        };


        function rupiah(angka) {
            return 'Rp ' + Number(angka).toLocaleString('id-ID');
        }


        function hitung() {
            const gp = gajiPokokValue;
            const tm = parseInt(fields.tMakan.value) || 0;
            const tt = parseInt(fields.tTransport.value) || 0;
            const pt = parseInt(fields.potongan.value) || 0;
            const bersih = gp + tm + tt - pt;


            previews.gajiPokok.textContent = rupiah(gp);
            previews.tMakan.textContent = '+ ' + rupiah(tm);
            previews.tTransport.textContent = '+ ' + rupiah(tt);
            previews.potongan.textContent = '- ' + rupiah(pt);
            previews.gajiBersih.textContent = rupiah(bersih);
            previews.inputBersih.value = bersih;
        }


        // Panggil sekali saat load agar preview gaji pokok langsung muncul
        hitung();


        Object.values(fields).forEach(f => f.addEventListener('input', hitung));
    </script>


@endsection
