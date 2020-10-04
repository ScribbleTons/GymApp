<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    public $guarded = [];
    public $dateFormat = 'y-m-d H:m:s';

    public function reminder()
    {
        return $this->hasMany(Reminder::class)
            ->orderByDesc('id');
    }
}
