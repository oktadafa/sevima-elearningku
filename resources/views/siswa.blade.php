@extends('main')
@section('container')
<div class="body w-[90%] m-auto border border-slate-400 rounded-lg mt-5 p-3">
    <h1 class="text-3xl text-center">Daftar Siswa</h1>
    <button class="btn btn-active btn-sm btn-primary mt-4 mb-4" onclick="my_modal_4.showModal()" >Tambah Siswa</button>
    <dialog id="my_modal_4" class="modal">
        <form method="post" action="/siswa" class="modal-box w-11/12 max-w-5xl block">
          <h3 class="font-bold text-lg text-center mb-5">Tambah Siswa</h3>
            @csrf
            <input type="text" placeholder="Masukan Nama Lengkap" class="input border w-full max-w-xs border-slate-800 mb-4" name="name"/>
            <br>
            <textarea class="textarea textarea-slate mb-4" placeholder="Masukan Alamat" name="alamat"></textarea>
            <br>
            <button class="btn btn-active btn-primary" type="submit">Primary</button>
          <div class="modal-action">
            <!-- if there is a button, it will close the modal -->
            <button class="btn">Close</button>
          </div>
        </form>
      </dialog>

    <div class="table">
    <div class=" overflow-x-auto text-2  border border-slate-400 rounded-lg p-2">
        <table class="table table-xs table-pin-rows table-pin-cols">
          <thead>
            <tr>
              <th></th>
              <td>Name</td>
              <td>Alamat</td>
              <td>Kelas</td>
              <td>Id Siswa</td>
              <td>Aksi</td>
              <th></th>
            </tr>
          </thead>
          <tbody>

            @foreach ($siswa as $murid )
            <tr>
                <th>{{ $loop->iteration }}</th>
            <td>{{ $murid->name }}</td>
                <td>{{ $murid->alamat }}</td>
                <td>{{ $murid->kelas }}</td>
                <td>{{ $murid->nomor }}</td>
                <td>
                    <form action="/siswa/{{ $murid->nomor}}" method="post" >
                        @method('delete')
                        @csrf
                        <button type="submit" onclick="return confirm('anda yakin')">
                            <div class="badge badge-error gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-4 h-4 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                            Delete
                          </div></button>
                    </form>
                    <a href="/siswa/edit/{{ $murid->nomor }}">
                <div class="badge badge-info gap-2">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-4 h-4 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
              Edit
                </div>
            </a>
              </td>
              </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <th></th>
              <td>Name</td>
              <td>Job</td>
              <td>company</td>
              <td>location</td>
              <th></th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
</div>
@endsection
