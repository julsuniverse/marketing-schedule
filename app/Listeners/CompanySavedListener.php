<?php

namespace App\Listeners;

use App\Events\CompanySaved;
use App\Repositories\MarketingRepository;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CompanySavedListener
{
    private $marketingRepository;
    /**
     * @return void
     */
    public function __construct(MarketingRepository $marketingRepository)
    {
        $this->marketingRepository = $marketingRepository;
    }

    /**
     * @param  CompanySaved  $event
     * @return void
     */
    public function handle(CompanySaved $event)
    {
        $this->marketingRepository->create($event->company);
    }
}
