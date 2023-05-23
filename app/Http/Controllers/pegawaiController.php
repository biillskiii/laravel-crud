<?php

namespace App\Http\Controllers;

use App\Models\pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class pegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 4;
        if(strlen($katakunci)){
            $data = pegawai::where('idpegawai','like',"%$katakunci%")
                    ->orWhere('nama','like',"%$katakunci%")
                    ->paginate($jumlahbaris);
        }
        else{
            $data = pegawai::orderBy('idpegawai','asc')->paginate($jumlahbaris);
        }
        
        return view('pegawai.index')->with('data',$data);
        
    }

    /**
     * Create .
     */
    public function create()
    {
        return view('pegawai.create');
    }

    /**
     * Store untuk menampilkan data.
     */
    public function store(Request $request)
    {
        Session::flash('idpegawai', $request ->idpegawai);
        Session::flash('nama', $request ->nama);
        Session::flash('jabatan', $request ->jabatan);
        Session::flash('waktukerja', $request ->waktukerja);
        Session::flash('pengetahuan', $request ->pengetahuan);
        Session::flash('ketrampilan', $request ->ketrampilan);

        $request->validate([
            'idpegawai' => 'required|numeric|unique:pegawai,idpegawai',
            'nama' => 'required',
            'jabatan' => 'required',
            'waktukerja' => 'required',
            'pengetahuan' => 'required',
            'ketrampilan' => 'required',
        ],[
            'idpegawai.required' => 'ID Pegawai wajib diisi',
            'idpegawai.numeric' => 'ID Pegawai wajib angka',
            'idpegawai.unique' => 'ID Pegawai sudah ada',
            'nama.required' => 'Nama wajib diisi',
            'jabatan.required' => 'Jabatan wajib diisi',
            'waktukerja.required' => 'Waktu Kerja wajib diisi',
            'pengetahuan.required' => 'Pengetahuan wajib diisi',
            'ketrampilan.required' => 'Ketrampilan wajib diisi',
        ]
        
    );
        $data = [
            'idpegawai' => $request-> idpegawai,
            'nama' =>$request->nama,
            'jabatan' =>$request->jabatan,
            'waktukerja' =>$request->waktukerja,
            'pengetahuan' =>$request->pengetahuan,
            'ketrampilan' =>$request->ketrampilan,
        ];
        pegawai::create($data);
        return redirect()->to('pegawai')->with('success', 'Berhasil Menambahkan Data!');
    }

    /**
     * Buat Edit Data
     */
    public function edit(string $idpegawai)
    {
        $data = pegawai::where('idpegawai',$idpegawai)->first();
        return view('pegawai.edit')->with('data',$data);
    }

    /**
     * Buat Update Data
     */
    public function update(Request $request, string $idpegawai)
    {
         $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'waktukerja' => 'required',
            'pengetahuan' => 'required',
            'ketrampilan' => 'required',
        ],[
            'nama.required' => 'Nama wajib diisi',
            'jabatan.required' => 'Jabatan wajib diisi',
            'waktukerja.required' => 'Waktu Kerja wajib diisi',
            'pengetahuan.required' => 'Pengetahuan wajib diisi',
            'ketrampilan.required' => 'Ketrampilan wajib diisi',
        ]
        
    );
        $data = [
            'nama' =>$request->nama,
            'jabatan' =>$request->jabatan,
            'waktukerja' =>$request->waktukerja,
            'pengetahuan' =>$request->pengetahuan,
            'ketrampilan' =>$request->ketrampilan,
        ];
        pegawai::where('idpegawai',$idpegawai)->update($data);
        return redirect()->to('pegawai')->with('success', 'Berhasil Melakukan Update!');
    }

    /**
     * Buat hapus data.
     */
    public function destroy($idpegawai)
    {
        pegawai::where('idpegawai',$idpegawai)->delete();
        return redirect()->to('pegawai')->with('success', 'berhasil menghapus data');
    }
}
