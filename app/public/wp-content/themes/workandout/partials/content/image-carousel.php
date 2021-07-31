<?php
/**
 * @title: Bilder Carousel
 * @description: Bilder Carousel
 * @icon: columns
 *
 * @date 22.07.2021
 * @author Timo Gede <timo@timogede.com>
 *
 * @var $block array
 */

$id = 'image-carousel--' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

$items = get_field_object('items');
?>

<article class="image-carousel container">
<div class="image-carousel__slick-arrows">
        <div class="image-carousel__slick-arrow prev-arrow"><?php include( get_template_directory() . '/assets/images/chevron-right-regular.svg' ); ?></div>
        <div class="image-carousel__slick-arrow next-arrow"><?php include( get_template_directory() . '/assets/images/chevron-right-regular.svg' ); ?></div>
    </div>
    <div class="image-carousel__items">
            <?php if (is_array($items['value'])): foreach (
                $items['value'] as $item
            ): ?>
        <div class="image-carousel__item image-carousel__hand-color--<?php if ($item['svg_color']): ?><?= $item['svg_color'] ?> <?php endif; ?> ">
            <div class="image-carousel__flip-container">
                <div class="image-carousel__flip">
                    <div class="image-carousel__image" style="background-image:url(<?php if ($item['image']): ?><?= $item['image']['url'] ?> <?php endif; ?>); background-position:<?php if ($item['image_alignment']): ?><?= $item['image_alignment'] ?> <?php endif; ?>">
                    </div>
                    <div class="image-carousel__description">
                    <?php if ($item['description']): ?><?= $item['description'] ?> <?php endif; ?>
                    </div>
                    </div>
                    <div class="image-carousel__short-description">
                        <h3><?php if ($item['headline']): ?><?= $item['headline'] ?> <?php endif; ?></h3>
                        <p><?php if ($item['subline']): ?><?= $item['subline'] ?> <?php endif; ?></p>
                        <a class="button button--<?php if ($item['button_color']): ?><?= $item['button_color'] ?> <?php endif; ?>" href=""><?php if ($item['button_text']): ?><?= $item['button_text'] ?> <?php endif; ?></a>
                            <div class="image-carousel__hand"><?php include( get_template_directory() . '/assets/images/workandout.svg' ); ?></div>
                    </div>
                
            </div>
        </div>
        <?php endforeach; endif; ?>
    </div>

</article>
