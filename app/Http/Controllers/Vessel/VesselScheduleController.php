<?php

namespace App\Http\Controllers\Vessel;

use App\Http\Controllers\Controller;
use App\Http\Requests\VesselScheduleRequest;
use App\Model\VesselSchedule;
use App\Model\Employee;
use Illuminate\Support\Facades\Log;

class VesselScheduleController extends Controller
{

    public function __construct()
    {
        $this->middleware('demo')->only(['store', 'update', 'destroy']);
    }

    public function index()
    {
        $results = VesselSchedule::get();
        return view('admin.vessel.vesselSchedule.index', ['results' => $results]);
    }

    public function create()
    {
        return view('admin.vessel.vesselSchedule.form');
    }

    public function store(VesselScheduleRequest $request)
    {
        $input = $request->all();
        try {
            VesselSchedule::create($input);
            return ajaxResponse(200, 'Vessel Schedule Successfully saved.');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return ajaxResponse(500, 'Internal Server Error');
        }
    }

    public function edit($id)
    {
        $editModeData = VesselSchedule::findOrFail($id);
        return view('admin.vessel.vesselSchedule.form', ['editModeData' => $editModeData]);
    }

    public function update(VesselScheduleRequest $request, $id)
    {
        $vessel = VesselSchedule::findOrFail($id);
        $input  = $request->all();
        try {
            $vessel->update($input);
            return ajaxResponse(200, 'Vessel Schedule Successfully Updated.');
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
            $company = VesselSchedule::findOrFail($id);
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
