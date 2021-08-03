<?php
/**
 * @title: Text-Box
 * @description: text-box Element für z.B. FAQ's
 * @icon: businessperson
 *
 * @date 22.07.2021
 * @author Timo Gede <timo@timogede.com>
 *
 * @var $block array
 */

$id = 'text-box--' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}
$extra_text = get_field('extra_text')?: '';
$items = get_field_object('items');
//count amount if items so that i can add class
$textbox_count = count($items['value']);
?>
<article class="text-box container">
    <div class="text-box__inside container__inside" id="<?=$id?>">
        <div class="text-box__items text-box__items--items-<?=$text-box_count?>">
        <?php if (is_array($items['value'])): foreach (
                $items['value'] as $item
            ): ?>
            <div class="text-box__item">
                <div class="text-box__headline-wrap">
                    <?php if ($item['headline']): ?><h3><?= $item['headline'] ?></h3><?php endif; ?>
                </div>
                <div class="text-box__subline-wrap">
                    <?php if ($item['subline']): ?><?= $item['subline'] ?> <?php endif; ?>
                </div>
              
            </div>
            <?php endforeach; endif; ?>
        </div>
       
        <div class="text-box__extra-text">
        <?php if ($extra_text):?>
            <p><?=$extra_text?></p>
        <?php endif; ?>
        </div>
     
    </div>
</article>
