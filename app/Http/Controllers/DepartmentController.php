<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentController extends Controller
{
    public function index()
    {
        return Department::all()->toArray();
    }

    public function show($id)
    {
        $department = Department::find($id);
        return response()->json($department);
    }
}
