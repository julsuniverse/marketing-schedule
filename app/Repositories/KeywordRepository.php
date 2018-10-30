<?php

namespace App\Repositories;

use App\Models\Company;
use App\Models\Marketing\Keyword;

class KeywordRepository
{
    /**
     * @param string $keyword
     * @param integer $company_id
     * @param integer $month
     * @param integer $year
     * @return Keyword
     */
    public function store($keyword_text, $company_id, $month, $year)
    {
        //dd($keyword);
        $keyword = Keyword::where(['text' => $keyword_text])->first();
        if (!$keyword) {
            $keyword = Keyword::create([
                'text' => $keyword_text
            ]);
        }

        $company = Company::where('company.id', $company_id)->first();
        $keywordsForCompany = $company
            ->keywords()
            ->where([
                'keywords.id' => $keyword->id,
                'month' => $month,
                'year' => $year
            ])
            ->first();

        if (!$keywordsForCompany) {
            $company->keywords()->attach($keyword, [
                'month' => $month,
                'year' => $year,
            ]);
        } else {
            $company->keywords()
                ->wherePivot('month', $month)
                ->wherePivot('year', $year)
                ->updateExistingPivot($keyword->id, ['count' => $keywordsForCompany->pivot->count + 1]);
        }

        return Company::where('company.id', $company_id)
            ->with(['keywords' => function($query) use ($keyword, $month, $year) {
                $query->where(['keywords.id' => $keyword->id, 'month' => $month, 'year' => $year]);
            }])->first();
    }
}