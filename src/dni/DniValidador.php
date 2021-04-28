<?php
declare(strict_types=1);

namespace Daw\Dni;

use LengthException;
use DomainException;

class DniValidador {
    private const LONGITUD_VALIDA = 9;

    public function __construct(string $dni){
        $this->comprobarLongitudCorrecta($dni);

        throw new DomainException('dni termina en número');
    }

    /**
     * @param string $dni dni suministrado
     * @throws LengthException cuando el $dni no tiene el 
     *                         tamaño self::LONGITUD_VALIDA
     */
    private function comprobarLongitudCorrecta(string $dni){
        if (strlen($dni) !== self::LONGITUD_VALIDA){
            throw new LengthException('longitud incorrecta');    
        }
    }
}