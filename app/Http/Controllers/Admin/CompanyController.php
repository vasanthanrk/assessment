<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyEditValidationRequest;
use App\Http\Requests\CompanyValidationRequest;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    public function index(){
        $companies = Company::get();
        return view('admin.companies.index', compact('companies'));
    }

    public function add()
    {
        return view('admin.companies.create');
    }

    public function store(CompanyValidationRequest $request)
    {

        $upload_data = $request->input();

        $company = new Company();

        $photo = $request->file('logo');
        $path = Storage::putFile('logo', $photo);
        
        $company->name = $upload_data['name'];
        $company->email = $upload_data['email'];
        $company->logo = $path;
        $company->website = $upload_data['website']??'';
        $company->save();
        return redirect()->back()->with('success', 'Company is added successfully.');

    }


    public function edit(Company $company)
    {
        return view('admin.companies.edit', compact('company'));
    }

    public function update(CompanyEditValidationRequest $request, Company $company)
    {
        $update = $request->validated();
        if($request->hasFile('logo')) {
            if(file_exists(public_path('storage/'.$company->logo))){
                unlink(public_path('storage/'.$company->logo));
            }
            $photo = $request->file('logo');
            $path = Storage::putFile('logo', $photo);
            $update['logo'] = $path;
        }
        // dd($update);
        $company->update($update);
        return redirect()->back()->with('success', 'Company is updated successfully.');
    }

    public function delete($id)
    {
        $single_data = DB::table('companies')->where('id',$id)->first();
        if(file_exists(public_path('storage/'.$single_data->logo))){
            unlink(public_path('storage/'.$single_data->logo));
        }
        DB::table('companies')->where('id',$id)->delete();

        return redirect()->back()->with('success', 'Company is deleted successfully.');
    }
}
