<?php
/**
 * @title: Logo Carousel
 * @description: Logo Carousel
 * @icon: ellipsis
 *
 * @date 22.07.2021
 * @author Timo Gede <timo@timogede.com>
 *
 * @var $block array
 */

$id = 'logo-carousel--' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

$items = get_field_object('items');
?>

<article class="logo-carousel container">
    <div class="logo-carousel__inside container__inside">
    <div class="logo-carousel__items">
            <?php if (is_array($items['value'])): foreach (
                $items['value'] as $item
            ): ?>
                <div class="logo-carousel__item">
                    <a href="<?php if($item['image_link']):?><?=$item['image_link']?><?php endif;?>" target="_blank">
                    <img src="<?php if($item['image']['url']):?><?=$item['image']['url']?><?php endif;?>" class="logo-carousel__image">
                    </a>
                </div>
        <?php endforeach; endif; ?>
    </div>
    </div>

</article>