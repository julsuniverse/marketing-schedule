<?php

namespace App\Models\Marketing;

use App\Models\Company;
use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{
    protected $connection = 'mysql';
    /**
     * @var array
     */
    protected $guarded = [];

    public function companies()
    {
        return $this->belongsToMany(Company::class, 'company_keywords')->withPivot(['month', 'year', 'count', 'completed']);
    }
}
