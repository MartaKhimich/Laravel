<?php foreach($categories as $c): ?>
    <div style="border: 1px solid green">
        <h2><?=$c['category_id']?></h2>
        <p><?=$c['news_1']?></p>
        <p><?=$c['news_2']?></p>
        <p><?=$c['news_3']?></p>
        <p><?=$c['news_4']?></p>
        <a href="<?=route('category.show', ['id' => $c['category_id']])?>">Далее</a>
    </div>
<?php endforeach; ?>
