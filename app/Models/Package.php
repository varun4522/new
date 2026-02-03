<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(PackageCategory::class);
    }

    /**
     * Return duration in hours for this package.
     * Priority:
     * 1. explicit `duration_hours` attribute (if present)
     * 2. price->hours mapping (legacy requirement)
     * 3. `effective_validity` or `validity` (days) converted to hours
     */
    public function getDurationHoursAttribute()
    {
        // 1) explicit column
        if (array_key_exists('duration_hours', $this->attributes) && !empty($this->attributes['duration_hours'])) {
            return (int) $this->attributes['duration_hours'];
        }

        // 2) mapping by price
        $map = [
            1000 => 1,
            3000 => 3,
            5000 => 10,
            8000 => 18,
            10000 => 24,
            15000 => 32,
            25000 => 40,
            43000 => 45,
            51000 => 50,
            64000 => 55,
            81500 => 62,
            95000 => 70,
            125000 => 80,
        ];

        $price = 0;
        if (isset($this->attributes['price'])) {
            // normalize numeric price (strip commas, cast)
            $price = (int) round(floatval(str_replace([',', ' '], ['', ''], $this->attributes['price'])));
        }

        if ($price && isset($map[$price])) {
            return (int) $map[$price];
        }

        // 3) fallback to validity (days -> hours)
        $validity = $this->attributes['effective_validity'] ?? $this->attributes['validity'] ?? null;
        if ($validity) {
            return (int) ($validity * 24);
        }

        // final default
        return 24;
    }
}
