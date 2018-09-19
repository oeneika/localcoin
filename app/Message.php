<?php

namespace CorpBinary;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    /**
     * Database Table / Tabla de la base de datos
     */
    protected $table = 'message';
    
    /**
     * Primary Key/Clave Primaria
     */
    protected $primaryKey = 'id_message';

    /**
     * Returns user
     */
    public function user(){
        return $this->belongsTo('CorpBinary\Users','id_user');
    }

    /**
     * Returns transaction
     */
    public function transaction(){
        return $this->belongsTo('CorpBinary\Transaction','id_transaction');
    }
}
