<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SocialProfile
 * @package App\Models
 * @mixin \Eloquent
 */
class SocialProfile extends Model
{
    /**
     * @var string
     */
    protected $table = "company_social_profile";

    /**
     * @var array
     */
    protected $guarded = [];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
