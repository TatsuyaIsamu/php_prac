<?php

function loadTemplate($filename, array $assignData = []) {
  extract($assignData);
  include __DIR__.'/../templete/'.$filename.'.tpl.php';
}

function error404() {
  header('HTTP/1.1 404 Not Found');

  header('Content-Type: text/html; charset=UTF-8');
  LoadTemplate('404');
  exit(0);

}

function fetchAll() {
  $handler = fopen(__DIR__.'/data.csv', 'r');
  $questions = [];
  while ($row = fgetcsv($handler)) {
    $questions[] = $row;
  }
  fclose($handler);
  return $questions;
}

function fetchById($id) {
  $handler = fopen(__DIR__.'/data.csv', 'r');
  $question = [];
  while ($row = fgetcsv($handler)) {
    if ($row[0] === $id) {
      $question = $row;
      break;
    }
  }
  
  fclose($handler);
  return $question;
}

function generateFormattedData($data)
{
    // 構造化した配列を作成する
    $formattedData = [
        'id' => escape($data[0]),
        'question' => escape($data[1], true),
        'answers' => [
            'A' => escape($data[2]),
            'B' => escape($data[3]),
            'C' => escape($data[4]),
            'D' => escape($data[5]),
        ],
        'correctAnswer' => escape(strtoupper($data[6])),
        'explanation' => escape($data[7], true),
    ];

    return $formattedData;
}

/**
 * HTMLに組み込むために必要なエスケープ処理を行う
 *
 * @param string $data エスケープしたい情報
 * @param bool $nl2br 改行を<br>に変換する場合はtrue
 *
 * @return string エスケープ済の文字列
 */
function escape($data, $nl2br = false)
{
    // HTMLに埋め込んでも大丈夫な文字に変換する
    $convertedData = htmlspecialchars($data, ENT_HTML5);

    // 改行コードを<br>タグに変換するか判定
    if ($nl2br) {
        /// 改行コードを<br>タグに変換したものをを返却
        return nl2br($convertedData);
    }

    return $convertedData;
}