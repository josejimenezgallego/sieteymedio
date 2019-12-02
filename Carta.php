<?php 
namespace juego;

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
 ?>