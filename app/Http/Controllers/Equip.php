<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Model EQUIP
 */
class Equip extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = ['nom', 'estadi_id', 'titols' ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function estadi()
    {
        return $this->belongsTo(Estadi::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function manager()
    {
        return $this->hasOne(User::class   );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function jugadores(){
        return $this->hasMany(Jugadora::class);
    }
    
    /**
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function partitLocal(){
        return $this->hasMany(Partit::class,'local_id');
    }

    /**
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function partitVisitant(){
        return $this->hasMany(Partit::class,'visitant_id');
    }

}