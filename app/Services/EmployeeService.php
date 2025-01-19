<?php
namespace App\Services;

use App\Repositories\EmployeeRepository;

class EmployeeService
{
    protected $employeeRepository;

    public function __construct(EmployeeRepository $employeeRepository)
    {
        $this->employeeRepository = $employeeRepository;
    }

    public function index()
    {
        $employees = $this->employeeRepository->index();
        return $employees;
    }

    public function store($data)
    {
        $employee = $this->employeeRepository->store($data);
        return $employee;
    }
    
    public function show($id)
    {
        $employee = $this->employeeRepository->show($id);
        return $employee;
    }
    
    public function update($data, $id)
    {
        $employee = $this->employeeRepository->update($data, $id);
        return $employee;
    }
    
    public function destroy($id)
    {
        $employee = $this->employeeRepository->destroy($id);
        return $employee;
    }    

}
