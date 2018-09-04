<?php

namespace CorpBinary;

use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    /**
     * Database Table / Tabla de la base de datos
     */
    protected $table = 'reputation';

    /**
     * Primary Key/Clave Primaria
     */
    protected $primaryKey = 'id_user';

    /**
     * None AI Primary Key
     */
    public $incrementing = false;

    /**
     * No timestamp
     */
    public $timestamps = false;
}
