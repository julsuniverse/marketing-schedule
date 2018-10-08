<?php

namespace App\Events;

use App\Models\Company;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class CompanySaved
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /** @var Company $company */
    public $company;

    /**
     * @param Company $company
     */
    public function __construct(Company $company)
    {
        $this->company = $company;
    }
}
