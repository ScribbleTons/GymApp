<?php

namespace App\Models;

use App\Models\Lead;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Factories\BelongsToRelationship;


class Reminder extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function lead(){
        return $this->belongsTo(Lead::class);
    }

    public function getStatusAttribute($value){
        return ucfirst($value);
    }

    // public function getLeadIdAttribute(){
    //     return $this->lead_id;
    // }
    
}
