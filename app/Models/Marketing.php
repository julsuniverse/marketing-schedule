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
     * @var array
     */
    protected $guarded = [];

    public $diffTraffic;
    public $diffCalls;
    public $diffForms;
    public $diffPosts;

    const STATUS_NONE = 0;
    const STATUS_SCHEDULE = 1;
    const STATUS_ORDERED = 2;
    const STATUS_COMPLETED = 3;

    const STATUS_WRITTEN = 4;
    const STATUS_DISTRIBUTED = 5;

    protected $appends = [
        'diffTraffic',
        'diffCalls',
        'diffForms',
        'diffPosts',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public static function getStatuses()
    {
        return collect([
            [
                'name' => 'none',
                'color' => 'gray',
                'value' => self::STATUS_NONE,
            ],
            [
                'name' => 'schedule',
                'color' => 'red',
                'value' => self::STATUS_SCHEDULE,
            ],
            [
                'name' => 'ordered',
                'color' => 'yellow',
                'value' => self::STATUS_ORDERED,
            ],
            [
                'name' => 'completed',
                'color' => 'green',
                'value' => self::STATUS_COMPLETED,
            ]
        ]);
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public static function getStatusesPr()
    {
        return collect([
            [
                'name' => 'none',
                'color' => 'gray',
                'value' => self::STATUS_NONE,
            ],
            [
                'name' => 'schedule',
                'color' => 'red',
                'value' => self::STATUS_SCHEDULE,
            ],
            [
                'name' => 'ordered',
                'color' => 'yellow',
                'value' => self::STATUS_ORDERED,
            ],
            [
                'name' => 'written',
                'color' => 'green',
                'value' => self::STATUS_WRITTEN,
            ],
            [
                'name' => 'distributed',
                'color' => 'LightSkyBlue',
                'value' => self::STATUS_DISTRIBUTED,
            ]
        ]);
    }
}
