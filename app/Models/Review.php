<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Review
 * @package App\Models
 * @mixin \Eloquent
 */
class Review extends Model
{
    /**
     * @inheritdoc
     */
    protected $table = 'review';

    public function office()
    {
        return $this->belongsTo(Office::class);
    }

}
