<?php

namespace App\Services;

use App\Mail\ReportMarketing;
use App\Models\Marketing;

class ReportService
{
    /**
     * @param Marketing $marketing
     */
    public function make(Marketing $marketing)
    {
        $marketing = $marketing->with(['company.offices.reviews',
            'company' => function ($query) use ($marketing) {
                $query->withCount(['reports_email' => function ($query) use ($marketing) {
                    $query->time('where', 'email1_timestamp', $marketing->year, $marketing->month)
                        ->time('orWhere', 'email2_timestamp', $marketing->year, $marketing->month)
                        ->time('orWhere', 'email3_timestamp', $marketing->year, $marketing->month);
                }])->withCount(['reports_sms' => function ($query) use ($marketing) {
                    $query->time('where', 'sms1_timestamp', $marketing->year, $marketing->month)
                        ->time('orWhere', 'sms2_timestamp', $marketing->year, $marketing->month)
                        ->time('orWhere', 'sms3_timestamp', $marketing->year, $marketing->month);
                }]);
            }])->first();

        \Mail::to('logicslancer@gmail.com')->send(new ReportMarketing($marketing));
    }
}