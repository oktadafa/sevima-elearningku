@extends('main')
@section('container')
<div class="container mt-10 mx-auto border border-slate-200 p-5 rounded-lg">
<h1 class="text-center text-2xl">Daftar Materi</h1>
<button class="btn btn-active btn-md btn-success mt-4 mb-4" onclick="my_modal_4.showModal()" >Materi Baru</button>
<dialog id="my_modal_4" class="modal">
    <form method="dialog" class="modal-box">
      <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
      <h3 class="font-bold text-lg mt-">Buat Materi Baru</h3>
      <form action="/" method="post">
        @csrf
        <input type="text" placeholder="Type here" class="input input-bordered input-info w-full max-w-xs" />
        <button type="submit" class="btn btn-primary block">Buat</button>
    </form>
    </form>
  </dialog>
<div class=" w-full mx-auto py-10">
    <a href="">
    <div class="materi w-full p-5 border border-slate-300 hover:bg-slate-200 rounded-lg active:bg-slate-300 mb-3">
        <h1 class="text-xl">BAB I Matematika</h1>
    </div>
    </a>

    <a href="">
        <div class="materi w-full p-5 border border-slate-300 hover:bg-slate-200 rounded-lg active:bg-slate-300">
            <h1 class="text-xl">BAB I Matematika</h1>
        </div>
        </a>
</div>
</div>
@endsection
