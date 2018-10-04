<?php

namespace App\Http\Controllers;

use App\Models\Marketing;
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
        $marketings = Marketing::where(['month' => date('m'), 'year' => date('Y')])
            ->with('company')
            ->with('company.offices.reviews')
            ->paginate(20);

        return view('marketing.index')->with('marketings', $marketings);
    }
}
