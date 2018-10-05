<?php

namespace App\Http\Controllers;

use App\Models\Marketing;
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

    public function update(Request $request)
    {
        $request->validate([
            'value' => 'int|nullable',
        ]);

        Marketing::where('id', $request->marketing_id)
            ->update([
                $request->field => $request->value
            ]);
    }
}
