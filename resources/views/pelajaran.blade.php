@extends('main')
@section('container')
<div class="container  mx-auto my-10 border border-slate-300 p-10">
    <h1 class="text-3xl mx-10">Daftar Mapel</h1>
    <button class="btn btn-active btn-md btn-error mt-4 mb-4" onclick="my_modal_4.showModal()" >Mapel Baru</button>
    <dialog id="my_modal_4" class="modal">
        <form method="post" action="/pelajaran" class="modal-box w-11/12 max-w-5xl block">
          <h3 class="font-bold text-lg text-center mb-5">Mapel baru</h3>
            @csrf
            <input type="text" placeholder="Masukan Mapel baru" class="input border w-full max-w-xs border-slate-800 mb-4" name="nama_mapel"/>
            <br>
            <button class="btn btn-active btn-primary" type="submit">Tambah</button>
          <div class="modal-action">

            <!-- if there is a button, it will close the modal -->
            <button class="btn">Close</button>
          </div>
        </form>
      </dialog>
    <div class="overflow-x-auto w-[90%] mx-auto ">
        <table class="table table-zebra">
          <!-- head -->
          <thead class=" bg-green-700 text-white">
            <tr>
              <th></th>
              <th>Name</th>
              <th>Kelas</th>
              <th>Guru</th>
            </tr>
          </thead>
          <tbody>
            <!-- row 1 -->
            <form>
                @csrf
            @foreach ($data as $mapel)
            <tr>
                <label for="id">
                <th>
                    <input type="checkbox" name="id" id="id" value="{{ $mapel->id }}">
                    {{ $loop->iteration }}</th>
                </label>
                <td>
                    {{ $mapel->nama_mapel }}</td>
                    <td>XII TKj</td>
                    <td>Widi Rahayu</td>
                </tr>
            @endforeach
            </form>
            <!-- row 2 -->
          </tbody>
        </table>
      </div>
</div>
@endsection
