<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\DepartmentRequest;
use App\Model\Department;
use App\Model\Company;
use App\Model\Branch;
use App\Model\Employee;
use Illuminate\Support\Facades\Log;

class DepartmentController extends Controller
{

    public function __construct()
    {
        $this->middleware('demo')->only(['store', 'update', 'destroy']);
    }

    public function index()
    {
        $results = Department::get();
        return view('admin.employee.department.index', ['results' => $results]);
    }

    public function create()
    {
		 $branchList         = Branch::get();
		 $companyList        = Company::get();
		 $data = [
           
            'branchList'         => $branchList,
			'companyList'        => $companyList,
            
        ];
        return view('admin.employee.department.form',$data);
    }

    public function store(DepartmentRequest $request)
    {
        $input = $request->all();
        try {
            Department::create($input);
            return ajaxResponse(200, 'Department Successfully saved.');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return ajaxResponse(500, 'Internal Server Error');
        }

    }

    public function edit($id)

    {
		$branchList         = Branch::get();
		$companyList        = Company::get();
		$data = [
           
            'branchList'         => $branchList,
			'companyList'        => $companyList,
            
        ];
		
        $editModeData = Department::findOrFail($id);
        return view('admin.employee.department.form', ['editModeData' => $editModeData,'companyList' => $companyList]);
    }

    public function update(DepartmentRequest $request, $id)
    {
        $department = Department::findOrFail($id);
        $input      = $request->all();
        try {
            $department->update($input);
            return ajaxResponse(200, 'Department Successfully Updated.');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return ajaxResponse(500, 'Internal Server Error');
        }

    }

    public function destroy($id)
    {

        $count = Employee::where('department_id', '=', $id)->count();

        if ($count > 0) {

            return 'hasForeignKey';
        }

        try {
            $department = Department::FindOrFail($id);
            $department->delete();
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
