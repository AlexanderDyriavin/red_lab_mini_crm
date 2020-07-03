<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employer;
use App\User;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $departments = Department::all();
        $count = Department::withCount('employers')->get();
        $max = Employer::with('departments')->max('salary');
        return view('department', ['departments' => $count]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $name = $request->validate(['name' => 'required']);
        Department::create($name);
        return redirect()->back()->with('success', 'department was created');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Department $department
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Department $department)
    {

        return view('department_single', ['department' => $department]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Department $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Department $department
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Department $department)
    {
        $name = $request->validate(['name' => 'required']);
        $department->update($name);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Department $department
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Department $department)
    {
        if ($department->employers()->exists()){
            return redirect()->back()->with('error','this department has employers, you cant delete it ');
        }
        $department->delete();
        return redirect('/department')->with('success', 'department was deleted');
    }

    public function sheet()
    {
        $employers = Employer::with('departments')->get();
        $departments = Department::all();
        return view('welcome',
            ['employers' => $employers,
                'departments' => $departments]);
    }
}
