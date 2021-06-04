<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>
<h1>Notes</h1>
<ul>
<?php foreach ($notes as $note): ?>
    <li>
        <?= Html::encode("{$note->title}") ?>:
        <?= $note->content ?>
    </li>
<?php endforeach; ?>
</ul>

<?= LinkPager::widget(['pagination' => $pagination]) ?>