<?php
/**
 * @title: Headline
 * @description: Headline Element mit Hintergrundfarbe
 * @icon: editor-bold
 *
 * @date 22.07.2021
 * @author Timo Gede <timo@timogede.com>
 *
 * @var $block array
 */

$id = 'headline--' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

$headline = get_field('headline') ?: '';
$subline = get_field('subline') ?: '';
$color = get_field('color')?: 'black';
$alignment = get_field('alignment') ?: 'left';
$push = get_field('push') ?: false;
$hand_selector = get_field('hand_selector') ?: false;
if ($hand_selector){
    $alignment = 'left';
    $push = false;
}
?>
<article class="headline container headline--color-<?= $color ?> headline--alignment-<?= $alignment ?> headline-push--<?php if ($push): ?>visible<?php endif; ?> headline-hand--<?php if ($hand_selector): ?>visible<?php endif; ?>">
    <div class="headline__inside container__inside" id="<?=$id?>">
            <div class="headline__text-column headline__column">
                <div class="headline__text-wrap">
                    <?php if ($headline): ?>
                        <h2><?= $headline ?></h2>
                    <?php endif; ?>
                    <?php if ($subline): ?>
                        <h3><?= $subline ?></h3>
                    <?php endif; ?>
            </div>
            <?php if ($hand_selector): ?>
            <div class="headline__hand-image">
            <?php include( get_template_directory() . '/assets/images/workandout.svg' ); ?>
                    </div>
                    <?php endif; ?>
        </div>
    </div>
</article>
