<?php 
namespace juego;
require_once 'vendor/autoload.php';

class Juego 
{
   public $baraja;
   public $usuario;

   public function __construct($nombre)
   {      
      $this->usuario=new Jugador($nombre);   
      echo $this->usuario->nombre;    
     
      $palos = array('oros','copas','espadas','bastos');
      $numeros = array("1","2","3","4","5","6","7","10","11","12");
      
      foreach ($palos as $palo) 
      {
        foreach ($numeros as $numero) 
        {
           $this->baraja[] = new Carta($palo, $numero);
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
        if (!$this->usuario->compruebaPasa())
        {
           $carta_superior=reset($this->baraja);   // extrae la primera (superior) carta del mazo 
           $this->usuario->jugada[]=new Carta($carta_superior->getPalo(), $carta_superior->getNumero()); // añadir la carta a baraja jugador
           array_shift($this->baraja);    // elimina primera carta del mazo de cartas
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
      echo $this->usuario->nombre;
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
