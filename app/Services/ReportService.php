<?php

namespace App\Services;

use App\Mail\ReportMarketing;
use App\Models\Marketing;

class ReportService
{
    /** @var \Illuminate\Config\Repository|mixed $admin_email */
    private $admin_email;

    public function __construct()
    {
        $this->admin_email = config('app.admin_email');
    }

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

        \Mail::to($this->admin_email)->send(new ReportMarketing($marketing));
    }
}