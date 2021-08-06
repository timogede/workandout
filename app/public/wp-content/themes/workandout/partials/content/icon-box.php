<?php
/**
 * @title: Icon-Box
 * @description: icon-box Element für z.B. Kontaktaufnahmeweg
 * @icon: buddicons-activity
 *
 * @date 22.07.2021
 * @author Timo Gede <timo@timogede.com>
 *
 * @var $block array
 */
if( isset( $block['data']['preview_image_help'] )  ) :    /* rendering in inserter preview  */

    echo '<img src="'. $block['data']['preview_image_help'] .'" style="width:100%; height:auto;">';


else : /* rendering in editor body */
$id = 'icon-box--' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}
$extra_text = get_field('extra_text')?: '';
$items = get_field_object('items');
$element_headline = get_field('element_headline')?: '';
//count amount if items so that i can add class
$iconbox_count = count($items['value']);
?>
<article class="icon-box container">
    <div class="icon-box__inside container__inside" id="<?=$id?>">
    <?php if ($element_headline): ?><h2><?= $element_headline ?></h2><?php endif; ?>
        <div class="icon-box__items icon-box__items--items-<?=$iconbox_count?>">
        <?php if (is_array($items['value'])): foreach (
                $items['value'] as $item
            ): ?>
            <div class="icon-box__item">
            <div class="icon-box__icon-wrap">
                    <?php if ($item['icon_name']): ?><i class="<?= $item['icon_name'] ?>"></i><?php endif; ?>
                </div>
                <div class="icon-box__headline-wrap">
                    <?php if ($item['headline']): ?><h3><?= $item['headline'] ?></h3><?php endif; ?>
                </div>
            </div>
            <?php endforeach; endif; ?>
        </div>
       
        <div class="icon-box__extra-text">
        <?php if ($extra_text):?>
            <?=$extra_text?>
        <?php endif; ?>
        </div>
     
    </div>
</article>
<?php endif; ?>
