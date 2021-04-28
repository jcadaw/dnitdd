<?php
declare(strict_types=1);

namespace Daw\Tests\Dni;

use Daw\Dni\DniValidador;
use PHPUnit\Framework\TestCase;
use LengthException;

/**
 * @coversDefaultClass \Daw\Dni\DniValidador
 */
class DniValidadorTest extends TestCase{

    /**
     * @covers ::__construct    
     */
    public function testDeberiaFallarSiLongitudEsMayorQueLongitudMaxima(){
        $dni = '1234567890';

        try{
            $sut = new DniValidador($dni);
        }
        finally{
            $this->expectException(LengthException::class);
            $this->expectExceptionMessage('dni demasiado largo');
        }
    }

    /**
     * @covers ::__construct    
     */
    public function testDeberiaFallarSiLongitudEsMenorQueLongitudMinima(){
        $dni = '12345678';

        try{
            $sut = new DniValidador($dni);
        }
        finally{
            $this->expectException(LengthException::class);
            $this->expectExceptionMessage('dni demasiado corto');
        }
    }    
    
}