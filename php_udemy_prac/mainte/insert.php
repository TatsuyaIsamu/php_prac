<?php

use function PHPSTORM_META\map;

function insertContact($request) {
  require 'db_connection.php';
  $params = [
    'id' => null,
    'your_name' => $request['your_name'],
    'email' => $request['email'],
    'url' => $request['url'],
    'gender' => $request['gender'],
    'age' => $request['age'],
    'contact' => $request['contact'],
    'created_at' => null
  ];
  
    $count = 0;
    $columns = '';
    $values = '';
  
    foreach(array_keys($params) as $key) {
      if($count++>0) {
        $columns .= ',';
        $values .= ',';
      }
      $columns .= $key;
      $values .= ':'.$key;
    }
    $sql = 'insert into contacts ('. $columns . ')values('. $values .')';
    // var_dump($sql);
    $stmt = $pdo->prepare($sql);
    // $stmt->bindValue('id', 2, PDO::PARAM_INT);
    $stmt->execute($params);
    // $result = $stmt->fetchAll();
}


  // $params = [
  //   'id' => null,
  //   'your_name' => 'なまえ',
  //   'email' => 'test@gmail.com',
  //   'url' => 'http://test.com',
  //   'gender' => '1',
  //   'age' => '2',
  //   'contact' => 'consta',
  //   'created_at' => null
  // ];
?>