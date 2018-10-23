<?php

use App\Models\Marketing\Marketing;
use App\Repositories\MarketingRepository;
use Illuminate\Database\Seeder;

class MarketingTableSeeder_10_2018 extends Seeder
{
    private $marketingRepository;

    public function __construct(MarketingRepository $marketingRepository)
    {
        $this->marketingRepository = $marketingRepository;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = [71, 12, 14, 1, 54, 25, 5, 23, 78, 15, 20, 26, 91, 6, 31, 57, 21, 80, 17, 29, 32, 27, 41, 4, 49, 81, 79, 80, 75, 86];

        foreach ($companies as $company) {
            $marketing = Marketing::create(['company_id' => $company, 'month' => 9, 'year' => 2018, 'created_at' => date('Y-m-d H:m:s'), 'updated_at' => date('Y-m-d H:m:s')]);
            $marketing->reviews = $this->marketingRepository->countReviews($marketing);
            $marketing->save();
        }
    }
}
