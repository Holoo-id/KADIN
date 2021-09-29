<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Alamat;
use App\Exports\AnggotaExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
Use PDF;
use Maatwebsite\Excel\Facades\Excel;

class DataAnggotaController extends Controller
{
    public function index(Request $request)
    {
        $response = Http::get('https://dev.farizdotid.com/api/daerahindonesia/provinsi');
       
        $provinsi = $response->json();
       
        $inProvinsi = $request->session()->get('inProvinsi');

        $members = Anggota::orderBy('created_at', 'desc')
        ->get();
        $pageName = 'Data Anggota';
        return view('page.data-anggota', compact('members', 'pageName','provinsi','inProvinsi'));
    }
    
    public function create(Request $request)
    {
        $responseProvinsi = Http::get('https://dev.farizdotid.com/api/daerahindonesia/provinsi/'.$request->provinsi)->json();
        $responseKota = Http::get('https://dev.farizdotid.com/api/daerahindonesia/kota/'.$request->kota)->json();
        $responseKecamatan = Http::get('https://dev.farizdotid.com/api/daerahindonesia/kecamatan/'.$request->kecamatan)->json();
        $responseKelurahan = Http::get('https://dev.farizdotid.com/api/daerahindonesia/kelurahan/'.$request->kelurahan)->json();
        $provinsi = $responseProvinsi['nama'];
        $kota = $responseKota['nama'];
        $kecamatan = $responseKecamatan['nama'];
        $kelurahan = $responseKelurahan['nama'];

        $tambahDetailAlamat = Alamat::create([
            'lokasi' => $request->lokasi,
            'kelurahan_desa' => $kelurahan,
            'kecamatan' => $kecamatan,
            'kabupaten_kota' => $kota,
            'provinsi' => $provinsi,
        ]);
        
        $tambahDataAnggota = Anggota::create([
            'Nama' => $request->nama,
            'NIK' => $request->nik,
            'tgl_lahir' => $request->tgl_lahir,
            'no_HP' => $request->phone,
            'no_WA' => $request->wa,
            'alamat' => $request->alamat,
            'id_alamat' => $tambahDetailAlamat->id,
            'jenis_usaha' => $request->jenis_usaha,
            'produk' => $request->produk,
            'jumlah_karyawan' => $request->jumlah_karyawan,
        ]);
        
        return redirect('/data-anggota');
    }

    public function show($id)
    {
        $pageName = 'Detail';
        $member = Anggota::where('id', $id)->first();
        return view('page.detail-anggota', compact('member', 'pageName'));
    }
    
    public function update(Request $request)
    {
        $responseProvinsi = Http::get('https://dev.farizdotid.com/api/daerahindonesia/provinsi/'.$request->edit_provinsi)->json();
        $responseKota = Http::get('https://dev.farizdotid.com/api/daerahindonesia/kota/'.$request->edit_kota)->json();
        $responseKecamatan = Http::get('https://dev.farizdotid.com/api/daerahindonesia/kecamatan/'.$request->edit_kecamatan)->json();
        $responseKelurahan = Http::get('https://dev.farizdotid.com/api/daerahindonesia/kelurahan/'.$request->edit_kelurahan)->json();
        $provinsi = $responseProvinsi['nama'];
        $kota = $responseKota['nama'];
        $kecamatan = $responseKecamatan['nama'];
        $kelurahan = $responseKelurahan['nama'];

        dd($provinsi + $kota + $kecamatan + $kelurahan);

        $editDataAnggota = Anggota::where('id',$request->id)->update([
            'Nama' => $request->nama,
            'NIK' => $request->nik,
            'tgl_lahir' => $request->tgl_lahir,
            'no_HP' => $request->phone,
            'no_WA' => $request->wa,
            'alamat' => $request->alamat,
            'id_alamat' => $request->id_alamat,
            'jenis_usaha' => $request->jenis_usaha,
            'produk' => $request->produk,
            'jumlah_karyawan' => $request->jumlah_karyawan,
        ]);
        
        $editDetailAlamat = Alamat::where('id',$request->id_alamat)->update([
            'lokasi' => $request->lokasi,
            'kelurahan_desa' => $kelurahan,
            'kecamatan' => $kecamatan,
            'kabupaten_kota' => $kota,
            'provinsi' => $provinsi,
        ]);
 
        return redirect('/data-anggota');
    }

    public function destroy(Request $request)
    {
        $hapusAnggota = Anggota::where('id',$request->id);
        $hapusAnggota->delete();
        $hapusAnggota = Alamat::where('id',$request->id_alamat);
        $hapusAnggota->delete();

        return redirect('/data-anggota');
    
    }
    public function kota(Request $request, $id){
        $responseKota = Http::get('https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi='.$id);
        $kota = $responseKota->json();

        return $kota;
    }
    public function kecamatan(Request $request, $id){
        $response = Http::get('https://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota='.$id);
        $kecamatan = $response->json();

        return $kecamatan;
    }
    public function kelurahan(Request $request, $id){
       
        $response = Http::get('https://dev.farizdotid.com/api/daerahindonesia/kelurahan?id_kecamatan='.$id);
        $kelurahan = $response->json();

        return $kelurahan;
    }
    public function anggotaPDF(){
        $anggota = Anggota::all();
        $pdf = PDF::loadview('page.anggota-pdf',compact('anggota'))
        ->setPaper('a4', 'landscape')
        ->setOptions(['defaultFont' => 'Montserrat'])
        ->stream('data-anggota.pdf');
        return $pdf;
    }
    public function anggotaExcel(){
        return Excel::download(new AnggotaExport, 'anggota.xlsx');
    }
    
}
