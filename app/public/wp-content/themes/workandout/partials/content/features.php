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
                <h3 class="features__headline">
                    <?php if ($item['headline']): ?><?= $item['headline'] ?> <?php endif; ?>
                </h3>
                <div class="features__subline-wrap">
                    <?php if ($item['subline']): ?><?= $item['subline'] ?> <?php endif; ?>
                </div>
                <div class="features__list-wrap">
                    <?php if ($item['list']): ?><?= $item['list'] ?> <?php endif; ?>
                </div>
                <div class="features__price-wrap">
                    <?php if ($item['price']): ?><?= $item['price'] ?> <?php endif; ?>
                </div>
                <div class="features__button">
                    <?php if ($item['button_text']): ?>
                        <a class="features__button button button--<?=$item['button_color'] ?>" href="<?=$item['button_link'] ?>"><?= $item['button_text'] ?></a>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; endif; ?>
        </div>
        <?php if ($extra_text):?>
        <div class="features__extra-text">
            <p><?=$extra_text?></p>
        </div>
        <?php endif; ?>
    </div>
</article>