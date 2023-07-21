@extends('main')
@section('container')
<div class="content w-[90%] mx-auto border border-slate-200 my-10 p-5">
    <form action="" method="post">
        <select class="cari_mapel select select-info text-lg w-full max-w-full">
            <option disabled selected>Pilih Pelajaran</option>
            @foreach ($data[0] as $mapel)
            <option value="{{ $mapel->id }}">{{ $mapel->nama_mapel }}</option>
            @endforeach

          </select>
          <select class="select select-info text-lg w-full max-w-full mt-3">
            <option disabled selected>Pilih Kelas</option>
            <option>XII Teknik Komputer dan Jaringan</option>
            <option>XII AKL</option>
            <option>XII TBSM</option>
          </select>
          <button type="submit" class="btn btn-success-focus"> Cari</button>
        </form>
</div>

<div class="data_bab w-[90%] border border-slate-200 mx-auto mt-10 p-10">
    {{-- <h1 class="text-center text-2xl my-auto">Silahkan Pilih Mata Pelajaran</h1> --}}
    @foreach ($data[1] as $dok)
    <a href="/bab/{{ $dok->judul }}">
        <div class="materi w-full p-5 border border-slate-300 hover:bg-slate-200 rounded-lg active:bg-slate-300 mb-3">
            <h1 class="text-xl"> BAB {{ $loop->iteration }} {{ $dok->judul }}</h1>
        </div>
        </a>
    @endforeach
</div>

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
let html = `<h1 class="text-center text-slate-400 text-3xl">${response.message}</h1>`
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
