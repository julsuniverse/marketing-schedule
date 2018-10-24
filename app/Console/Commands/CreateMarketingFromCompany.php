<?php

namespace App\Console\Commands;

use App\Models\Marketing\Company;
use App\Models\Marketing\Marketing;
use App\Repositories\MarketingRepository;
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
    private $marketingRepository;
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(MarketingRepository $marketingRepository)
    {
        $this->marketingRepository = $marketingRepository;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $companies = Company::where([
            //['domain_id', '!=', null],
            'marketing' => 1]
        )->get();

        if($this->option('reset')) {
            $this->marketingRepository->truncate();
            $this->info('Old Marketing records were deleted.');
        }

        foreach ($companies as $company) {
            $this->marketingRepository->create($company);
        }

        $this->info('Marketing records were created.');
    }
}
