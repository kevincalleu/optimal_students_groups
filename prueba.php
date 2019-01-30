<html>

<?php 

// Se ejecuta el algoritmo de python

$command = 'python /var/www/html/moodle/mod/page/Data.py'; 
exec($command, $out, $status);

// Se lee el json generado por el algoritmo de python

$string = file_get_contents("/home/kevin/Escritorio/data.json");
$json_a = json_decode($string, true);

?>



<?php

// Se crea la página con la información generada

echo <<<END
<font size=6> Número de estudiantes </font> <br> <br>
En esta evaluación hay {$json_a['n_estudiantes']} estudiantes Distribuidos entre los dominios (O, C, E, A, N) que definen sus rasgos de personalidad.
END;

?>

<html>
<center>
<img src="numero_estudiantes.png" width="550" height="450">
</center>

<?php

echo <<<END
<font size=6> Histograma de los Dominios </font> <br> <br>
END;

?>

<html>
<center>
<img src="hist_dominios.png" width="850" height="550">
</center>

<?php

echo <<<END
<font size=6> Distribución de los dominios </font> <br> <br>
END;

?>

<html>
<center>
<img src="distribución.png" width="780" height="800">
</center>

<?php

echo <<<END
<font size=6> Conformación de Grupos </font> <br> <br>
Los grupos se forman de la siguiente manera: <br> <br>
END;

//foreach ($json_a as $item) {
    //echo $item;
//}

//echo join('<br> <br>', $json_a);

//array_walk($json_a, create_function('$a', 'echo $a;'));

$count = count($json_a);

foreach ($json_a as $key => $val) {
    if (--$count <= 1) {
        break;
    }
    echo "$val\n <br> <br>";
}

?>

<?php

echo <<<END
<font size=6> Equilibrio de los dominios </font> <br> <br>
El pentagono muestra los 5 dominios y se compara el equilibrio de dominios entre los grupos: <br> <br>
END;

?>

<html>
<center>
<img src="pentagono.png" width="620" height="480">
</center>


</html>
