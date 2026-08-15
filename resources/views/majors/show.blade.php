@extends('layouts.app')

@section('title', $title)

@section('content')

<a href="{{ route('majors.index') }}"
   class="mb-4 block text-[11px] uppercase tracking-[0.2em] text-slate-400">
    ← DAFTAR JURUSAN
</a>

<div class="border border-[#E5E3DB] bg-white">

    <div class="flex items-start justify-between border-b border-[#E5E3DB] p-6">

        <div>
            <p class="mb-1 text-[11px] uppercase tracking-[0.2em] text-[#A16207]">
                Detail Jurusan
            </p>

            <h1 class="font-display text-3xl font-semibold text-[#16213A]">
                {{ $major['name'] }}
            </h1>

            <p class="mt-1 font-mono text-xs text-slate-500">
                {{ $major['code'] }}
            </p>
        </div>

        <a href="{{ route('majors.edit', ['major' => $major['id']]) }}"
           class="bg-[#16213A] px-5 py-2.5 text-sm font-medium text-white hover:bg-[#26324f]">
            Ubah
        </a>

    </div>

    <div class="border-b border-[#EFEDE6] px-6 py-5">
        <div class="flex justify-between">

            <span class="text-[11px] uppercase tracking-[0.15em] text-slate-400">
                Kode Jurusan
            </span>

            <strong class="text-sm text-[#16213A]">
                {{ $major['code'] }}
            </strong>

        </div>
    </div>

    <div class="border-b border-[#EFEDE6] px-6 py-5">
        <div class="flex justify-between">

            <span class="text-[11px] uppercase tracking-[0.15em] text-slate-400">
                Nama Jurusan
            </span>

            <strong class="text-sm text-[#16213A]">
                {{ $major['name'] }}
            </strong>

        </div>
    </div>

    <div class="px-6 py-5">

        <span class="mb-2 block text-[11px] uppercase tracking-[0.15em] text-slate-400">
            Deskripsi
        </span>

        <p class="text-sm leading-6 text-[#16213A]">
            {{ $major['description'] }}
        </p>

    </div>

    <div class="flex justify-end gap-5 border-t border-[#E5E3DB] p-5">

        <a href="{{ route('majors.index') }}"
           class="px-4 py-2.5 text-sm text-slate-500 hover:text-[#16213A]">
            Kembali
        </a>

        <form action="{{ route('majors.destroy', ['major' => $major['id']]) }}"
              method="POST"
              onsubmit="return confirm('Hapus data jurusan ini?')">

            @csrf
            @method('DELETE')

            <button type="submit"
                    class="border border-red-200 px-5 py-2.5 text-sm text-red-700 hover:bg-red-50">
                Hapus
            </button>

        </form>

    </div>

</div>

@endsection