<?php

namespace CorpBinary;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    /**
     * Database Table / Tabla de la base de datos
     */
    protected $table = 'transaction';
    
    /**
     * Primary Key/Clave Primaria
     */
    protected $primaryKey = 'id_transaction';
    //

    /**
     * Get Submitting user of connected user
     */
    public function submittingUser(){
        return $this->hasOne('CorpBinary\User','id','id_submitting_user');
    }

    /**
     * Get receiving user of connected user
     */
    public function receivingUser(){
        return $this->hasOne('CorpBinary\User','id','id_receiving_user');
    }
}
