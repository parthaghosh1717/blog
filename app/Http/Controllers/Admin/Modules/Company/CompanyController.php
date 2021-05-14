<?php

namespace App\Http\Controllers\Admin\Modules\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use File; 
use Storage;

class CompanyController extends Controller
{
    /**
     * Display a listing of the company resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['companylist'] = Company::orderby('created_at','DESC')->get();
         
        return view('admin.company.manage_company')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         
        return view('admin.company.add_company_from');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,["company_name"=>"required",                                 
                                "email" =>  "required|string|email|max:100",
                                'logo' => 'mimes:jpeg,jpg,png|max:10000|dimensions:min_width=100,min_height=100',
                                'company_website' =>  'required|url',
                                  ],
                                ["company_name.required"=>"Enter Company Name ***",                                  
                                'logo.mimes'=>'Logo must be JPEG/JPG/ or PNG type.',
                                'logo.dimensions'=>'Logo minimum 100px X 100px needed.',
                                'company_website.url'=>'Enter a valide website. - Eg - https://www.bizzmanweb.com/',
                                ]);

        $updatecompany = Company::find($request->company_id);
          

        $input['company_name'] = $request->company_name;
        $input['email'] = $request->email;
        $input['website'] = $request->company_website;

        if(@$request->hasFile('logo')){ 

            @unlink(storage_path('app/public/images/companylogo/'.$updatecompany->logo));  

            $logo = $request->logo;
            $filename = time().'-'.rand(1000,9999).'.'.$logo->getClientOriginalExtension();
            Storage::putFileAs('public/images/companylogo/', $logo, $filename);
           
          $input['logo'] =  $filename;
        }

        if (@$request->company_id) 
        {

            Company::where('id',$request->company_id)->update($input);
            return redirect()->back()->with('success','Company updated successfully.');
        }

        $companydata = Company::create($input);

        return redirect()->route('add.company')->with('success', 'Company is added successfully.');            
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
         
        $data['getcompany'] = Company::find($id);
         
        return view('admin.company.add_company_from')->with($data);
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
        // dd($id);
        $removecpmpany = Company::find($id);

        if(!is_null($removecpmpany))
          {
            @unlink(storage_path('app/public/images/companylogo/'.$removecpmpany->logo));
            $removecpmpany->delete();
          } 
        return redirect()->route('manage.company')->with('success','Compant is removed successfully');  
    }
}
