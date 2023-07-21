@extends('main')
@section('container')
<div class="container mt-10 mx-auto w-full pb-10">
    <h1 class="text-3xl">Materi Baru</h1>
    <form action="/materi" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-control w-full max-w-xs mt-5">
            <label class="label">
              <span class="label-text">Judul Materi ?</span>
            </label>
            <input type="text" placeholder="Type here" class="input w-full border border-black" name="judul"/>
            <label class="label">
            </label>
          </div>
          <input type="hidden" name="bab_judul" value="{{ $data->judul}}">
          <div class="form-control">
            <label class="label">
              <span class="label-text">Isi Materi ?</span>
            </label>
            <input id="x" type="hidden" name="isi">
            <trix-editor input="x" placeholder="masukan text" class="rounded-xl overflow-scroll h-96"></trix-editor>
            <label class="label">
            </label>
          </div>

        <button type="submit" class="btn btn-success"> Create </button>
    </form>
</div>
@endsection
