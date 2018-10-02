<?php

namespace App\Repositories;

use App\Models\Marketing;
use App\Models\Office;

/**
 * Class CompanyRepository
 * @package App\Repositories
 */
class CompanyRepository
{
    /**
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getMarketing()
    {
        $companies = Office::whereHas('company', function ($query) {
            $query->where('marketing', 1);
        })->with('company')->paginate(20);

        return $companies;
    }
}