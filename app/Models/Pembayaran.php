<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

class Pembayaran extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded  = [];
    public $timestamp = true;
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    public function spp()
    {
        return $this->belongsTo(Spp::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function petugas()
    {
        return $this->belongsTo(Petugas::class);
    }

    static public function checkPembayaran($id_spp, $id_user)
    {
        return Pembayaran::where('spp_id', $id_spp)->where('user_id', $id_user)->exists();
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
        return Carbon::parse($this->attributes['updated_at'])
            ->translatedFormat('l, d F Y, H:i');
    }
}
