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
     * Get Submitting user of transaction
     */
    public function submittingUser(){
        return $this->hasOne('CorpBinary\User','id','id_submitting_user');
    }

    /**
     * Get receiving user of transaction
     */
    public function receivingUser(){
        return $this->hasOne('CorpBinary\User','id','id_receiving_user');
    }

    /**
     * Get currency of transaction
     */
    public function currency(){
        return $this->hasOne('CorpBinary\Currency','id_currency','id_currency');
    }

    /**
     * Get messages
     */
    public function messages(){
        return $this->hasMany('CorpBinary\Message','id_transaction','id_transaction');
    }
}
