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
        //API by EMSIFA
        $response = Http::get('https://emsifa.github.io/api-wilayah-indonesia/api/provinces.json');
        $apiused = "EMSIFA";
        $provinsi = $response->json();
        
        //if API EMSIFA errror, use FARIZDOT
        if($response->status()!=200){
            
            $response2 = Http::get('https://dev.farizdotid.com/api/daerahindonesia/provinsi');
            
            //both API failed
            if ($response2->status()!=200) {
                $apiused = "NONE";
            }
            
            $apiused = "FARIZDOT";
            $response = $response2->json();
            $provinsi = $response['provinsi'];
        }

        
        $inProvinsi = $request->session()->get('inProvinsi');

        $members = Anggota::orderBy('created_at', 'desc')
        ->get();
        $pageName = 'Data Anggota';
        return view('page.data-anggota', compact('apiused','members', 'pageName','provinsi','inProvinsi'));
    }
    
    public function create(Request $request)
    {
        $response = Http::get('https://emsifa.github.io/api-wilayah-indonesia/api/provinces.json');

        if($response->status()==200){
            $responseProvinsi = Http::get('https://emsifa.github.io/api-wilayah-indonesia/api/province/'.$request->provinsi.'.json')->json();
            $responseKota = Http::get('https://emsifa.github.io/api-wilayah-indonesia/api/regency/'.$request->kota.'.json')->json();
            $responseKecamatan = Http::get('https://emsifa.github.io/api-wilayah-indonesia/api/district/'.$request->kecamatan.'.json')->json();
            $responseKelurahan = Http::get('https://emsifa.github.io/api-wilayah-indonesia/api/village/'.$request->kelurahan.'.json')->json();
            $provinsi = $responseProvinsi['name'];
            $kota = $responseKota['name'];
            $kecamatan = $responseKecamatan['name'];
            $kelurahan = $responseKelurahan['name'];
        }
        else{
            
            $response2 = Http::get('https://dev.farizdotid.com/api/daerahindonesia/provinsi');
            
            if ($response2->status()==200) {
                $responseProvinsi = Http::get('https://dev.farizdotid.com/api/daerahindonesia/provinsi/'.$request->provinsi)->json();
                $responseKota = Http::get('https://dev.farizdotid.com/api/daerahindonesia/kota/'.$request->kota)->json();
                $responseKecamatan = Http::get('https://dev.farizdotid.com/api/daerahindonesia/kecamatan/'.$request->kecamatan)->json();
                $responseKelurahan = Http::get('https://dev.farizdotid.com/api/daerahindonesia/kelurahan/'.$request->kelurahan)->json();
                $provinsi = $responseProvinsi['nama'];
                $kota = $responseKota['nama'];
                $kecamatan = $responseKecamatan['nama'];
                $kelurahan = $responseKelurahan['nama'];
            }
            else{
                return "Data API Sedang Error !";
            }
        }

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
        $response = Http::get('https://emsifa.github.io/api-wilayah-indonesia/api/provinces.json');

        if($response->status()==200){
            $responseProvinsi = Http::get('https://emsifa.github.io/api-wilayah-indonesia/api/province/'.$request->provinsi.'.json')->json();
            $responseKota = Http::get('https://emsifa.github.io/api-wilayah-indonesia/api/regency/'.$request->kota.'.json')->json();
            $responseKecamatan = Http::get('https://emsifa.github.io/api-wilayah-indonesia/api/district/'.$request->kecamatan.'.json')->json();
            $responseKelurahan = Http::get('https://emsifa.github.io/api-wilayah-indonesia/api/village/'.$request->kelurahan.'.json')->json();
            $provinsi = $responseProvinsi['name'];
            $kota = $responseKota['name'];
            $kecamatan = $responseKecamatan['name'];
            $kelurahan = $responseKelurahan['name'];
        }

        else{

            $response2 = Http::get('https://dev.farizdotid.com/api/daerahindonesia/provinsi');
            
            if ($response2->status()==200) {
                $responseProvinsi = Http::get('https://dev.farizdotid.com/api/daerahindonesia/provinsi/'.$request->provinsi)->json();
                $responseKota = Http::get('https://dev.farizdotid.com/api/daerahindonesia/kota/'.$request->kota)->json();
                $responseKecamatan = Http::get('https://dev.farizdotid.com/api/daerahindonesia/kecamatan/'.$request->kecamatan)->json();
                $responseKelurahan = Http::get('https://dev.farizdotid.com/api/daerahindonesia/kelurahan/'.$request->kelurahan)->json();
                $provinsi = $responseProvinsi['nama'];
                $kota = $responseKota['nama'];
                $kecamatan = $responseKecamatan['nama'];
                $kelurahan = $responseKelurahan['nama'];
            }
            else{
                return "Data API Sedang Error !";
            }
        }
        
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
        $response = Http::get('https://emsifa.github.io/api-wilayah-indonesia/api/regencies/'.$id.'.json');
        $kota = $response->json();

        return $kota;
    }
    public function kecamatan(Request $request, $id){
        $response = Http::get('https://emsifa.github.io/api-wilayah-indonesia/api/districts/'.$id.'.json');
        $kecamatan = $response->json();

        return $kecamatan;
    }
    public function kelurahan(Request $request, $id){
       
        $response = Http::get('https://emsifa.github.io/api-wilayah-indonesia/api/villages/'.$id.'.json');
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
