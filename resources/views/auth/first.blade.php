<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>Blog App</title>
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
<div class="container">
    <div class="first-container">
        <div class="header">
            <div class="header-wrapper">
                <h1>今起きいることを見つけよう！</h1>
                <h2>あなた好きを発見しよう！</h2>
                <h2>話題のトピックを追いかけよう！</h2>
                <h2>自分を表現しよう！</h2>
            </div>
        </div>
        <div class="main">
            <div class="main-container">
                <h3>アカウントを登録しよう！</h3>
                <div class="logIn-container">
                    <a href="{{ route('login') }}"><button class="btn logIn-btn">LogIn</button></a>
                </div>
                <div class="register-container">
                   <a href="{{ route('register')}}"> <button class="btn register-btn">Register</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>



