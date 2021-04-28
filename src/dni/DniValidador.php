<?php
declare(strict_types=1);

namespace Daw\Dni;

use LengthException;
use DomainException;

class DniValidador {
    private const LONGITUD_VALIDA = 9;

    public function __construct(string $dni){
        if (strlen($dni) !== self::LONGITUD_VALIDA){
            throw new LengthException('longitud incorrecta');    
        }
        throw new DomainException('dni termina en número');
    }

}