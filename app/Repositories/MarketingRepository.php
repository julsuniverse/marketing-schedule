<?php

namespace App\Repositories;

use App\Models\Marketing\Company;
use App\Models\Marketing\Marketing;
use App\Models\SmsEmailReport;
use Illuminate\Pagination\LengthAwarePaginator;

class MarketingRepository
{
    /**
     * @param \App\Models\Marketing\Company $company
     * @return \App\Models\Marketing\Marketing
     */
    public function create(Company $company): Marketing
    {

        $marketing = $company->marketings()->create([
            'month' => date('m'),
            'year' => date('Y')
        ]);

        $marketing->reviews = $this->countReviews($marketing);
        $marketing->save();

        return $marketing;
    }

    /**
     * @param \App\Models\Marketing\Marketing $marketing
     * @return int
     */
    public function countReviews(Marketing $marketing): int
    {
        $count = 0;
        foreach ($marketing->company->offices as $office) {
            $count += $office->reviews->count();
        }

        return $count;
    }

    /**
     * @param $month
     * @param $year
     * @param bool $paginate
     * @return \App\Models\Marketing\Marketing | LengthAwarePaginator
     */
    public function getMarketing($month, $year, $paginate = false)
    {
        $marketing = Marketing::where(['month' => $month, 'year' => $year, 'active' => 1])
            ->with(['company.offices.reviews',
                'company' => function ($query) use ($month, $year) {
                    $query->with(['reports_email' => function ($query) use ($month, $year) {
                        $query->time('where', 'email1_timestamp', $year, $month)
                            ->time('orWhere', 'email2_timestamp', $year, $month)
                            ->time('orWhere', 'email3_timestamp', $year, $month);
                    }])->with(['reports_sms' => function ($query) use ($month, $year) {
                        $query->time('where', 'sms1_timestamp', $year, $month)
                            ->time('orWhere', 'sms2_timestamp', $year, $month)
                            ->time('orWhere', 'sms3_timestamp', $year, $month);
                    }])
                        ->with(['keywords' => function ($query) use ($month, $year) {
                            $query->where(['month' => $month, 'year' => $year]);
                        }]);
                }]);

        if ($paginate) {
            return $marketing->paginate($paginate);
        }

        return $marketing->get();
    }

    /**
     * @return void
     */
    public function truncate(): void
    {
        Marketing::truncate();
    }

    /**
     * @param Company $company
     */
    public function changeActive(Company $company)
    {
        Marketing::where([
            'company_id' => $company->id,
            'month' => date('m'),
            'year' => date('Y')
        ])->update(['active' => $company->marketing == 0 ? 0 : 1]);
    }

}