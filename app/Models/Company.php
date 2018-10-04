<?php

namespace App\Models;

use App\Events\CompanySaved;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Company
 * @package App\Models
 * @mixin \Eloquent
 */
class Company extends Model
{
    /**
     * @inheritdoc
     */
    protected $table = 'company';

    /**
     * @inheritdoc
     */
    protected $dispatchesEvents = [
        'created' => CompanySaved::class,
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function marketings()
    {
        return $this->hasMany(Marketing::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function offices()
    {
        return $this->hasMany(Office::class);
    }
}
