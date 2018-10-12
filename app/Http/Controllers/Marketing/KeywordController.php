<?php

namespace App\Http\Controllers\Marketing;

use App\Models\Marketing\Company;
use App\Models\Marketing\Keyword;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KeywordController extends Controller
{
    public function store(Request $request) {
        $keyword = Keyword::where(['text' => $request->keyword])->first();
        if (!$keyword) {
            $keyword = Keyword::create([
                'text' => $request->keyword
            ]);
        }
        $company = Company::where('id', $request->company_id)->first()->keywords()->attach($keyword, [
            'month' => $request->month,
            'year' => $request->year
        ]);

        return $keyword;
    }
}
