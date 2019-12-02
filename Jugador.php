<?php
namespace juego;

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