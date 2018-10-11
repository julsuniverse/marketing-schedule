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

    /**
     * @param \App\Models\Marketing\Marketing $marketing
     */
    public function __construct(Marketing $marketing)
    {
        $this->marketing = $marketing;
    }

    /**
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.marketing.report', ['marketing' => $this->marketing])
            ->from(config('app.report_sender'))
            ->subject('Monthly Marketing Schedule Process for ' . date('F, Y'));
    }
}
