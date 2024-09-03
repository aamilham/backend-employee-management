<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        return Employee::all();
    }

    public function read($id)
    {
        return Employee::find($id);
    }

    public function store(Request $request)
    {
        $employee = Employee::create($request->all());
        return response()->json($employee, 201);
    }

    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);
        $employee->update($request->all());
        return response()->json($employee, 200);
    }

    public function delete($id)
    {
        Employee::findOrFail($id)->delete();
        return response()->json(null, 204);
    }

    public function listBySalary()
    {
        return Employee::orderBy('salary', 'desc')->get();
    }
}
