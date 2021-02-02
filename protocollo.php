<?php
 $obj = filter_input(INPUT_POST, 'obj' , FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
 $ufficio = $_POST["ufficio"];
 $io = $_POST["io"];
 $mittente = "I.T.T. G. Giorgi - Brindisi";
 $data = date('d/m/Y');
 

 echo "<p>Arrivata richiesta di protocollo per: {$obj}</p>";

 $proto = file_get_contents("number.txt");
 $proto++;
 file_put_contents("number.txt", $proto);
 $proto = str_pad($proto, 7, '0', STR_PAD_LEFT);

echo "******************************************<br>
      * {$mittente} - {$ufficio}<br>
      * Prot. {$proto} Del: {$data}<br>
      * ({$io})<br>
      ******************************************<br>";

 $f = fopen("proto.txt", "a") 
 				or die("Impossibile aprire file -1 ");
 fwrite($f, "Oggetto: {$obj}
Mittente: {$mittente} - Ufficio: {$ufficio}
Prot. {$proto} Del: {$data}
Tipo: ({$io})\n\n");
 fclose($f);
?>
