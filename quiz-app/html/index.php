<?php

require __DIR__.'/../lib/functions.php';


$dataList = fetchAll();

if (!$dataList) {
  error404();
}

$questions = [];
foreach($dataList as $data) {
  $questions[] = generateFormattedData($data);
}




$answers = [
  'A' => $data[2],
  'B' => $data[3],
  'C' => $data[4],
  'D' => $data[5],
];

$correctAnswer = strtoupper($data[6]);
$correntAnswerValue = nl2br($answers[$correctAnswer]);
$explanation = nl2br($data[7]);

$assignData = [
  'questions' => $questions
];

loadTemplate('index', $assignData);