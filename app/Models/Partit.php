<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Model PARTIT
 */
class Partit extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = ['local_id', 'visitante_id', 'estadi_id', 'data', 'jornada', 'gols_local','gols_visitant'];
    
    /**
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function equipLocal(){
        return $this->belongsTo(Equip::class,'local_id');
    }

    /**
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function equipVisitant(){
        return $this->belongsTo(Equip::class,'visitante_id');
    }

    /**
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function estadi(){
        return $this->belongsTo(Estadi::class,'estadi_id');
    }
}