<p>
    <span>
        <a href="/game/user">
            <span class="span_img_head">
                <img src="/resources/img/header_img/steave.png">
            </span>
            <span class="span_text_head">
                <?php echo $login ?>
            </span>
        </a>
    </span>
    <span>
        (<a href="/game/logout">
            выйти
        </a>)
    </span>
    <span>
        <a href="/game">
            <span class="span_img_head">
                &nbsp;<img src="/resources/img/header_img/level.png">
            </span>
            <span class="span_text_head">
                <?php echo $stats->level; ?>
            </span>
        </a>
    </span>
    <span>
        <a href="/game">
            <span class="span_img_head">
                &nbsp;<img src="/resources/img/header_img/energy.png">
            </span>
            <span class="span_text_head">
                <?php echo $stats->energy; ?>
            </span>
        </a>
    </span>
    <span>
        <a href="/game">
            <span class="span_img_head">
                &nbsp;<img src="/resources/img/header_img/heart.png">
            </span>
            <span class="span_text_head">
                <?php echo $stats->health; ?>
            </span>
        </a>
    </span>
    <span>
        <a href="/game">
            <span class="span_img_head">
                &nbsp;<img src="/resources/img/header_img/credit.png">
            </span>
            <span class="span_text_head">
                <?php echo $stats->credits; ?>
            </span>
        </a>
    </span>
    <span>
        <a href="/game">
            <span class="span_img_head">
                &nbsp;<img src="/resources/img/header_img/lapis.png">
            </span>
            <span class="span_text_head">
                <?php echo $stats->lapis; ?>
            </span>
        </a>
    </span>
    <span>
        <a href="/game">
            <span class="span_img_head">
                &nbsp;<img src="/resources/img/header_img/emerald.png">
            </span>
            <span class="span_text_head">
                <?php echo $stats->emerald; ?>
            </span>
        </a>
    </span>
</p>