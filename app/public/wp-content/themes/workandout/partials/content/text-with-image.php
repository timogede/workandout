<?php
/**
 * @title: Text mit Bild
 * @description: Text auf einer Seite, Bild auf der anderen
 * @icon: align-pull-right
 *
 * @date 20.07.2021
 * @author Timo Gede <timo@timogede.com>
 *
 * @var $block array
 */

$id = 'text-with-image--' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

$headline = get_field('headline') ?: '';
$text = get_field('text') ?: '';
$image = get_field('image');
$button_1_text = get_field('button_1_text');
$button_1_link = get_field('button_1_link')?: '';
$button_1_color = get_field('button_1_color')?: 'white';
$button_2_text = get_field('button_2_text');
$button_2_link = get_field('button_2_link')?: '';
$button_2_color = get_field('button_2_color')?: 'white';
$image_position = get_field('image_position') ?: 'left';
?>
<article class="text-with-image container--margin text-with-image--image-<?= $image_position ?> image-full-width margin-bottom">
    <div class="text-with-image__inside container__inside" id="<?=$id?>">

        <div class="text-with-image__columns">
            <div class="text-with-image__image-column text-with-image__column">
                <?php if ($image): ?>
                    <figure class="text-with-image__image-wrap">
                        <img src="<?= $image['sizes']['large'] ?>"
                             alt="<?= $image['alt'] ?>"
                             class="text-with-image__image">
                        <?php if ($image['caption'] != ''): ?>
                            <figcaption
                                    class="text-with-image__image-caption"><?= $image['caption'] ?></figcaption>
                        <?php endif; ?>
                    </figure>
                <?php endif; ?>
            </div>

            <div class="text-with-image__text-column text-with-image__column">
                <div class="text-with-image__text-wrap">
                    <?php if ($headline): ?>
                        <h2><?= $headline ?></h2>
                    <?php endif; ?>
                    <div class="text-with-image__push-wrap">
                    <?php if ($text): ?>
                    <?= $text ?>
                    <?php endif; ?>
                    <?php if ($button_1_text): ?>
                    <a class="text-with-image__button-1 button button--<?=$button_1_color ?>" href=<?=$button_1_link ?>><?= $button_1_text ?></a>
                    <?php endif; ?>
                    <?php if ($button_2_text): ?>
                    <a class="text-with-image__button-2 button button--<?=$button_2_color ?>" href=<?=$button_2_link ?>><?= $button_2_text ?></a>
                    <?php endif; ?>
                </div>
                    </div>
            </div>
        </div>
    </div>
</article>
