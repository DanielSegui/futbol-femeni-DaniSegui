<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Model PARTIT
 */
class partit extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = ['local_id', 'visitant_id', 'estadi_id', 'data', 'jornada', 'gols'];
    
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
        return $this->belongsTo(Equip::class,'visitant_id');
    }

    /**
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function estadi(){
        return $this->belongsTo(Estadi::class,'estadi_id');
    }
}