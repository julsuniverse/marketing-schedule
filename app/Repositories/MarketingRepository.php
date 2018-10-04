<?php

namespace App\Repositories;

use App\Models\Company;
use App\Models\Marketing;

class MarketingRepository
{
    /**
     * @param Company $company
     * @return Marketing
     */
    public function create(Company $company): Marketing
    {
        return $company->marketings()->create([
            'month' => date('m'),
            'year' => date('Y')
        ]);
    }
}