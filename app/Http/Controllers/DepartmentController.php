<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::get();
        return view('departments.list',compact('departments'));
    }
    public function store(Request $request)
    {
        Department::create($request->post());
        return redirect()->route('departments.index');
    }
    public function destroy($id)
    {
        Department::find($id)->delete();
        return redirect()->route('departments.index');
    }

}
