<?php 
  // $contactFile = '.contact.dat';

  // $fileContents = file_get_contents($contactFile);
  // // echo $fileContents;
  // // file_put_contents($contactFile, 'テストです');

  // file_put_contents($contactFile, 'テストです', FILE_APPEND);
  // $allData = file($contactFile);

  // foreach($allData as $lineData){
  //   $lines = explode(',', $lineData);
  //   echo $lines[0]. '<br>';
  //   echo $lines[1]. '<br>';
  //   echo $lines[2]. '<br>';
  // }
  $contactFile = '.contact.dat';
  $contents = fopen($contactFile, 'a+');
  $addText = '１行追記' . "\n";

  fwrite($contents, $addText);
  fclose($contents);
?>