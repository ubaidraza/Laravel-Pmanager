<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Auth;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(Auth::user()->role_id==1){
            $companies = Company::paginate(10);
        }else{
            $companies = Company::all()->where('user_id',Auth::user()->id);
           // return $companies;
        }
        return view('companies.index',compact('companies'));
      
       
    }


    public function create()
    {
        return view('companies.create');
    }

    public function store(Request $request)
    {
        $company = Company::create([
            'name'=> $request->input('name'),
            'description' => $request->input('description'),
            'user_id' => Auth::user()->id
        ]);

        if($company){
            return redirect('/companies')->with('msg','Company created successfull');
        }
        else{
             return redirect('/companies')->with('msg','No company created try again');
        }
    }

    public function show(Company $company)
    {
        $company = Company::findOrFail($company->id);
        return view('companies.show',compact('company'));
    }

    public function edit(Company $company)
    {
        $company = Company::find($company->id);
        return view('companies.edit',compact('company'));
    }


    public function update(Request $request, Company $company)
    {
        // $company = Company::update([
        //     'name' => $request->input('name'),
        //     'description' => $request->input('description')
        // ]);
        $company = Company::find($company->id);
        $company->name = $request->name;
        $company->description = $request->description;
        $company->update();
        if($company){

            return redirect('/companies/'.$company->id)
            ->with('msg','Company details updated');

            return redirect()->
            route('companies.show',['id'=>$company->id])
            ->with('msg','Company details updated');
        }
        else {
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company = Company::find($company->id);
        $company->delete();
        if($company){
            return redirect('/companies');
        }
    }
}
