<?php

namespace App\Console\Commands;

use App\Models\Company;
use App\Models\Domain;
use App\Models\Office;
use Illuminate\Console\Command;

class RelateDomainsToCompany extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'company:add-domains';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Relates domains to companies';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $domains = Domain::select(['id', 'office_id'])->distinct('office_id')->get();

        foreach ($domains as $domain) {
            $office =  Office::select(['id', 'company_id'])->where('id', $domain->office_id)->first();

            $company = Company::where('id', $office->company_id)->first();
            $company->domain_id = $domain->id;
            $company->save();
        }

        $this->info('Domains were related.');
    }


}
