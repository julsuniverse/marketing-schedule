<?php

namespace App\Listeners;

use App\Events\CompanyUpdated;
use App\Models\Marketing\Marketing;
use App\Repositories\MarketingRepository;
use App\Services\MarketingService;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CompanyUpdatedListener
{
    /** @var MarketingRepository $marketingRepository */
    private $marketingRepository;
    /** @var MarketingService $marketingService */
    private $marketingService;

    /**
     * @param MarketingRepository $marketingRepository
     * @param MarketingService $marketingService
     */
    public function __construct(MarketingRepository $marketingRepository, MarketingService $marketingService)
    {
        $this->marketingRepository = $marketingRepository;
        $this->marketingService = $marketingService;
    }

    /**
     * @param  CompanyUpdated $event
     * @return void
     */
    public function handle(CompanyUpdated $event)
    {
        $this->marketingRepository->changeActive($event->company);
        $nextDate = $this->marketingService->getNextDate(date('m'), date('Y'));
        $this->marketingRepository->changeActive($event->company, $nextDate['month'], $nextDate['year']);
    }
}
