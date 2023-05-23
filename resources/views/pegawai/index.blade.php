@extends('layout.template')
@section('content')
        <!-- START DATA -->
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            
                <!-- FORM PENCARIAN -->
                <div class="pb-3">
                  <form class="d-flex" action="{{url('pegawai')}}" method="get">
                      <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search"

                          
                      @endif>
                      <button class="btn btn-secondary" type="submit">Cari</button>
                  </form>
                </div>
                
                <!-- TOMBOL TAMBAH DATA -->
                <div class="pb-3">
                  <a href='{{url('pegawai/create')}}' class="btn btn-primary">+ Tambah Data</a>
                </div>
          
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="col-md-1">No</th>
                            <th class="col-md-1">Id Pegawai</th>
                            <th class="col-md-3">Nama</th>
                            <th class="col-md-2">Jabatan</th>
                            <th class="col-md-2">Waktu Kerja</th>
                            <th class="col-md-2">Pengetahuan</th>
                            <th class="col-md-3">Ketrampilan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=$data->firstItem() ?>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$item->idpegawai}}</td>
                            <td>{{$item->nama}}</td>
                            <td>{{$item->jabatan}}</td>
                            <td>{{$item->waktukerja}}</td>
                            <td>{{$item->pengetahuan}}</td>
                            <td>{{$item->ketrampilan}}</td>
                            <td>
                                <a href='{{url('pegawai/'.$item->idpegawai.'/edit')}}' class="btn btn-warning btn-sm">Edit</a>
                                <form onsubmit="return confirm('Yakin akan menghapus data?')" class="d-inline" action="{{ url('pegawai/'.$item->idpegawai) }}" method="post">
                                    @csrf
                                    @method('DELETE') 
                                    <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button></form>
                            </td>
                        </tr>
                        <?php $i++?>
                        @endforeach
                    </tbody>
                </table>
                {{$data->links()}}
               
          </div>
          <!-- AKHIR DATA -->
