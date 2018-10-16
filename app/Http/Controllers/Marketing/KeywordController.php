<?php

namespace App\Http\Controllers\Marketing;

use App\Repositories\KeywordRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KeywordController extends Controller
{
    private $keywordRepository;

    public function __construct(KeywordRepository $keywordRepository)
    {
        $this->keywordRepository = $keywordRepository;
    }

    public function store(Request $request)
    {
        $keyword = $this->keywordRepository->store($request->keyword, $request->company_id, $request->month, $request->year);
        return $keyword;
    }
}
