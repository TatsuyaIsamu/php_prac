<?php 
  function validation($request) {
    $errors = [];

    if(empty($request['your_name']) || 20 < mb_strlen($request['your_name'])) {
      $errors[] = '氏名は必須です。２０文字以内で入力してください';
    }
    if(empty($request['email']) || !filter_var($request['email'], FILTER_VALIDATE_EMAIL)) {
      $errors[] = 'メールアドレスは必須です';
    }
    if(!empty($request['url'])) {
      if(!filter_var($request['url'], FILTER_VALIDATE_URL)) {
        $errors[] = 'ホームページは正しい形式で入力してください';
      }
    }
    if(empty($request['contact']) || 200 < mb_strlen($request['contact'])) {
      $errors[] = 'お問い合わせ内容は必須です。２００文字以内で入力してください';
    }
    if(empty($request['caution']) ) {
      $errors[] = '注意事項を御確認ください';
    }
    if(!isset($request['gender'])) {
      $errors[] = '性別は必須です';
    }
    if(empty($request['age']) || 6 < $request['age']){
      $errors[] = '年齢は必須です';
    }

    return $errors;
  }
?>