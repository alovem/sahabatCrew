<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRequest;
use App\Model\Company;
use App\Model\Employee;
use Illuminate\Support\Facades\Log;

class CompanyController extends Controller
{

    public function __construct()
    {
        $this->middleware('demo')->only(['store', 'update', 'destroy']);
    }

    public function index()
    {
        $results = Company::get();
        return view('admin.employee.company.index', ['results' => $results]);
    }

    public function create()
    {
        return view('admin.employee.company.form');
    }

    public function store(CompanyRequest $request)
    {
        $input = $request->all();
        try {
            Company::create($input);
            return ajaxResponse(200, 'Company Successfully saved.');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return ajaxResponse(500, 'Internal Server Error');
        }
    }

    public function edit($id)
    {
        $editModeData = Company::findOrFail($id);
        return view('admin.employee.compnay.form', ['editModeData' => $editModeData]);
    }

    public function update(CompanyRequest $request, $id)
    {
        $company = Company::findOrFail($id);
        $input  = $request->all();
        try {
            $company->update($input);
            return ajaxResponse(200, 'Company Successfully Updated.');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return ajaxResponse(500, 'Internal Server Error');
        }
    }

    public function destroy($id)
    {

        $count = Employee::where('company_id', '=', $id)->count();

        if ($count > 0) {

            return 'hasForeignKey';
        }

        try {
            $company = Company::findOrFail($id);
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
