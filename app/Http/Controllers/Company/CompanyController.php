<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCompany;
use App\Models\Company;
use App\Models\Level;
use App\Repositories\CompanyRepository;
use Illuminate\Http\Request;


class CompanyController extends Controller
{
    private $companyRepository;
    public function __construct(CompanyRepository $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }

    public function index()
    {
        $companies = $this->companyRepository->getActiveCompanies();
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

    public function changeMarketing(Request $request)
    {
        Company::where('id', $request->company_id)->first()->update([
            'marketing' => $request->marketing
        ]);
    }
}