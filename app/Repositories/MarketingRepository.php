<?php

namespace App\Repositories;

use App\Models\Company;
use App\Models\Marketing;
use Illuminate\Pagination\LengthAwarePaginator;

class MarketingRepository
{
    /**
     * @param Company $company
     * @return Marketing
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
     * @param Marketing $marketing
     * @return int
     */
    public function countReviews(Marketing $marketing) :int
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
     * @return Marketing | LengthAwarePaginator
     */
    public function getMarketing($month, $year, $paginate = false)
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
                }]);

        if($paginate) {
            return $marketing->paginate($paginate);
        }

        return $marketing->get();
    }

    /**
     * @return void
     */
    public function truncate() : void
    {
        Marketing::truncate();
    }


}