<?php

namespace App\Http\Controllers;

use App\Repositories\CompanyRepository;
use Illuminate\Http\Request;

class MarketingController extends Controller
{
    /** @var CompanyRepository */
    private $companyRepository;

    public function __construct(CompanyRepository $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $offices = $this->companyRepository->getMarketing();
        return view('marketing.index')->with('offices', $offices);
    }
}
