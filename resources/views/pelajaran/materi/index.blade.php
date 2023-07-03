@extends('main')
@section('container')
<div class="content w-[90%] mx-auto border border-slate-200 my-10 p-5">
    <form action="" method="post">
        <select class="select select-info text-lg w-full max-w-full">
            <option disabled selected>Pilih Pelajaran</option>
            <option>Matematika</option>
            <option>Ipa</option>
            <option>Indonesia</option>
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
@endsection
