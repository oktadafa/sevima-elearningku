@extends('main')
@section('container')
<div class="content w-[90%] border border-slate-300 mx-auto mt-5 h-full rounded-xl p-5 ">
    <h1 class="text-center text-2xl">Daftar Materi</h1>
        <br>
        <br>
    <div class="form flex">
        <button class="btn btn-active btn-md btn-success mb-4 z-10" onclick="my_modal_4.showModal()" >Materi Baru</button>
        <div class="form-control w-[50%] mx-auto">
        <select class="cari_mapel select select-ghost w-full border border-slate-500" name="mapel_id">
            <option  selected disabled>Pilih Mapel</option>
        @foreach ($data[1] as $mapel)
            <option value="{{ $mapel->id }}">{{ $mapel->nama_mapel }}</option>
        @endforeach
        </select>
    </div>
    </div>

    <div class="data_bab w-[90%] border border-slate-200 mx-auto">
        @foreach ($data[0] as $dok)
        <a href="/bab/{{ $dok->judul }}">
            <div class="materi w-full p-5 border border-slate-300 hover:bg-slate-200 rounded-lg active:bg-slate-300 mb-3">
                <h1 class="text-xl">  {{ $jenis }} {{ $loop->iteration }} {{ $dok->judul }}</h1>
            </div>
            </a>
        @endforeach
    </div>

</div>
<dialog id="my_modal_4" class="modal">
    <form method="post" class="modal-box w-11/12 max-w-5xl" action="/bab">
        @csrf
      <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
      <h3 class="font-bold text-xl my-5 text-center">Buat Materi Baru</h3>
        <div class="form-control w-full ">
            <label class="label" for="judul">
              <span class="label-text font-semibold">Judul Bab?</span>
            </label>
            <input type="text" id="judul" placeholder="Type here" class="input border border-slate-500 outline-none w-full" name="judul" autocomplete="off"/>
          </div>
          <br>

          <div class="form-control w-full">
            <select class="select select-ghost w-full border border-slate-500" name="mapel_id">
                <option disabled selected>Pilih Mapel</option>
               @foreach ($data[1] as $mapel)
                <option value="{{ $mapel->id }}">{{ $mapel->nama_mapel }}</option>
               @endforeach
              </select>
          </div>
          <br>
          <div class="flex justify-between">
          <div class="form-control w-[45%]">
            <select class="select select-ghost w-full max-w-lg border border-slate-500">
                <option disabled selected>Pilih Tingkat Kelas</option>
                <option>XII</option>
                <option>X</option>
                <option>R</option>
              </select>
            </div>
            <div class="form-control w-[50%]">
              <select class="select select-ghost w-full max-w-lg border border-slate-500">
                  <option disabled selected>Pilih Jurusan</option>
                  <option>Semua Jurusan</option>
                  <option>Teknik Komputer dan Jaringan</option>
                  <option>Teknik Bisnis Sepeda Motor</option>
                </select>
            </div>
        </div>
    <br>
    <br>
        <button type="submit" class="btn btn-primary block w-full">Buat</button>
    </form>
</dialog>
<script>
    const mapel = document.querySelector(".cari_mapel")
    mapel.addEventListener('click', async function(){
        try {
            const dataBab = await fetch("http://localhost:8000/api/bab/" + this.value)
        .then(response => {if (response.ok) {
        return response.json()
        }
        throw new Error(response.statusText)})

        .then(response => {
        if (!response.status) {
            throw new Error(response.message)
        }
        return response.data
        })
        update(dataBab)

        } catch (error) {
           toHtml(error)
        }
    })

function toHtml(response){
const bab = document.querySelector(".data_bab")
let html = `<h1 class="text-center text-slate-400 text-3xl p-5">${response.message}</h1>`
bab.innerHTML = html
}


function update(m){
let html = ``
m.forEach(hasil => html+=card(hasil));
const bab = document.querySelector(".data_bab")
bab.innerHTML = html
}

function card(hasil){
return `<a href="/bab/${hasil.judul}">
        <div class="materi w-full p-5 border border-slate-300 hover:bg-slate-200 rounded-lg active:bg-slate-300 mb-3">
            <h1 class="text-xl">  BAB ${hasil.judul}</h1>
        </div>
        </a>`
}
</script>
@endsection

