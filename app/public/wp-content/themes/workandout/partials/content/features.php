<?php
/**
 * @title: Featurebox
 * @description: Features Element für z.B. Preise
 * @icon: screenoptions
 *
 * @date 22.07.2021
 * @author Timo Gede <timo@timogede.com>
 *
 * @var $block array
 */

$id = 'features--' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}
$extra_text = get_field('extra_text')?: '';
$items = get_field_object('items');
//count amount if items so that i can add class
$feature_count = count($items['value']);
?>
<article class="features container">
    <div class="features__inside container__inside" id="<?=$id?>">
        <div class="features__items feature__items--items-<?=$feature_count?>">
        <?php if (is_array($items['value'])): foreach (
                $items['value'] as $item
            ): ?>
            <div class="features__item">
                <div class="features__headline-wrap">
                    <?php if ($item['headline']): ?><h3><?= $item['headline'] ?></h3><?php endif; ?>
                </div>
                <div class="features__subline-wrap">
                    <?php if ($item['subline']): ?><?= $item['subline'] ?> <?php endif; ?>
                </div>
                <div class="features__list-wrap">
                    <?php if ($item['list']): ?><?= $item['list'] ?> <?php endif; ?>
                </div>
                
                <div class="features__more-wrap">
                    <p>Mehr Info</p>
                        <?php if ($item['more_info']): ?>
                </div>

                <div class="features__more-content">
                    <?= $item['more_info'] ?> 
                    <?php endif; ?>
                </div>
   
                <div class="features__price-wrap">
                    <?php if ($item['price']): ?><?= $item['price'] ?> <?php endif; ?>
                </div>
                <div class="features__button-wrap">
                    <?php if ($item['button_text']): ?>
                        <a class="features__button button button--<?=$item['button_color'] ?>" href="<?=$item['button_link'] ?>"><?= $item['button_text'] ?></a>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; endif; ?>
        </div>
       
        <div class="features__extra-text">
        <?php if ($extra_text):?>
            <p><?=$extra_text?></p>
        <?php endif; ?>
        </div>
     
    </div>
</article>
