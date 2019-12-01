<?php
use PHPUnit\Framework\TestCase;

require_once ("Juego.php");


class JuegoTest extends TestCase
{
	public function testCorrecto()
	{
		$cartasPrueba=[new Carta("copas",11),new Carta("oros",5),new Carta("espadas",5),new Carta("bastos",12),new Carta("oros",7)];
		$juego=new Juego("Paco");
		$juego->debugBaraja($cartasPrueba);
		$jugador=$juego->getJugador();
		$this->assertEquals($jugador->compruebaJugada(),0);		
		$juego->pideCarta();
		$this->assertEquals($jugador->compruebaPasa(),false);
	}
}
?>
