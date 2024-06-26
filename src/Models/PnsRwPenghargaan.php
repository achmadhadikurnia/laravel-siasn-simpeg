<?php

namespace Kanekescom\Siasn\Simpeg\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class PnsRwPenghargaan extends Model
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

    public function pegawai(): BelongsTo
    {
        return $this->belongsTo(Pegawai::class, 'pnsOrangId');
    }

    public function scopeNipBaru($query, $string)
    {
        return $query
            ->whereHas('pegawai', function ($query) use ($string) {
                $query->where('nip_baru', $string);
            });
    }

    public function scopeTahunOptions($query)
    {
        return $query
            ->distinct('tahun')
            ->select('tahun')
            ->orderBy('tahun', 'desc')
            ->pluck('tahun', 'tahun');
    }
}
