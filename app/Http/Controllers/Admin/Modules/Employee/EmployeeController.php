<?php

namespace App\Http\Controllers\Admin\Modules\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Employee;
use DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['emplist'] = Employee::orderby('created_at','DESC')->get();

        return view('admin.employees.manage_employe')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['companylist'] = Company::orderby('created_at','DESC')->get();
         // dd($data);
        return view('admin.employees.add_employees_from')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,["first_name"=>"required",                                
                                "last_name"=>"required",
                                "company_id"=>"required",
                                "phone_no" =>  "required|string|max:10|min:10",
                                "pan_no" =>  "required|string|max:10|min:10",
                                "email" =>  "required|string|email|max:100",
                                  ],
                                ["first_name.required"=>"Enter First Name ***",                                   
                                  "last_name.required"=>"Enter Last Name ***",
                                  "company_id.required"=>"Select Company ***",
                                  "pan_no.required"=>"Select Company ***",
                                  "pan_no.max"=>"Enter 10 characters PAN No ***",
                                  "pan_no.min"=>"Enter 10 characters PAN No ***",
                                ]);
        $input['first_name'] = $request->first_name;
        $input['last_name'] = $request->last_name;
        $input['email'] = $request->email;
        $input['phone_no'] = $request->phone_no;
        $input['pan_no'] = $request->pan_no;
        $input['company_id'] = $request->company_id;

        if(@$request->emp_id)
        {
            Employee::where('id',$request->emp_id)->update($input);
            return redirect()->back()->with('success','Employee data updated successfully.');
        }

        $companydata = Employee::create($input);

        return redirect()->back()->with('success', 'Employee is added successfully.'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 

        $data['getemp'] = DB::table('employees')->where('id', '=', $id)->first();
        $data['companylist'] = Company::orderby('created_at','DESC')->get();
         
        return view('admin.employees.add_employees_from')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $removeemp= Employee::find($id);

        if(!is_null($removeemp))
          {
             
            $removeemp->delete();
          } 
        return redirect()->route('manage.employee')->with('success','Employee is removed successfully'); 
    }
}
