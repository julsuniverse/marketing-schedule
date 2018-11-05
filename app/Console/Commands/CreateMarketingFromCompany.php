<?php

namespace App\Console\Commands;

use App\Models\Company;
use App\Models\Marketing\Marketing;
use App\Repositories\MarketingRepository;
use App\Services\MarketingService;
use Illuminate\Console\Command;

class CreateMarketingFromCompany extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'marketing:init {--reset}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create marketing records for existing companies';

    /** @var MarketingRepository $marketingRepository */
    private $marketingRepository;
    /** @var MarketingService $marketingService */
    private $marketingService;

    /*
     * @param MarketingRepository $marketingRepository
     * @param MarketingService $marketingService
     */
    public function __construct(MarketingRepository $marketingRepository, MarketingService $marketingService)
    {
        $this->marketingRepository = $marketingRepository;
        $this->marketingService = $marketingService;
        parent::__construct();
    }

    /**
     * @return mixed
     */
    public function handle()
    {
        $companies = Company::where([
                //['domain_id', '!=', null],
                'marketing' => 1]
        )->get();

        if ($this->option('reset')) {
            $this->marketingRepository->truncate();
            $this->info('Old Marketing records were deleted.');
            \Artisan::call('db:seed', ['--class' => 'MarketingTableSeeder_10_2018']);
        }
        $this_month = date('m');
        $this_year = date('Y');

        //create for this month if it is not exists
        if (Marketing::where(['month' => $this_month, 'year' => $this_year])->count() == 0) {
            $this->createMarketings($companies);
        }

        $nextDate = $this->marketingService->getNextDate($this_month, $this_year);

        //create for the next month
        $this->createMarketings($companies, $nextDate['month'], $nextDate['year']);

        $this->info('Marketing records were created.');
    }

    /**
     * @param $companies
     * @param bool|integer $month
     * @param bool|integer $year
     */
    public function createMarketings($companies, $month = false, $year = false)
    {
        foreach ($companies as $company) {
            $this->marketingRepository->create($company, $month, $year);
        }
    }
}
