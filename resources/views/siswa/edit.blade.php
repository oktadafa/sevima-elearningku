@extends('main')
@section('container')
<div class="container mt-3">
    <h1 class="text-center text-3xl font-medium">Edit Siswa</h1>
    <div class="form ml-3">
        <form action="/siswa/{{ $siswa->nomor }}" method="post">
            @method('patch')
            @csrf
            <div class="form-control w-full max-w-xs">
                <label class="label" for="nama">
                  <span class="label-text font-medium">Masukan Nama</span>
                </label>
                <input type="text" placeholder="Type here" class="input w-full max-w-x border border-slate-400" name="name" id="nama" value="{{ $siswa->name }}"/>
              </div>
              <div class="form-control w-full max-w-xs">
                <label class="label" for="alamat">
                  <span class="label-text font-medium">Masukan Alamat</span>
                </label>
                <input type="text" placeholder="Type here" class="input w-full max-w-x border border-slate-400" name="alamat" id="alamat" value="{{ $siswa->alamat }}"/>
              </div>

              <button type="submit" class="btn btn-primary mt-5">Update</button>
        </form>
    </div>
</div>

@endsection
