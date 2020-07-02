<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employer;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EmployerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $departments = Department::all();
        $employers = Employer::all();
        return view('employer',compact('departments','employers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'salary' => 'integer',
            'middle_name' => 'nullable',
            'gender' => 'filled',
            'department_id' => 'required|array|min:1',
            'departments.*' => ['distinct',Rule::in(Department::pluck('id'))]
        ]);
        $user = Employer::create($data);
        $user->departments()->attach($data['department_id']);
        return redirect()->back()->with('success','Employer has created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employer  $employer
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Employer $employer)
    {
        return view('employer_single',['employer' => $employer]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employer  $employer
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Employer $employer)
    {


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employer  $employer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employer $employer)
    {
        $data = $request->validate(['name' => 'required']);
        $employer->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employer  $employer
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Employer $employer)
    {
        $employer->delete();
        return redirect()->back()->with('success','employer was deleted');
    }
}
