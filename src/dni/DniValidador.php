<?php
declare(strict_types=1);

namespace Daw\Dni;

use LengthException;

class DniValidador {
    public function __construct(string $dni){
        if (strlen($dni) > 9){
            throw new LengthException('dni demasiado largo');    
        }
        throw new LengthException('dni demasiado corto');
    }

}