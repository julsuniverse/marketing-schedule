<?php

namespace App\Http\Controllers;

use App\Models\Marketing;
use App\Repositories\MarketingRepository;
use App\Services\MarketingService;
use App\Services\ReportService;
use Illuminate\Http\Request;

class MarketingController extends Controller
{
    /** @var MarketingService  $marketingService*/
    private $marketingService;
    /** @var ReportService $reportService */
    private $reportService;

    public function __construct(MarketingService $marketingService, ReportService $reportService)
    {
        $this->marketingService = $marketingService;
        $this->reportService = $reportService;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        //TODO: validate month and year

        $month = $request->month ?: date('m');
        $year = $request->year ?: date('Y');

        $marketingData = $this->marketingService->getData($month, $year);
        //dd($marketingData);
        $statuses = Marketing::getStatuses();
        $statuses_pr = Marketing::getStatusesPr();

        return view('marketing.index', compact('marketingData', 'statuses', 'statuses_pr'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'value' => 'int|nullable',
        ]);

        return Marketing::where('id', $request->marketing_id)
            ->update([
                $request->field => $request->value
            ]);
    }

    public function updateColors(Request $request)
    {
        $request->validate([
            'status' => 'required|int',
        ]);

        return Marketing::where('id', $request->marketing_id)
            ->update([
                //$request->field => $request->value,
                $request->field . '_status' => $request->status
            ]);
    }

    public function report(Marketing $marketing)
    {
        $this->reportService->make($marketing);
    }
}
