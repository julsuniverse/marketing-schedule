<?php

namespace App\Models;

use App\Models\Company;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Office
 * @package App\Models
 * @mixin \Eloquent
 */
class Office extends Model
{
    /**
     * @inheritdoc
     */
    protected $table = 'office';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
