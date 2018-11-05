<?php

namespace App\Repositories;

use App\Models\Company;

/**
 * Class CompanyRepository
 * @package App\Repositories
 */
class CompanyRepository
{
    /**
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getActiveCompanies()
    {
        $companies = Company::where('company.is_active', Company::STATUS_ACTIVE)
            ->with(['offices' => function($query) {
                $query->withCount('reviews');
            }])
            ->with('users')
            ->withCount('socials')
            ->orderBy('company_name')
            ->paginate();

        return $companies;
    }

    /**
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getWithSocials()
    {
        $companies = Company::where('is_active', Company::STATUS_ACTIVE)
            ->with('socials')
            ->orderBy('company_name')
            ->paginate();
        return $companies;
    }
}