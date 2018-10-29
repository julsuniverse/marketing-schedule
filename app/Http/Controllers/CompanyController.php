<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCompany;
use App\Models\Company;
use App\Models\Level;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::paginate(20);
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
}