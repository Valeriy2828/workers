<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;

use App\Models\Employe;

use App\Models\Department;

class MainController extends Controller
{
    public function index(Request $request, $department = null){		
		$search = $request->input('search');

        $departments = Department::all();
        $current_department = $department? Department::where('id', $department)->first(): null;
       
        $perPage = $request->input('perPage','100');
               
        if($current_department)
            $worker = $current_department->employes()->paginate($perPage);
        else
            $worker = Employe::paginate($perPage);
        
        return view('index', [
            'worker' => $worker,
            'departments' => $departments,
            'department' => $department,            
            'department' => $department,            
            'filters' => [                
                'perPage' => $perPage,
                'search' => $search
            ]
        ]);                                   
    }
}
