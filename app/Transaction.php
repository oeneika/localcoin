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
}
