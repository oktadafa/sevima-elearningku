@extends('main')
@section('container')
<div class="body w-[90%] m-auto border border-slate-400 rounded-lg mt-5 p-3">
    <h1 class="text-3xl text-center">Daftar Guru</h1>
    <button class="btn btn-active btn-sm btn-primary mt-4 mb-4" onclick="my_modal_4.showModal()" >Guru Baru</button>
    <dialog id="my_modal_4" class="modal">
        <form method="post" action="/guru" class="modal-box w-11/12 max-w-5xl block">
          <h3 class="font-bold text-lg text-center mb-5">Guru Baru</h3>
            @csrf
            <input type="text" placeholder="Masukan Nama Lengkap" class="input border w-full max-w-xs border-slate-800 mb-4" name="nama"/>
            <br>
            <textarea class="textarea textarea-slate mb-4 border border-black" placeholder="Masukan Alamat" name="alamat"></textarea>
            <br>
            <button class="btn btn-active btn-primary" type="submit">Tambah</button>
          <div class="modal-action">
            <!-- if there is a button, it will close the modal -->
            <button class="btn">Close</button>
          </div>
        </form>
      </dialog>
    <div class="table">
    <div class=" overflow-x-auto text-2  border border-slate-400 rounded-lg p-2 ">
        @if(count($guru) == 0)
   <h1 class="text-4xl text-center text-slate-500 my-20">Kosong</h1>
        @else
        <table class="table table-xs table-pin-rows table-pin-cols">
            <thead>
              <tr>
                <th></th>
                <td>Name</td>
                <td>Alamat</td>
                <td>Mata Pelajaran</td>
                <td>Id Guru</td>
                <td>Aksi</td>
                <th></th>
              </tr>
            </thead>
            <tbody>
  @foreach ($guru as $data )
              <tr>
                  <th>{{ $loop->iteration }}</th>
              <td>{{ $data->name }}</td>
                  <td>{{ $data->alamat }}</td>
                  <td>{{ Str::ucfirst($data->mapel)  }}</td>
                  <td>{{ $data->nomor }}</td>
                  <td>
                      <form action="/guru/{{ $data->nomor}}" method="post" >
                          @method('delete')
                          @csrf
                          <button type="submit" onclick="return confirm('anda yakin')">
                              <div class="badge badge-error gap-2">
                              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-4 h-4 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                              Delete
                            </div></button>
                      </form>
                      <a href="/guru/{{ $data->nomor }}/edit">
                  <div class="badge badge-info gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-4 h-4 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                Edit
                  </div>
              </a>
                </td>
                </tr>
              @endforeach

            </tbody>

          </table>
        @endif
      </div>
    </div>
</div>
@endsection

