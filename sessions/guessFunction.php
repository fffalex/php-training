<?php
/**
* @param $date an String  that represent a date, format: M/D/YYYY HH:ii
* La funcion recibe un parametro string y devuelve la cantidad de tiempo transcurrido
* entre la fecha ingresada y el momento justo que se llamó a la función, representada en minutos.
*/
function guess($date)
{
  //Crea una fecha con el tiempo actual
  $today = date_create('now');
  
//Crea una fecha con el string recibido como parametro
  $date1 = date_create($date);
  
//Convierte la fecha en segundos desde el año 1900 (fecha Unix)
  $today = date_timestamp_get($today); //$today to seconds
  $date1 = date_timestamp_get($date1); // $date1 to seconds
  
//Calcula la diferencia entre la fecha actual e ingresada y divide por 60 para expresarla en minutos
  $interval = ($today - $date1) / 60;
  
//devuelve el intervalo de tiempo
  return $interval;
}

//usage
 echo guess('10/09/2014 20:30');
 
 //
