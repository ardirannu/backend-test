<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\EmployeeService;
use App\Http\Requests\EmployeeValidation;
use Exception;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    protected $employeeService;

    public function __construct(EmployeeService $employeeService)
    {
        $this->employeeService = $employeeService;
    }

    public function index()
    {
        $employees = $this->employeeService->index();
        return $employees;
    }

    public function store(EmployeeValidation $data)
    {
        $employee = $this->employeeService->store($data);
        return $employee;
    }
    
    public function show($id)
    {
        $employee = $this->employeeService->show($id);
        return $employee;
    }
    
    public function update(EmployeeValidation $data, $id)
    {
        $employee = $this->employeeService->update($data, $id);
        return $employee;
    }
    
    public function destroy($id)
    {
        $employee = $this->employeeService->destroy($id);
        return $employee;
    }    

}
