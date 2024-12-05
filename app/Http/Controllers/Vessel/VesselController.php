<?php

namespace App\Http\Controllers\Vessel;

use App\Http\Controllers\Controller;
use App\Http\Requests\VesselRequest;
use App\Model\Vessel;
use App\Model\Employee;
use Illuminate\Support\Facades\Log;

class VesselController extends Controller
{

    public function __construct()
    {
        $this->middleware('demo')->only(['store', 'update', 'destroy']);
    }

    public function index()
    {
        $results = Vessel::get();
        return view('admin.vessel.vessel.index', ['results' => $results]);
    }

    public function create()
    {
        return view('admin.vessel.vessel.form');
    }

    public function store(VesselRequest $request)
    {
        $input = $request->all();
        try {
            Vessel::create($input);
            return ajaxResponse(200, 'Vessel Successfully saved.');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return ajaxResponse(500, 'Internal Server Error');
        }
    }

    public function edit($id)
    {
        $editModeData = Vessel::findOrFail($id);
        return view('admin.vessel.vessel.form', ['editModeData' => $editModeData]);
    }

    public function update(VesselRequest $request, $id)
    {
        $vessel = Vessel::findOrFail($id);
        $input  = $request->all();
        try {
            $vessel->update($input);
            return ajaxResponse(200, 'Vessel Successfully Updated.');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return ajaxResponse(500, 'Internal Server Error');
        }
    }

    public function destroy($id)
    {

        // $count = Employee::where('company_id', '=', $id)->count();

        // if ($count > 0) {

        //     return 'hasForeignKey';
        // }

        try {
            $company = Vessel::findOrFail($id);
            $company->delete();
            $bug = 0;
        } catch (\Exception $e) {
            $bug = $e->errorInfo[1];
        }

        if ($bug == 0) {
            echo "success";
        } elseif ($bug == 1451) {
            echo 'hasForeignKey';
        } else {
            echo 'error';
        }
    }

}
