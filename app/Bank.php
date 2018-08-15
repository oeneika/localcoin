<?php

namespace CorpBinary;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{

    /**
     * Database Table / Tabla de la base de datos
     */
    protected $table = 'bank';

    /**
     * Primary Key/Clave Primaria
     */
    protected $primaryKey = 'id_bank';

    /**
     * No timestamp
     */
    protected $timestamp = false;
}
