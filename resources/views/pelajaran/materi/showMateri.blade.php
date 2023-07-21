@extends('main')
@section('container')
<div class="body w-full bg-slate-200 h-full py-10">
    <div class="post bg-slate-50 w-[80%] h-[100%] mx-auto py-10 px-10 drop-shadow-2xl">
        <h1 class="font-bold text-3xl text-center">{{ $data->judul }}</h1>
        <p class="mt-5">{!! $data->isi !!}</p>
        @role('Guru')
        <a href="{{ url()->previous() }}" class="btn btn-primary absolute bottom-6 z-50"> Back</a>
        @elserole('Siswa')
        <a href="/back/materi/{{ $data->judul }}" class="btn btn-primary absolute bottom-6 z-50"> Back</a>
        @endrole
    </div>
</div>
@endsection
