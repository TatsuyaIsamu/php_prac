<?php
require __DIR__.'/../lib/functions.php';

$id = $_POST['id'] ?? '';
$selectedAnswer = $_POST['selectedAnswer'] ?? '';

$data = fetchById($id);

if (!$data) {
  header('HTTP/1.1 404 Not Found');

  header('Content-Type: text/html; charset=UTF-8');
  // include __DIR__.'/../templete/404.tpl.php';
  $response = [
    'message' => 'みつかりません'
  ];

  echo json_encode($response);
  exit(0);
}

$question = $data[1];

$answers = [
  'A' => $data[2],
  'B' => $data[3],
  'C' => $data[4],
  'D' => $data[5],
];

$correctAnswer = strtoupper($data[6]);
$correntAnswerValue = nl2br($answers[$correctAnswer]);
$explanation = nl2br($data[7]);

$result = $selectedAnswer ===  $correctAnswer;


$response = [
  'result' => $result,
  'correctAnswer' => $correctAnswer,
  'correntAnswerValue' => $correntAnswerValue,
  'explanation' => $explanation
];

echo(json_encode($response));