<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Backend\BackendController as Controller;
use App\Http\Requests\PemohonRequest;
use App\Models\Pemohon as PemohonModel;
use App\Repository\Pemohon;
use Illuminate\Http\Request;
use DataTables;

class PemohonController extends Controller
{

    protected $pemohon;

    public function __construct()
    {
        $this->pemohon  = new Pemohon;
    }
    public function index()
    {
        $bcrum = $this->bcrum('Pemohon');
        return view('backend.pemohon.index',compact('bcrum'));
    }

    public function indexAjax(Request $request)
    {
        if ($request->ajax()) {
            $data = $this->pemohon->getPemohon($request);
            return DataTables::of($data)
                ->setRowId('idx')
                ->addIndexColumn()
                
                ->addColumn('action', function($data) {
                    return view('datatables._action-pemohon', [
                        'idx' => $data->id,
                        'name' => $data->nama,
                        'edit_url' => route('pemohon.edit', $data->id)
                    ]);
                })
                ->make(true);
        }
    }

    public function create()
    {
        $pemohonModel = new PemohonModel();
        $bcrum = $this->bcrum('Create', route('pemohon.index'), 'Data Pemohon');
        return view('backend.pemohon.create', compact('pemohonModel', 'bcrum'));
    }

    public function store(PemohonRequest $request)
    {
        $input = $request->all();
        $create = PemohonModel::create($input);

        $this->notif('success', 'Pemohon ' . $create->nama . ' berhasil di buat!');

        return redirect()->route('pemohon.index');
    }
}
