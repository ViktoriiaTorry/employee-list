<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {

        return view('employees-list');
    }

    public function main()
    {

        return view('main');
    }

    public function detailedWithHierarchy()
    {

        return view('detailed-with-hierarchy');
    }

    public static function getAll()
    {
        $employees = Employee::all();

        return $employees;
    }

    public static function getSubordinatesByManagerId($id)
    {
        $subordinates = Employee::getSubordinatesByManagerId($id);

        return $subordinates;
    }
}
