<?php

namespace App\Listeners;

use App\Events\CompanyUpdated;
use App\Models\Marketing\Marketing;
use App\Repositories\MarketingRepository;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CompanyUpdatedListener
{
    /** @var MarketingRepository $marketingRepository */
    private $marketingRepository;

    /**
     * @return void
     */
    public function __construct(MarketingRepository $marketingRepository)
    {
        $this->marketingRepository = $marketingRepository;
    }

    /**
     * @param  CompanyUpdated $event
     * @return void
     */
    public function handle(CompanyUpdated $event)
    {
        $this->marketingRepository->changeActive($event->company);
    }
}
