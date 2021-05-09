<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

use App\Exports\BarangExport;
use Maatwebsite\Excel\Facades\Excel;
use DataTables;
class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd($dataBarang->render('barang.index'));
        // $barang = Barang::select()->get();
        if (request()->ajax()) {
            $data = Barang::select()->get();
            // dd($data);
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action','barang.barang-action')
                ->addColumn('img', function($row){
                    $foto = '<img src="/img/barang/'.$row->foto.'" width="200">';
                    return $foto;
                })
                ->rawColumns(['action','img'])
                ->make(true);
        }
        return view('barang.index');
    
    }

    public function exportExcel(){
        return Excel::download(new BarangExport, 'Data_Barang.xlsx');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kode_barang = Barang::pluck('id_barang')->last();
        if($kode_barang == null){
            $new_kode = "B01";
        }else{
            $new_kode = substr($kode_barang,-2);
            $new_kode += 1;
            if($new_kode <=9){
                $new_kode = sprintf("B%02d", $new_kode);
            }else{
                $new_kode="B".$new_kode;
            }
        }
        
        
        // dd($new_kode);
        return view('barang.form',["kode"=>$new_kode]);
    }

    public function uploadImage($filenya){
        $file = $filenya;
        $nama_file = time()."_".$file->getClientOriginalName();
        
      	// isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'img/barang';
		$file->move($tujuan_upload,$nama_file);
        return $nama_file;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => ' :attribute barang tidak boleh kosong.',
        ];
        
        // $validator = Validator::make($input, $rules, $messages);
        $request->validate([
            'kode' => 'required',
            'nama' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'foto' => 'required|file|image|mimes:jpeg,png,jpg|max:1024',
        ],$messages);
       
        // dd($request->all());
        $nama_file = $this->uploadImage($request->file('foto'));
        $barang = Barang::create([
            "id_barang" => $request->kode,
            "nama_barang" => $request->nama,
            "harga" =>  $request->harga,
            "stok"=>$request->stok,
            "foto"=>$nama_file
        ]);

        return redirect()->route("barang.create")->with('pesan','Berhasil Menambahkan Data Barang');
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
        $data = Barang::find($id);
        // dd($data);
        return view("barang/update",["data"=>$data]);
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
        $request->validate([
            'kode' => 'required',
            'nama' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'foto' => 'file|image|mimes:jpeg,png,jpg|max:1024',
        ]);
        $barang = Barang::find($id);
        $nama_file =$barang->foto;
        if($request->file('foto') != null){
            $nama_file = $this->uploadImage($request->file('foto'));
        }
        $barang->id_barang = $request->kode;
        $barang->nama_barang = $request->nama;
        $barang->harga =  $request->harga;
        $barang->stok=$request->stok;
        $barang->foto = $nama_file;
        $barang->save();
        return redirect()->route('barang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang = Barang::where('id_barang',$id)->delete();
  
        return redirect()->route('barang.index')
                        ->with('pesan','Data Berhasil Di Hapus');
    }
}
