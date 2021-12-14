@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form method="POST" action="{{route('contact.store')}}">
                        @csrf
                        氏名
                        <input type="text" name="your_name" value="<?php if (!empty($_POST['your_name'])) {echo h($_POST['your_name']); }?>">
                        <br>
                        メールアドレス
                        <input type="email" name="email" value="<?php if (!empty($_POST['email'])) {echo h($_POST['email']);}?>">
                        <br>
                        件名
                        <input type="text" name="title" value="<?php if (!empty($_POST['title'])) {echo h($_POST['title']);}?>">
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
                        <br>
                    </form>
                    create
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
