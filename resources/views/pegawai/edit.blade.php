@extends('layout.template')

 <!-- START FORM -->
 @section('content')

     

 <form action='{{ url('pegawai/'.$data->idpegawai)}}' method='post'>
    @csrf
    @method('PUT')
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <a href="{{url('pegawai')}}"class="btn btn-secondary">Kembali</a>
            <div class="mb-3 row">
                <label for="idpegawai" class="col-sm-2 col-form-label">ID Pegawai</label>
                <div class="col-sm-10">
                    {{$data->idpegawai}}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='nama' value="{{$data->nama}}" id="nama">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='jabatan' value="{{$data->jabatan}}" id="jabatan">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="waktukerja" class="col-sm-2 col-form-label">Waktu Kerja</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='waktukerja' value="{{$data->waktukerja}}" id="waktukerja">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="pengetahuan" class="col-sm-2 col-form-label">Pengetahuan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='pengetahuan' value="{{$data->pengetahuan}}" id="pengetahuan">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="ketrampilan" class="col-sm-2 col-form-label">Ketrampilan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='ketrampilan' value="{{$data->ketrampilan}}" id="ketrampilan">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="jurusan" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
            </div>
            </form>
        </div>
        <!-- AKHIR FORM -->
