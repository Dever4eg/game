<a class="but_reload" href="/game/stock">
    <div class="panel">
        <h3 class="center">Склад</h3>
    </div>
    <br>
</a>

<?php if (isset($stock)): ?>

    <div class="resources">
        <h3 class="center">Ваши ресурсы:</h3>

        <div class="res">
            <h4 >Дерево</h4>
            <img src="" alt="">
            <?php echo $stock->wood; ?>
        </div>

        <div class="res">
            <h4 >Камень</h4>
            <img src="" alt="">
            <?php echo $stock->wood; ?>
        </div>
    </div>

<?php else: ?>
    <p>Ошибка!</p>
<?php endif; ?>
