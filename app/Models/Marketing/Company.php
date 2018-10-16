<?php

namespace App\Models\Marketing;

use App\Events\CompanySaved;
use App\Models\Office;
use App\Models\SmsEmailReport;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Company
 * @package App\Models
 * @mixin \Eloquent
 */
class Company extends Model
{
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

    public function keywords()
    {
        return $this->belongsToMany(Keyword::class, 'company_keywords')->withPivot(['month', 'year', 'count', 'completed']);
    }
}
