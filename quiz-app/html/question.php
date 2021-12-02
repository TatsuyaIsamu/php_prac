<?php

require __DIR__.'/../lib/functions.php';

$id = escape($_GET['id'] ?? '');

$data = fetchById($id);

if (!$data) {
  error404();
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

$assignData = [
  'id' => $id,
  'question' => $question,
  'answers' => $answers
];

loadTemplate('question', $assignData);