<?php

namespace Kanekescom\Siasn\Simpeg\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kanekescom\Siasn\Referensi\Models\Golongan;

class PnsListKpInstansi extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The data type of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    protected $casts = [
        'path' => 'array',
    ];

    public function getTable()
    {
        return 'siasn_simpeg_'.str(class_basename(__CLASS__))->snake();
    }

    public function pegawai(): HasOne
    {
        return $this->hasOne(Pegawai::class, 'pns_id', 'pnsId');
    }

    public function golonganBaru(): BelongsTo
    {
        return $this->belongsTo(Golongan::class, 'golonganBaruId');
    }
}
