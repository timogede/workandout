<?php
/**
 * @title: Accordion
 * @description: Accordion Element für z.B. FAQs oder Good to Know
 * @icon: list-view
 *
 * @date 22.07.2021
 * @author Timo Gede <timo@timogede.com>
 *
 * @var $block array
 */
if( isset( $block['data']['preview_image_help'] )  ) :    /* rendering in inserter preview  */

    echo '<img src="'. $block['data']['preview_image_help'] .'" style="width:100%; height:auto;">';


else : /* rendering in editor body */
$id = 'accordion--' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}
$items = get_field_object('items');
$accordion_content = get_field('accordion_content') ?: '';

?>
<article class="accordion container container--margin">
    <div class="accordion__inside container__inside" id="<?=$id?>">
    <div class="accordion__items">
        <?php if (is_array($items['value'])): foreach (
                $items['value'] as $item
            ): ?>
            <div class="accordion__item">
                <div class="accordion__headline-wrap">
                    <?php if ($item['headline']): ?>
                        <h3><?= $item['headline'] ?></h3>
                    <?php endif; ?>
                </div>
                <div class="accordion__content-wrap">
                    <?php if ($item['content']): ?><?= $item['content'] ?> <?php endif; ?>
                </div>
              
            </div>
            <?php endforeach; endif; ?>
        </div>
    </div>
</article>
<?php endif;?>