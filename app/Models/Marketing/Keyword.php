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
        $this->belongsToMany(Company::class);
    }
}
