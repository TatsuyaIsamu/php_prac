<?php
  session_start();
  require 'validation.php';
  header('X-FRAME-POTIONS:DENY');

  if(!empty($_POST)) {
    echo '<pre>';
    var_dump($_POST);
    echo '</pre>';

  }
  $pageFlag = 0;
  $errors = validation($_POST);

  if(!empty($_POST['btn_confirm']) && empty($errors)) {
    $pageFlag = 1;
  }
  if(!empty($_POST['btn_submit'])) {
    $pageFlag = 2;
  }

  function h($str)
  {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
  <?php if($pageFlag === 0) : ?>
    <?php
      if(!isset($_SESSION['csrfToken'])){
        $csrfToken = bin2hex(random_bytes(32));
        $_SESSION['csrfToken'] = $csrfToken;
      }
      $token = $_SESSION['csrfToken']
    ?>

    <?php if(!empty($errors) && !empty($_POST['btn_confirm'] )) : ?>
      <?php  echo '<ul>' ;?>
        <?php 
          foreach($errors as $error) {
            echo '<li>' .$error. '</li>';
          }
        ?>
      <?php echo '</ul>'; ?>
    <?php endif; ?>
    <form method="POST" action="input.php">
      氏名
      <input type="text" name="your_name" value="<?php if (!empty($_POST['your_name'])) {echo h($_POST['your_name']); }?>">
      <br>
      メールアドレス
      <input type="emaill" name="email" value="<?php if (!empty($_POST['email'])) {echo h($_POST['email']);}?>">
      <br> 
      ホームページ
      <input type="url" name="url" value="<?php if (!empty($_POST['url'])) {echo h($_POST['url']);}?>"> 
      <br>
      性別
      <input type="radio" name="gender" value="0"
        <?php if(isset($_POST['gender']) && $_POST['gender'] === '0'){ echo 'checked'; } ?>
      >男性
      <input type="radio" name="gender" value="1"
      <?php if(isset($_POST['gender']) && $_POST['gender'] === '1'){ echo 'checked'; } ?>
      >女性
      <br>
      年齢
      <select name="age">
        <option value="0">選択してください</option>
        <option value="1">〜１９歳</option>
        <option value="2">２０〜２９歳</option>
        <option value="3">３０〜３９歳</option>
        <option value="4">４０〜４９歳</option>
        <option value="5">５０〜５９歳</option>
        <option value="6">６０歳〜</option>
      </select>
      <br>
      お問い合わせ内容
      <textarea name="contact" id="" cols="30" rows="10">
      <?php if (!empty($_POST['contact'])) {echo h($_POST['contact']);}?>
      </textarea>
      <br>
      <input type="checkbox" name="caution" value="1">注意事項にチェックする
      <br>
      <input type="submit" name="btn_confirm" value="確認する">
      <input type="hidden" name="csrf" value="<?= $token ?>">
      <br>
    </form>
  <?php endif; ?>
  <?php if($pageFlag === 1) : ?>
    <?php if($_POST['csrf'] === $_SESSION['csrfToken']) :?>
      <form method="POST" action="input.php">
        氏名
        <?= $_POST['your_name'] ?>
        <br>
        メールアドレス
        <?= $_POST['email'] ?>
        <br>
        ホームページ
        <?php echo h($_POST['url']); ?>
        <br>
        性別
        <?php 
          if($_POST['gender'] === '0'){ echo '男性' ;}
          if($_POST['gender'] === '1'){ echo '女性';}
        ?>
        <br>
        年齢
        <?php
          if($_POST['age'] === '1') { echo '１９歳';}
          if($_POST['age'] === '2') { echo '２０から２９歳';}
          if($_POST['age'] === '3') { echo '３０〜３９歳';}
          if($_POST['age'] === '4') { echo '４０〜４９歳';}
          if($_POST['age'] === '5') { echo '５０〜５９歳';}
          if($_POST['age'] === '6') { echo '６０歳〜';}
        ?>
        <br>
        お問い合わせ内容
        <?php echo h($_POST['contact']); ?>
        <br>
        <input type="submit" name="btn_submit" value="確認する">
        <input type="submit" name="back" value="戻る">
        <input type="hidden" name="your_name" value="<?= h($_POST['your_name']); ?>">
        <input type="hidden" name="email" value="<?= h($_POST['email']); ?>">
        <input type="hidden" name="url" value="<?= h($_POST['url']); ?>">
        <input type="hidden" name="gender" value="<?= h($_POST['gender']); ?>">
        <input type="hidden" name="age" value="<?= h($_POST['age']); ?>">
        <input type="hidden" name="contact" value="<?= h($_POST['contact']); ?>">
        <input type="hidden" name="csrf" value="<?= h($_POST['csrf']); ?>">
        <br>
      </form>
    <?php endif; ?>
  <?php endif; ?>
  <?php if($pageFlag === 2) : ?>
    <?php if($_POST['csrf'] === $_SESSION['csrfToken']): ?>
      <?php require '../mainte/insert.php'; 
        insertContact($_POST);
      ?>

    送信が完了しました
      <?php unset($_SESSION['csrfToken']); ?>
    <?php endif; ?>
  <?php endif; ?>

</body>
</html>

