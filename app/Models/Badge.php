<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Badge extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'badge';

    public function userBadges()
    {
        return $this->hasMany(UserEarnsBadge::class, 'id_badge');
    }
}
