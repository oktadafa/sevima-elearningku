@extends('main')
@section('container')
<div class="container mt-10 mx-auto border border-slate-200 p-5 rounded-lg">
    <h1 class="text-center text-2xl">Daftar Materi</h1>
    @role('Guru')


    <div class="sevtion w-full flex justify-between mt-5">
    <a href="/materi/create/{{ $data[1]->judul }}">
        <button class="btn btn-active btn-md btn-success mb-4" >Pelajaran Baru</button>
    </a>
   <form action="" method="post">
    <button class="btn btn-error ">Hapus</button>
</div>
@endrole
    <i data-feather="circle"></i>
    <div class=" w-full mx-auto py-10">
        @foreach ($data[0] as $dok)

        <div class="boxz flex">
            @role('Guru')
            <div class="form-control my-auto mx-5">
                <input type="checkbox" name="id" id="id" class="checkbox-sm">
            </div>
            @endrole
                <a href="/materi/{{ $dok->judul }}" class="w-full">
            <div class="materi w-full p-5 border border-slate-300 hover:bg-slate-200 rounded-lg active:bg-slate-300 mb-3 ">
                <h1 class="text-xl mb-2"> Materi {{ $loop->iteration }} {{ $dok->judul }}</h1>
                        <span class="text-sm text-slate-500">   <span class="material-symbols-outlined">
                            person
                            </span>
                            {{Str::upper($dok->guru->name) }}</span>
                    <span class='float-right'><p class="text-slate-500 text-md">Create at {{ $dok->created_at->diffForHumans() }}</p>
                    </span>
            </div>
            </a>
        </div>
        @endforeach
        @role('Guru')
    </form>
    @endrole
    </div>
</div>
@endsection

