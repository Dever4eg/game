<?php
use Dever4eg\Classes\Auth;

?>
<!DOCTYPE html>
<html>
<head>
    <title> The Craft </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" type="text/css" href="/css/style.css"/>

    <!--<script src="https://www.google.com/recaptcha/api.js" async defer></script>-->

</head>
<body class="">
<div id="wrap">
    <div id="notification">
        <?php if (!empty($notification)): ?>
            <?php echo $notification; ?>
        <?php endif; ?>
    </div>

    <div class="logo">
        <a title="Главная" href="/"> <img src="/img/name_img.png" alt="The craft"/> </a>
    </div>

    <div id="header">
        <?php if (!empty($stats)): ?>
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
            <a href="/Pages/aboutGame"> Об игре </a>&nbsp;
            <a href="/Pages/regulations"> Правила </a>&nbsp;
            <a href="/KnowBase"> База знаний </a>&nbsp;
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
        <div class="center"> <?php echo date('Y'); ?> &copy; Все права защищены</div>
        <br/>
    </div>
</div>
</body>
</html>