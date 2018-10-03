<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Marketing
 * @package App\Models
 * @mixin \Eloquent
 */
class Marketing extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function office()
    {
        return $this->hasOne(Office::class);
    }
}
