<?php
/* @var $user string */
/* @var $oldValue string */
/* @var $newValue string */
/* @var $eventText string */
/* @var $body string */
/* @var $bodyDatetime string */
?>

<div class="bg-success ">
    <?php echo "$eventText " .
        "<span class='badge badge-pill badge-warning'>" . ($oldValue ?? "<i>not set</i>") . "</span>" .
        " &#8594; " .
        "<span class='badge badge-pill badge-success'>" . ($newValue ?? "<i>not set</i>") . "</span>";
    ?>

    <span><?= \app\widgets\DateTime\DateTime::widget(['dateTime' => $bodyDatetime]) ?></span>
</div>

<?php if (isset($user)): ?>
    <div class="bg-info"><?= $user; ?></div>
<?php endif; ?>

<?php if (isset($body) && $body): ?>
    <div class="bg-info">
        <?php echo $body ?>
    </div>
<?php endif; ?>