<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SmsEmailReport extends Model
{
    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $where
     * @param string $field
     * @param integer $year
     * @param integer $month
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeTime($query, $where, $field, $year, $month)
    {
        if ($month >= 1 && $month <=9) {
            $month = '0' . $month;
        }
        return $query->{$where}([
            [$field, '>=', $year . '-' . $month . '-01 00:00:00'],
            [$field, '<=', $year . '-' . $month . '-31 23:59:59']
        ]);
    }
}
