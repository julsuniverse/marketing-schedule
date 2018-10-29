<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;

class ArchiveController extends Controller
{
    public function index()
    {
        $companies = Company::where('is_active', 0)->paginate(20);
        return view('company.archive', compact('companies'));
    }

    public function recover(Company $company)
    {
        Company::where('id', $company->id)->first()->update(['is_active' => 1]);
        return redirect('company');
    }
}