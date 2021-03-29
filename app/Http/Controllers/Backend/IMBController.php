<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Backend\BackendController as Controller;
use App\Repository\IMB;
use App\Models\IMB as IMBModel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class IMBController extends Controller
{
    protected $imb;

    public function __construct()
    {
        $this->imb = new IMB;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bcrum = $this->bcrum('IMB');
        
        return view('backend.imb.index',compact('bcrum'));
    }

    public function indexAjax(Request $request)
    {
        if ($request->ajax()) {
            $data = $this->imb->getIMB($request);
            return DataTables::of($data)
                ->setRowId('idx')
                ->addIndexColumn()
                // ->addColumn('')
                ->addColumn('action', function ($data) {
                    return view('datatables._action-imb', [
                        'idx' => $data->id,
                        'name' => $data->nama,
                        'edit_url' => route('pemohon.edit', $data->id)
                    ]);
                })
                ->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

    public function destroyAjax(Request $request)
    {
        if ($request->ajax()) {
            DB::beginTransaction();
            try {
                $input = $request->all();
                $delete = IMBModel::findOrFail($input['idx']);

                $delete->delete();
                DB::commit();
                return response()->success(200, "Data IMB berhasil dihapus", ['nama' => $delete->nama]);
            } catch (Exception $e) {
                DB::rollBack();
                return response()->success(201, "Data IMB gagal dihapus", ['0' => $e->getMessage()]);
            }
        }
    }
}
