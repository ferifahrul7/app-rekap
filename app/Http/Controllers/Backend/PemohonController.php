<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Backend\BackendController as Controller;
use App\Http\Requests\PemohonRequest;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Pemohon as PemohonModel;
use App\Repository\Pemohon;
use Illuminate\Http\Request;
use DataTables;
use App\Models\Provinsi;
use Illuminate\Support\Facades\DB;

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
        return view('backend.pemohon.index', compact('bcrum'));
    }

    public function indexAjax(Request $request)
    {
        if ($request->ajax()) {
            $data = $this->pemohon->getPemohon($request);
            return DataTables::of($data)
                ->setRowId('idx')
                ->addIndexColumn()

                ->addColumn('action', function ($data) {
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
        $provinsi = Provinsi::pluck("nama_prov", "kd_prov")->all();
        $kabupaten = [];
        $kecamatan = [];
        $kelurahan = [];
        return view('backend.pemohon.create', compact('pemohonModel', 'bcrum', 'provinsi','kabupaten','kecamatan','kelurahan'));
    }

    public function store(PemohonRequest $request)
    {
        $input = $request->all();
        $create = PemohonModel::create($input);

        $this->notif('success', 'Pemohon ' . $create->nama . ' berhasil di buat!');

        return redirect()->route('pemohon.index');
    }

    public function edit($id)
    {

        $bcrum = $this->bcrum('Edit', route('pemohon.index'), 'Data Pemohon');

        $pemohonModel = PemohonModel::find($id);

        $provinsi  = Provinsi::pluck("nama_prov", "kd_prov")->toArray();

        $kabupaten = [];
        $kecamatan = [];
        $kelurahan = [];

        if (!is_null($pemohonModel->kd_prov)) {
            $kabupaten = Kabupaten::where('kd_prov', $pemohonModel->kd_prov)
                ->pluck("nama_kab", "kd_kab")->toArray();
        }


        if (!is_null($pemohonModel->kd_kab)) {
            $kecamatan = Kecamatan::where('kd_kab', $pemohonModel->kd_kab)
                ->pluck("nama_kec", "kd_kec")->toArray();
        }

        if (!is_null($pemohonModel->kd_kec)) {
            $kelurahan = Kelurahan::where('kd_kec', $pemohonModel->kd_kec)
                ->pluck("nama_kel", "kd_kel")->toArray();
        }

        return view('backend.pemohon.edit', compact('pemohonModel', 'bcrum', 'provinsi', 'kabupaten', 'kelurahan', 'kecamatan'));
    }

    public function update(PemohonRequest $request, $id)
    {
        $input = $request->all();

        $pemohonData = PemohonModel::find($id);
        $pemohonData->update($input);


        $this->notif('success', 'Pemohon ' . $pemohonData->nama . ' berhasil di ubah!');

        return redirect()->route('pemohon.index');
    }

    public function destroy($id)
    {

        $delete = PemohonModel::findOrFail($id);
        $delete->delete();

        return response()->success(200, 'User ' . $delete->name . ' berhasil dihapus');
    }

    public function destroyAjax(Request $request)
    {
        if ($request->ajax()) {
            DB::beginTransaction();
            try {
                $input = $request->all();
                $delete = PemohonModel::findOrFail($input['idx']);

                $delete->delete();
                DB::commit();
                return response()->success(200, "Data Pemohon berhasil dihapus", ['nama' => $delete->nama]);
            } catch (Exception $e) {
                DB::rollBack();
                return response()->success(201, "Data registrasi gagal dihapus", ['0' => $e->getMessage()]);
            }
        }
    }
}
