<?php

   $paises = [ 
	'México'  => 'Monterrey, Querétaro, Guadalajara',
	
 	'Colombia' => 'Bogota, Cartagena, Medellin',
	
	'Bogota' => 'Chapinero, Santa Fe, Tunjuelito',
	
	'Alemania' => 'Berlín, Colonia, Bremen',
	
	'Brasil' => 'Río de Janeiro, Manaos, Belém'

   ];

   foreach($paises as $nompais => $ciudades)
    {
	echo $nompais.": ".$ciudades."<br>";
    }

?>

