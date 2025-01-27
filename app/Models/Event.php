<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $guarded = [];
    protected $dates = ['deleted_at'];
    
    public function town()
    {
      return $this->belongsTo(Town::class);
    }
  
    public function locales()
    {
      return $this->hasMany(Locale::class, 'entity_id')->where('entity', 'events');
    }
}
