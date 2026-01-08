<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Model JUGADORA
 */
class Jugadora extends Model
{
    use HasFactory;

    protected $table = "jugadores";

    /**
     * @var string[]
     */
    protected $fillable = ['nom','equip_id', 'data_naixement', 'dorsal','foto','posicio' ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function equip()
    {
        return $this->belongsTo(Equip::class);
    }
}