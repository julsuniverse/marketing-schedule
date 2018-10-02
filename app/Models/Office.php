<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Office
 * @package App\Models
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

    public function marketings()
    {
        return $this->hasMany(Marketing::class);
    }
}
