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
if( isset( $block['data']['preview_image_help'] )  ) :    /* rendering in inserter preview  */

    echo '<img src="'. $block['data']['preview_image_help'] .'" style="width:100%; height:auto;">';


else : /* rendering in editor body */
$id = 'logo-carousel--' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}
$menu_link_id = get_field('menu_link_id')?: '';
$items = get_field_object('items');
?>

<article class="logo-carousel container" id=<?$menu_link_id?>>
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
<?php endif;?>