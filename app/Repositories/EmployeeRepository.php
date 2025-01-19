<?php
namespace App\Repositories;

use App\Models\Employee;
use App\Models\Contract;
use App\Helpers\Response;
use Illuminate\Support\Facades\DB;

class EmployeeRepository
{
    protected $employee;
    
    public function __construct(Employee $employee, Contract $contract)
    {
        $this->employee = $employee;
        $this->contract = $contract;
    }

    public function index()
    {
        $employee = $this->employee::with('contract')->orderBy('created_at', 'desc')->paginate(10);
        return $employee;
    }
    
    public function store($request)
    {
        try {
            DB::beginTransaction();

            $employee = new Employee();
            $employee->name = $request->name;
            $employee->nik = $request->nik;
            $employee->nohp = $request->nohp;
            $employee->alamat = $request->alamat;
            $employee->save();
            
            $contract = new Contract();
            $contract->employee_id = $employee->id;
            $contract->type_kontrak = $request->type_kontrak;
            $contract->start_date = $request->start_date;
            $contract->end_date = $request->end_date;
            $contract->save();
    
            DB::commit();
            return Response::success($employee, 'Success create data', 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return Response::error('Failed create data', 403);
        }
    }
    
    public function show($id)
    {
        $employee = $this->employee::findOrFail($id);
        return $employee;
    }
    
    public function update($request, $id)
    {
        try {
            $employee = $this->employee::findOrFail($id);
            $employee->name = $request->name;
            $employee->nik = $request->nik;
            $employee->nohp = $request->nohp;
            $employee->alamat = $request->alamat;
            $employee->save();

            $contract = $this->contract::where('employee_id', $employee->id)->first();
        
            if (!$contract) {
                $contract = new Contract();
                $contract->employee_id = $employee->id;
            }

            $contract->type_kontrak = $request->type_kontrak;
            $contract->start_date = $request->start_date;
            $contract->end_date = $request->end_date;
            $contract->save();
            
            return Response::success($employee, 'Success create data', 200);
        } catch (\Exception $e) {
            return Response::error('Failed create data', 403);
        }
    }
    
    public function destroy($id)
    {
        $employee = $this->employee::findOrFail($id);
        
        $contract = $this->contract::where('employee_id', $employee->id)->first();
        if ($contract) {
            $contract->delete();
        }
        
        if($employee->delete()){
            return Response::success('', 'Success delete data', 200);
        }

        return Response::error('Failed delete data', 403);
    }
    
}