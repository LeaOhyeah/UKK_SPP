<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

class Spp extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded  = [];
    public $timestamp = true;
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function petugas()
    {
        return $this->belongsTo(Petugas::class);
    }

    public function getMonthAttribute()
    {
        return Carbon::parse($this->attributes['month'])
            ->translatedFormat('F Y');
    }

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])
            ->translatedFormat('l, d F Y, H:i');
    }
    public function getUpdatedAtAttribute()
    {
        return Carbon::parse($this->attributes['updated_at'])
            ->translatedFormat('l, d F Y, H:i');
    }
    public function getDeletedAtAttribute()
    {
        return Carbon::parse($this->attributes['deleted_at'])
            ->translatedFormat('l, d F Y, H:i');
    }
}
