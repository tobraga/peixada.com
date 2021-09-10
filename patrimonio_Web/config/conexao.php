<?php

//Criar as constantes com as credencias de acesso ao banco de dados
    $host = "localhost";    
    $db   = "peixada";
    $user = "root";
    $pass = "";

try {
  $conn = new PDO('mysql:host=localhost;dbname=peixada', $user, $pass);
  $stmt = $conn->prepare('SELECT * FROM peixada WHERE idLogin = :idLogin');
  $stmt->execute(array('idLogin' => $idLogin));

  $result = $stmt->fetchAll();

  if ( count($result) ) {
    foreach($result as $row) {
      print_r($row);
    }
  } else {
    echo "Nennhum resultado retornado.";
  }
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}

 ?>