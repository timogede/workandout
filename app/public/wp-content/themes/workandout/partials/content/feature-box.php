<?php
/**
 * @title: Feature-Box
 * @description: Feature-Box Element für z.B. Vorteile von Firmensport
 * @icon: admin-tools
 *
 * @date 22.07.2021
 * @author Timo Gede <timo@timogede.com>
 *
 * @var $block array
 */
if( isset( $block['data']['preview_image_help'] )  ) :    /* rendering in inserter preview  */

    echo '<img src="'. $block['data']['preview_image_help'] .'" style="width:100%; height:auto;">';


else : /* rendering in editor body */
$id = 'feature-box--' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}
$menu_link_id = get_field('menu_link_id')?: '';
$extra_text = get_field('extra_text')?: '';
$extra_text_link = get_field('extra_text_link')?: '';
$items = get_field_object('items');
$element_headline = get_field('element_headline')?: '';
$color = get_field('color')?: '';
$element_subline = get_field('element_subline')?: '';
//count amount if items so that i can add class
if(!empty($items['value'])) {
    $textbox_count = count($items['value']);
}

?>
<article class="feature-box container feature-box__color--<?=$color?>" id=<?$menu_link_id?>>
    <div class="feature-box__inside container__inside" id="<?=$id?>">
    <?php if ($element_subline): ?><h4><?= $element_subline ?></h4><?php endif; ?>
    <?php if ($element_headline): ?>
        <h2><?= $element_headline ?></h2>
        <div class="feature-box__line">

        </div>
        <?php endif; ?>
        <div class="feature-box__items feature-box__items--items-<?=$textbox_count?>">
        <?php if (is_array($items['value'])): foreach (
                $items['value'] as $item
            ): ?>
            <div class="feature-box__item">
                <div class="feature-box__headline-wrap">
                    <?php if ($item['headline']): ?><h3><?= $item['headline'] ?></h3><?php endif; ?>
                </div>
                <div class="feature-box__subline-wrap">
                    <?php if ($item['subline']): ?><?= $item['subline'] ?> <?php endif; ?>
                </div>
              
            </div>
            <?php endforeach; endif; ?>
        </div>
       
        <div class="feature-box__extra-text">
        <?php if ($extra_text):?>
            <a class="feature-box__button button button--<?=$color?>" href="<?=$extra_text_link?>"><?=$extra_text?></a>
        <?php endif; ?>
        </div>
     
    </div>
</article>
<?php endif; ?>