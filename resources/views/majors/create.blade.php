
@extends('layouts.app')

@section('title', $title)

@section('content')

<div class="mb-8 border-b border-[#E5E3DB] pb-5">

    <a href="{{ route('majors.index') }}"
       class="mb-3 block text-[11px] uppercase tracking-[0.2em] text-slate-400">
        ← DAFTAR JURUSAN
    </a>

    <h1 class="font-display text-3xl font-semibold text-[#16213A]">
        Catat Jurusan Baru
    </h1>

    <p class="mt-1 text-sm text-slate-500">
        Isi data untuk menambahkan jurusan baru.
    </p>

</div>

<div class="border border-[#E5E3DB] bg-white p-6">

    <form action="{{ route('majors.store') }}" method="POST">
        @csrf

        <div class="mb-6">
            <label class="mb-2 block text-[11px] font-semibold uppercase tracking-[0.15em] text-[#16213A]">
                Kode Jurusan
            </label>

            <input type="text"
                   name="code"
                   placeholder="Contoh: TKJ"
                   class="w-full border border-[#D9D6CD] bg-[#FAF9F5] px-4 py-3 text-sm outline-none focus:border-[#16213A]">
        </div>

        <div class="mb-6">
            <label class="mb-2 block text-[11px] font-semibold uppercase tracking-[0.15em] text-[#16213A]">
                Nama Jurusan
            </label>

            <input type="text"
                   name="name"
                   placeholder="Nama lengkap jurusan"
                   class="w-full border border-[#D9D6CD] bg-[#FAF9F5] px-4 py-3 text-sm outline-none focus:border-[#16213A]">
        </div>

        <div class="mb-6">
            <label class="mb-2 block text-[11px] font-semibold uppercase tracking-[0.15em] text-[#16213A]">
                Deskripsi
            </label>

            <textarea name="description"
                      rows="5"
                      placeholder="Deskripsi jurusan"
                      class="w-full border border-[#D9D6CD] bg-[#FAF9F5] px-4 py-3 text-sm outline-none focus:border-[#16213A]"></textarea>
        </div>

        <div class="flex justify-end gap-5 border-t border-[#E5E3DB] pt-5">

            <a href="{{ route('majors.index') }}"
               class="px-4 py-2.5 text-sm text-slate-500">
                Batal
            </a>

            <button type="submit"
                    class="bg-[#16213A] px-5 py-2.5 text-sm text-white hover:bg-[#26324f]">
                Simpan Jurusan
            </button>

        </div>

    </form>

</div>

@endsection