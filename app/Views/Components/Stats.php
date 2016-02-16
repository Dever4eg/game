<p>

    <a title="Персонаж" href="/game/user">
        <span class="span_img_head">
            <img src="/img/header_img/steave.png">
        </span>
        <span class="span_text_head">
            <?php echo $stats->login ?>
        </span>
    </a>

    <a title="" class="logout" href="/game/logout">
        выйти
    </a>

    <a title="Уровень" href="/game">
        <span class="span_img_head">
            &nbsp;<img src="/img/header_img/level.png">
        </span>
        <span class="span_text_head">
            <?php echo $stats->level; ?>
        </span>
    </a>

    <a title="Енергия" href="/game">
        <span class="span_img_head">
            &nbsp;<img src="/img/header_img/energy.png">
        </span>
        <span class="span_text_head">
            <?php echo $stats->energy; ?>
        </span>
    </a>

    <a title="Здоровье" href="/game">
        <span class="span_img_head">
            &nbsp;<img src="/img/header_img/heart.png">
        </span>
        <span class="span_text_head">
            <?php echo $stats->health; ?>
        </span>
    </a>

    <a title="Кредиты" href="/game">
        <span class="span_img_head">
            &nbsp;<img src="/img/header_img/credit.png">
        </span>
        <span class="span_text_head">
            <?php echo $stats->credits; ?>
        </span>
    </a>

    <a title="Изумруды" href="/game">
        <span class="span_img_head">
            &nbsp;<img src="/img/header_img/emerald.png">
        </span>
        <span class="span_text_head">
            <?php echo $stats->emerald; ?>
        </span>
    </a>
</p>