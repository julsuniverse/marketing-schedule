<?php

namespace App\Mail;

use App\Models\Marketing\Marketing;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReportMarketing extends Mailable
{
    use Queueable, SerializesModels;

    /** @var \App\Models\Marketing\Marketing $marketing */
    private $marketing;
    private $marketingDate;

    /**
     * @param \App\Models\Marketing\Marketing $marketing
     */
    public function __construct(Marketing $marketing)
    {
        $this->marketing = $marketing;
        $this->marketingDate = date('F, Y', strtotime('01-' .$this->marketing->month . '-' . $this->marketing->year));
    }

    /**
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.marketing.report', ['marketing' => $this->marketing, 'date' => $this->marketingDate])
            ->from(config('app.report_sender'))
            ->subject('Monthly Marketing Schedule Process for ' . $this->marketingDate);
    }
}
