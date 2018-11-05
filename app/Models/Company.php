<?php

namespace App\Models;

use App\Events\CompanySaved;
use App\Events\CompanyUpdated;
use App\Models\Marketing\Keyword;
use App\Models\Marketing\Marketing;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Company
 * @package App\Models
 * @mixin \Eloquent
 */
class Company extends Model
{
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;

    protected $perPage = 20;
    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @inheritdoc
     */
    protected $table = 'company';

    /**
     * @inheritdoc
     */
    protected $dispatchesEvents = [
        'created' => CompanySaved::class,
        'updated' => CompanyUpdated::class
    ];

    /**
     * @return int
     */
    public function getCountReviewsAttribute()
    {
        $count = 0;
        foreach($this->offices as $office) {
            $count += $office->reviews_count;
        }

        return $count;
    }

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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reports_email()
    {
        return $this->hasMany(SmsEmailReport::class, 'company_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reports_sms()
    {
        return $this->hasMany(SmsEmailReport::class, 'company_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function keywords()
    {
        return $this->belongsToMany(Keyword::class, 'company_keywords')->withPivot(['month', 'year', 'count', 'completed']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function socials()
    {
        return $this->hasMany(SocialProfile::class);
    }
}
