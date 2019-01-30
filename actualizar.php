#!/usr/bin/php
<?php

$command = 'php /var/www/html/prueba.php';
exec($command, $out, $status);

sleep(5);

echo 	'<script type="text/javascript">	
	var varjs="'.$command.'";   
	var prueba="/moodle/mod/hvp/view.php?id=10";
	var pagina=prueba.concat(varjs);
	window.location.assign(pagina); 
	</script>'; 

//$result = json_decode(exec('python /var/www/html/moodle/mod/page/Data.py'), true);
//$command = 'python /var/www/html/moodle/mod/page/Data.py'; 
   
        
?>
