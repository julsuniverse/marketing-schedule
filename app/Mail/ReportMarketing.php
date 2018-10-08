<?php

namespace App\Mail;

use App\Models\Marketing;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReportMarketing extends Mailable
{
    use Queueable, SerializesModels;

    /** @var Marketing $marketing */
    private $marketing;

    /**
     * @param Marketing $marketing
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
            ->subject('Monthly Marketing Schedule Process for ' . date('F, Y'));
    }
}
