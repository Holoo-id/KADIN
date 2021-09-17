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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $response = Http::get('https://dev.farizdotid.com/api/daerahindonesia/provinsi');
       
        $provinsi = $response->json();
       
        $inProvinsi = $request->session()->get('inProvinsi');

        $members = Anggota::orderBy('created_at', 'desc')
        ->paginate(10);
        $pageName = 'Data Anggota';
        return view('page.data-anggota', compact('members', 'pageName','provinsi','inProvinsi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
    $tambahDetailAlamat = Alamat::create([
        'lattitude' => $request->lattitude,
        'longitude' => $request->longitude,
        'kelurahan_desa' => $request->kelurahan,
        'kecamatan' => $request->kecamatan,
        'kabupaten_kota' => $request->kota,
        'provinsi' => $request->in_provinsi,
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
        $pdf = PDF::loadview('page.anggota-pdf',compact('anggota'));
        return $pdf->download('laporan-anggota-pdf.pdf');
    }
    public function anggotaExcel(){
        return Excel::download(new AnggotaExport, 'anggota.xlsx');
    }
    
}
