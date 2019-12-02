<?php
namespace juego;

use Jugador, Carta;

class Juego 
{
   private $baraja;
   private $usuario;

   public function __construct($nombre)
   {      
      $usuario=new Jugador($nombre);       
     
      $palos = array('oros','copas','espadas','bastos');
      $numeros = array("1","2","3","4","5","6","7","10","11","12");
      
      foreach ($palos as $palo) 
      {
        foreach ($numeros as $numero) 
        {
           //$baraja[] = array("numero"=>$numero, "palo"=>$palo);
           $baraja[] = new Carta($palo, $numero);
        }
      }
    }



    // BARAJAR: DESORDENAR LAS CARTAS
    public function iniciaJuego()   
    {
         shuffle($this->baraja);            
    }

    // PASA LA CARTA SUPERIOR A LA BARAJA DEL JUGUADOR
    public function pideCarta()   
    {
        if (!$usuario->compruebaPasa())
        {
           $carta_superior=reset($baraja);   // extrae la primera (superior) carta del mazo
           $usuario->jugada=array_push($carta_superior);    // añadir la carta a baraja jugador
           array_shift($baraja);    // elimina primera carta del mazo de cartas
        }
    }

    // ASIGNA ARRAY DE CARTAS AL USUARIO (solo para pruebas)
    public function debugBaraja($cartasPrueba)
    {
         $this->baraja=$cartasPrueba;         
    }

    // GUARDA JUGADOR
    public function setJugador($jugador)   
    {
         $this->usuario=$jugador;         
    }

    // DEVUELVE JUGADOR
    public function getJugador()   
    {       
      return $this->usuario;
    }

    // GUARDA BARAJA
    public function setBaraja($baraja)   
    {
         $this->baraja=$baraja;         
    }

    // DEVUELVE JUGADOR
    public function getBaraja()   
    {       
      return $this->baraja;
    }    

 }


 ?>
