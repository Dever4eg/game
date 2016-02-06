<a class="but_reload" href="/game/forest">
    <div class="panel">
        <h3 class="center">Лес</h3>
    </div>
    <br>
</a>

<div class="main_img"><img class="shadow" src="/resources/img/trees/spruce.png" alt="main_img"></div>
<br>

<div class="center">

    <?php if (!$forest->found): ?>
        <p>
            <a class="button_medium" href="/game/forest?act=find">Искать дерево</a>
        </p>
    <?php else: ?>
        <p>
            <?php if ($forest->state == 'find'): ?>
                Вы нашни дерево высотой <?php echo $forest->height; ?>
            <?php elseif ($forest->state == 'chopping'): ?>
                Осталось блоков: <?php echo $forest->height; ?>
            <?php endif; ?>
        </p>
        <p>
            <a class="button_medium" href="/game/forest?act=chop">Рубить</a>
        </p>
    <?php endif; ?>
    <!-- <p>Висота дерева: 5-16 блок</p> -->

</div>