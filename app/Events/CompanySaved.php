<?php

namespace App\Events;

use App\Models\Marketing\Company;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class CompanySaved
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /** @var \App\Models\Marketing\Company $company */
    public $company;

    /**
     * @param \App\Models\Marketing\Company $company
     */
    public function __construct(Company $company)
    {
        $this->company = $company;
    }
}
