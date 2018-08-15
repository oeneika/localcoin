<?php

namespace CorpBinary;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{

    /**
     * Database Table / Tabla de la base de datos
     */
    protected $table = 'currency';

    /**
     * Primary Key/Clave Primaria
     */
    protected $primaryKey = 'id_currency';

    /**
     * No timestamp
     */
    protected $timestamp = false;
}
