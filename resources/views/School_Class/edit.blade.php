@extends('layouts.app')

@section('title', $title)

@section('content')

<div class="mb-8 border-b border-[#E5E3DB] pb-5">

    <a href="{{ route('classes.index') }}"
       class="mb-3 block text-[11px] uppercase tracking-[0.2em] text-slate-400">
        ← DAFTAR KELAS
    </a>

    <h1 class="font-display text-3xl font-semibold text-[#16213A]">
        Ubah Data Kelas
    </h1>

    <p class="mt-1 text-sm text-slate-500">
        Memperbarui data kelas
        <strong class="text-[#16213A]">{{ $class['name'] }}</strong>.
    </p>

</div>

<div class="border border-[#E5E3DB] bg-white p-6">

    <form action="{{ route('classes.update', ['id' => $class['id']]) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="mb-6">
            <label class="mb-2 block text-[11px] font-semibold uppercase tracking-[0.15em] text-[#16213A]">
                Nama Kelas
            </label>

            <input type="text"
                   name="name"
                   value="{{ $class['name'] }}"
                   class="w-full border border-[#D9D6CD] bg-[#FAF9F5] px-4 py-3 text-sm text-[#16213A] outline-none focus:border-[#16213A]">
        </div>

        <div class="mb-6">
            <label class="mb-2 block text-[11px] font-semibold uppercase tracking-[0.15em] text-[#16213A]">
                Tingkat
            </label>

            <select name="grade"
                    class="w-full border border-[#D9D6CD] bg-[#FAF9F5] px-4 py-3 text-sm text-[#16213A] outline-none focus:border-[#16213A]">

                <option value="X" {{ $class['grade'] == 'X' ? 'selected' : '' }}>
                    X
                </option>

                <option value="XI" {{ $class['grade'] == 'XI' ? 'selected' : '' }}>
                    XI
                </option>

                <option value="XII" {{ $class['grade'] == 'XII' ? 'selected' : '' }}>
                    XII
                </option>

            </select>
        </div>

        <div class="mb-6">
            <label class="mb-2 block text-[11px] font-semibold uppercase tracking-[0.15em] text-[#16213A]">
                Jurusan
            </label>

            <select name="major_id"
                    class="w-full border border-[#D9D6CD] bg-[#FAF9F5] px-4 py-3 text-sm text-[#16213A] outline-none focus:border-[#16213A]">

                @foreach ($majors as $major)

                    <option value="{{ $major['id'] }}"
                        {{ $class['major'] == $major['code'] ? 'selected' : '' }}>
                        {{ $major['code'] }} - {{ $major['name'] }}
                    </option>

                @endforeach

            </select>
        </div>

        <div class="mb-6">
            <label class="mb-2 block text-[11px] font-semibold uppercase tracking-[0.15em] text-[#16213A]">
                Wali Kelas
            </label>

            <select name="teacher_id"
                    class="w-full border border-[#D9D6CD] bg-[#FAF9F5] px-4 py-3 text-sm text-[#16213A] outline-none focus:border-[#16213A]">

                @foreach ($teachers as $teacher)

                    <option value="{{ $teacher['id'] }}"
                        {{ $class['homeroom_teacher'] == $teacher['name'] ? 'selected' : '' }}>
                        {{ $teacher['name'] }}
                    </option>

                @endforeach

            </select>
        </div>

        <div class="flex justify-end gap-5 border-t border-[#E5E3DB] pt-5">

            <a href="{{ route('classes.index') }}"
               class="px-4 py-2.5 text-sm font-medium text-slate-500 hover:text-[#16213A]">
                Batal
            </a>

            <button type="submit"
                    class="bg-[#16213A] px-5 py-2.5 text-sm font-medium text-white transition hover:bg-[#26324f]">
                Perbarui Kelas
            </button>

        </div>

    </form>

</div>

@endsection