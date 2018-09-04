<?php

namespace CorpBinary;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    /**
     * Database Table / Tabla de la base de datos
     */
    protected $table = 'wallet';

    /**
     * Primary Key/Clave Primaria
     */
    protected $primaryKey = 'id_wallet';

    /**
     * No timestamp
     */
    public $timestamps = false;
}
