<?php

namespace App\Events;

use App\Models\Company;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class CompanyUpdated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /** @var \App\Models\Company $company */
    public $company;

    /**
     * @param \App\Models\Company $company
     */
    public function __construct(Company $company)
    {
        $this->company = $company;
    }
}
