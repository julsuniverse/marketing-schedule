<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompany;
use App\Models\Company;
use App\Models\Level;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::where('is_active', 1)->paginate(20);
        return view('company.index', compact('companies'));
    }

    public function create()
    {
        $levels = Level::get();
        return view('company.create', compact('levels'));
    }

    public function store(StoreCompany $request)
    {
        $request->validated();
        Company::create($request->input());
        return redirect('company');
    }

    public function edit(Company $company)
    {
        $levels = Level::get();
        return view('company.edit', compact('company', 'levels'));
    }

    public function update(Company $company, StoreCompany $request)
    {
        $request->validated();
        Company::where('id', $company->id)->first()->update($request->input());
        return redirect('company');
    }

    public function destroy(Company $company)
    {
        Company::where('id', $company->id)->first()->update(['is_active' => 0]);
        return redirect('company');
    }
}