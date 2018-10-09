<?php

namespace App\Services;

use App\Models\Marketing;
use App\Repositories\MarketingRepository;

class MarketingService
{
    private $marketingRepository;

    public function __construct(MarketingRepository $marketingRepository)
    {
        $this->marketingRepository = $marketingRepository;
    }

    /**
     * @param integer $month
     * @param integer $year
     * @return \stdClass
     */
    public function getData($month, $year) : \stdClass
    {
        $marketings = $this->marketingRepository->getMarketing($month, $year, 2);

        $nextDate = $this->getNextDate($month, $year);
        $prevDate = $this->getPrevDate($month, $year);

        $marketings = $this->getDifference($marketings, $prevDate['month'], $prevDate['year']);

        $marketingData = new \stdClass();
        $marketingData->marketings = $marketings;
        $marketingData->date = date('F, Y', strtotime($year . '-' . $month));
        $marketingData->nextDate = $nextDate;
        $marketingData->prevDate = $prevDate;

        return $marketingData;
    }

    public function getNextDate($month, $year)
    {
        if ($month == 12) {
            $nextDate = ['month' => 1, 'year' => $year + 1];
        } else {
            $nextDate = ['month' => $month + 1, 'year' => $year];
        }

        return $nextDate;
    }

    public function getPrevDate($month, $year)
    {
        if ($month == 1) {
            $prevDate = ['month' => 12, 'year' => $year - 1];
        } else {
            $prevDate = ['month' => $month - 1, 'year' => $year];
        }

        return $prevDate;
    }

    /**
     * @param $marketings
     * @param int $month
     * @param int $year
     * @return mixed
     */
    public function getDifference($marketings, $month, $year)
    {
        $oldMarketings = $this->marketingRepository->getMarketing($month, $year)->keyBy('company_id');

        foreach($marketings as $marketing) {
            if(!isset($oldMarketings[$marketing->company_id])) {
                $marketing->diffTraffic = 0;
                $marketing->diffCalls = 0;
                $marketing->diffForms = 0;
                $marketing->diffReviews = 0;
                continue;
            }
            $oldMarketing = $oldMarketings[$marketing->company_id];
            $marketing->diffTraffic = $this->calculateDifference($oldMarketing->traffic, $marketing->traffic);
            $marketing->diffCalls = $this->calculateDifference($oldMarketing->calls, $marketing->calls);
            $marketing->diffForms = $this->calculateDifference($oldMarketing->forms, $marketing->forms);
            $marketing->diffReviews = $this->calculateDifference($oldMarketing->reviews, $marketing->reviews);
        }

        return $marketings;
    }

    /**
     * @param Marketing $old
     * @param Marketing $new
     * @return float|int
     */
    public function calculateDifference(Marketing $old, Marketing $new)
    {
        $res = $old * 100 / $new;
        if($old < $new) {
            $res = $res * -1;
        }

        return $res;
    }
}