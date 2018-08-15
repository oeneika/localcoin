<?php

namespace CorpBinary;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{

    /**
     * Database Table / Tabla de la base de datos
     */
    protected $table = 'payment_method';

    /**
     * Primary Key/Clave Primaria
     */
    protected $primaryKey = 'id_payment_method';

    /**
     * No timestamp
     */
    protected $timestamp = false;
}
