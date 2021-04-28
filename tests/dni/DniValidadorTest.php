<?php
declare(strict_types=1);

namespace Daw\Tests\Dni;

use Daw\Dni\DniValidador;
use PHPUnit\Framework\TestCase;
use LengthException;
use DomainException;

/**
 * @coversDefaultClass \Daw\Dni\DniValidador
 */
class DniValidadorTest extends TestCase{

    /**
     * @covers ::__construct    
     */
    public function testDeberiaFallarCuandoLongitudEsMayorQueLongitudMaxima(){
        $dni = '1234567890';

        try{
            $sut = new DniValidador($dni);
        }
        finally{
            $this->expectException(LengthException::class);
        }
    }

    /**
     * @covers ::__construct    
     */
    public function testDeberiaFallarCuandoLongitudEsMenorQueLongitudMinima(){
        $dni = '12345678';

        try{
            $sut = new DniValidador($dni);
        }
        finally{
            $this->expectException(LengthException::class);
        }
    }    

    /**
     * @covers ::__construct    
     */
    public function testDeberiaFallarCuandoDniTerminaEnNumero(){
        $dni = '123456789';

        try{
            $sut = new DniValidador($dni);
        }
        finally{
            $this->expectException(DomainException::class);
            $this->expectExceptionMessage('dni termina en número');
        }
    }     
    
    /**
     * @covers ::__construct    
     * @dataProvider providerDniLetraFinalIncorrecta
     */
    public function testDeberiaFallarCuandoDniTerminaEnLetraIncorrecta(string $dni){
//        $dni = '12345678I';

        try{
            $sut = new DniValidador($dni);
        }
        finally{
            $this->expectException(DomainException::class);
            $this->expectExceptionMessage('dni termina letra incorrecta');
        }
    }     


    public function providerDniLetraFinalIncorrecta(){
        return [
            ['12345678I'],
            ['12345678O'],
            ['12345678U'],
//            ['12345678Ñ'],
        ];
    }


    /**
     * @covers ::__construct    
     */
    public function testDeberiaFallarCuandoDniContieneLetraEnMedio(){
        $dni = '1234A567A';

        try{
            $sut = new DniValidador($dni);
        }
        finally{
            $this->expectException(DomainException::class);
            $this->expectExceptionMessage('dni contiene letra en medio');
        }
    }      
}