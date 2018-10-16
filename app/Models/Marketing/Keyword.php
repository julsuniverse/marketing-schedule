<?php

namespace App\Models\Marketing;

use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{
    /**
     * @var array
     */
    protected $guarded = [];

    public function companies()
    {
        return $this->belongsToMany(Company::class, 'company_keywords')->withPivot(['month', 'year', 'count', 'completed']);
    }
}
