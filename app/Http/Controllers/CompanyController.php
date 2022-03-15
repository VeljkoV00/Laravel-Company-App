<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::all();
        return view('company.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
            'name' => 'required',
            'email' => 'required',
            'website' => 'required',
            'logo' => 'required | image'
        ]); 


        $imagePath = 'storage/' .  $request->file('logo')->store('postImages' ,'public');
        $name = $request->input('name');
        $website = $request->input('website');
        $email = $request->input('email');

        $company = new Company();
        $company->name = $name;
        $company->website = $website;
        $company->email = $email;
        $company->logo = $imagePath;
        $company->save();
        return redirect()->route('companies.index')->with('success', 'Company created succesffuly');
        

      
      

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
    public function edit(Company $company)
    {

        return view('company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'website' => 'required',
            'logo' => 'required | image'
        ]); 


        $imagePath = 'storage/' .  $request->file('logo')->store('postImages' ,'public');
        $name = $request->input('name');
        $website = $request->input('website');
        $email = $request->input('email');

        $company->name = $name;
        $company->website = $website;
        $company->email = $email;
        $company->logo = $imagePath;
        $company->save();
        return redirect()->route('companies.index')->with('success', 'Company updated succesffuly');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        
        $company->delete();

        return redirect()->route('companies.index')->with('success', 'Company Deleted Succesfully');
    }
}
