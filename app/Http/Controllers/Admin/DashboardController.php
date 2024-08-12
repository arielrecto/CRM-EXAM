<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {

        $totalCompany = Company::count();
        $totalEmployee = Employee::count();

        return view('user.dashboard', compact(['totalCompany', 'totalEmployee']));
    }
}
