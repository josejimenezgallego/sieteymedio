<?php
namespace juego;

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
           //$baraja[] = array("numero"=>$numero, "palo"=>$palo);
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


class Carta 
{
   protected $palo;
   protected $numero;

   public function __construct($palo,$numero)
   {      
        $this->palo = $palo;
        $this->numero = $numero;
   }

    // DEVUELVE NOMBRE USUARIO
    public function getValorCarta()   
    {
        switch ($this->numero) 
        {
           case "10":
           case "11":
           case "12":
                $puntos=0.5;
                break;
            default:
               $puntos=(int) $numero;
               break;
        }             
        return $puntos;
    }

    // GUARDA PALO
    public function setPalo($palo)   
    {
         $this->palo=$palo;         
    }

    // DEVUELVE PALO
    public function getPalo()   
    {
        return $this->palo;
    }    
    // GUARDA NÚMERO
    public function setNumero($numero)   
    {
         $this->numero=$numero;         
    }

    // DEVUELVE NÚMERO
    public function getNumero()   
    {
        return $this->numero;
    }  
 }


 class Jugador
{
   // ATRIBUTOS
   public $nombre="";
   public $jugada="";

   public function __construct($nombre)
   {      
      $this->nombre=$nombre;
      $this->jugada=array();
   }

    // DEVUELBE TRUE SI LA SUMA DE LAS CARTAS > 7.5
    public function compruebaPasa()   
    {
      if ($this->compruebaJugada()>7.5)
         return true;
         else
         return false; 
    }
    
    // DEVUELBE ACTUAL PUNTUACIÓN
    public function compruebaJugada()   
    {
        $puntos=0;

        foreach($this->jugada as $carta)
          {
            $puntos+=$carta->getValorCarta();              
          }
        return $puntos;
       
    }

    // GUARDA NOMBRE USUARIO
    public function setNombreUsuario($nombre)   
    {
         $this->nombre=$nombre;         
    }

    // DEVUELVE NOMBRE USUARIO
    public function getNombreUsuario()   
    {
        return $this->nombre;
    }
    // GUARDA JUGADA
    public function setJugadaUsuario($jugada)   
    {
         $this->jugada=$jugada;         
    }

    // DEVUELVE JUGADA
    public function getJugadaUsuario()   
    {
        return $this->jugada;
    }
 } 

 ?>
