<?php
use Game\Classes\Auth;

?>
<!DOCTYPE html>
<html>
<head>
    <title> The Craft </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" type="text/css" href="/resources/css/style.css"/>

    <!--<script src="https://www.google.com/recaptcha/api.js" async defer></script>-->

</head>
<body class="">
<div id="game_area">
    <div id="notification">
        <br/>
        <?php if (!empty($notification)): ?>
            <div class="notification_text"> <?php echo $notification; ?> </div>
        <?php endif; ?>
        <br/>
    </div>

    <div id="header">
        <div class="logo"><a title="Главная" href="/"> <img src="/resources/img/name_img.png" alt="The craft"/> </a>
        </div>

        <?php if (isset($StatsShow) && Auth::IsAuth()): ?>
            <div class="stats">
                <?php include_once __DIR__ . '/../Components/Stats.php'; ?>
            </div>
        <?php endif; ?>
    </div>

    <div id="content">
        <?php if (!empty($content)) echo $content; ?>
    </div>
    <div id="footer">
        <br>
        <div class="center">
            <a href="/other/aboutGame"> Об игре </a>&nbsp;
            <a href="/other/regulations"> Правила </a>&nbsp;
            <a href="/other/knowBase"> База знаний </a>&nbsp;
        </div>
        <br>

        <?php if (!empty($footer)): ?>
            <div class="center">
                <?php echo $footer; ?>
            </div>
        <?php endif; ?>

        <!--mesto.zp.ua-->
        <a style="text-decoration: none;" href="http://mesto.zp.ua/">
            <img src="http://ad.mesto.zp.ua/img.gif" border=0 width=88 height=31 alt="Регистрация доменов, хостинг">
        </a>
        <!--/mesto.zp.ua-->

        <br/>
        <div class="center"> 2015 &copy; Все права защищены</div>
        <br/>
    </div>
</div>
</body>
</html>