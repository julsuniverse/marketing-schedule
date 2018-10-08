<?php

namespace App\Repositories;

use App\Models\Company;
use App\Models\Marketing;

class MarketingRepository
{
    /**
     * @param Company $company
     * @return Marketing
     */
    public function create(Company $company): Marketing
    {
        return $company->marketings()->create([
            'month' => date('m'),
            'year' => date('Y')
        ]);
    }

    /**
     * @param integer $month
     * @param integer $year
     * @return \stdClass
     */
    public function getMarketing($month, $year)
    {
        $marketing = Marketing::where(['month' => $month, 'year' => $year])
            ->with(['company.offices.reviews',
                'company' => function ($query) use ($month, $year) {
                    $query->withCount(['reports_email' => function ($query) use ($month, $year) {
                        $query->time('where', 'email1_timestamp', $year, $month)
                            ->time('orWhere', 'email2_timestamp', $year, $month)
                            ->time('orWhere', 'email3_timestamp', $year, $month);
                    }])->withCount(['reports_sms' => function ($query) use ($month, $year) {
                        $query->time('where', 'sms1_timestamp', $year, $month)
                            ->time('orWhere', 'sms2_timestamp', $year, $month)
                            ->time('orWhere', 'sms3_timestamp', $year, $month);
                    }]);
                }])
            ->paginate(20);

        if ($month == 12) {
            $nextDate = ['month' => 1, 'year' => $year + 1];
        } else {
            $nextDate = ['month' => $month + 1, 'year' => $year];
        }

        if ($month == 1) {
            $prevDate = ['month' => 12, 'year' => $year - 1];
        } else {
            $prevDate = ['month' => $month - 1, 'year' => $year];
        }


        $marketingData = new \stdClass();
        $marketingData->marketings = $marketing;
        $marketingData->date = date('F, Y', strtotime($year . '-' . $month));
        $marketingData->nextDate = $nextDate;
        $marketingData->prevDate = $prevDate;

        return $marketingData;
    }
}