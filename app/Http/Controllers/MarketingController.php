<?php

namespace App\Http\Controllers;

use App\Repositories\MarketingRepository;
use Illuminate\Http\Request;

class MarketingController extends Controller
{
    /** @var MarketingRepository $marketingRepository */
    private $marketingRepository;

    public function __construct(MarketingRepository $marketingRepository)
    {
        $this->marketingRepository = $marketingRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        //TODO: validate month and year

        $month = $request->month ?: date('m');
        $year = $request->year ?: date('Y');

        $marketingData = $this->marketingRepository->getMarketing($month, $year);

        return view('marketing.index', compact('marketingData'));
    }
}
