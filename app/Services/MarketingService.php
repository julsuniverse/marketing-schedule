<?php

namespace App\Services;

use App\Models\Marketing\Marketing;
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
        $marketings = $this->marketingRepository->getMarketing($month, $year, 20);

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
            $marketing->diffTraffic = $this->calculateDifference($oldMarketing->traffic ?? 0, $marketing->traffic ?? 0);
            $marketing->diffCalls = $this->calculateDifference($oldMarketing->calls ?? 0, $marketing->calls ?? 0);
            $marketing->diffForms = $this->calculateDifference($oldMarketing->forms ?? 0, $marketing->forms ?? 0);
            $marketing->diffReviews = $this->calculateDifference($oldMarketing->reviews ?? 0, $marketing->reviews ?? 0);
        }

        return $marketings;
    }

    public function getDifferenceByMarketing(Marketing $marketing, string $field)
    {
        $month = $marketing->month;
        $year = $marketing->year;

        $prevDate = $this->getPrevDate($month, $year);

        $oldMarketing = Marketing::where(['company_id' => $marketing->company_id, 'year' => $prevDate['year'], 'month' => $prevDate['month']])
            ->orderBy('id', 'DESC')
            ->first();

        if(!$oldMarketing) {
            return 0;
        }
        return $this->calculateDifference($oldMarketing->{$field}, $marketing->{$field});
    }

    /**
     * @param int $old
     * @param int $new
     * @return float|int
     */
    public function calculateDifference(?int $old, ?int $new)
    {
        if(($old === null || $new === null) || ($old === 0 && $new === 0)) {
            return 0;
        }

        if($old > $new) {
            $res = ($new - $old) / $old * 100;
        } else {
            $res = ($new - $old) / $new * 100;
        }

        return round($res, 2);
    }
}