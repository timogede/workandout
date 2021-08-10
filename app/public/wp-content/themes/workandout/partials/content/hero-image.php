<?php
/**
 * @title: Hero Bild
 * @description: Hero Bild Element für z.B. ein großes Bild mit einer Liste
 * @icon: camera
 *
 * @date 22.07.2021
 * @author Timo Gede <timo@timogede.com>
 *
 * @var $block array
 */
if( isset( $block['data']['preview_image_help'] )  ) :    /* rendering in inserter preview  */

    echo '<img src="'. $block['data']['preview_image_help'] .'" style="width:100%; height:auto;">';


else : /* rendering in editor body */

$id = 'hero-image--' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}
$menu_link_id = get_field('menu_link_id')?: '';
$extra_text = get_field('extra_text')?: '';
$color = get_field('color')?: '';
$image = get_field('image')?: '';
$image_alignment = get_field('image_alignment')?: '';
$content = get_field('content');
$darken = get_field('darken');



?>
<article class="hero-image container hero-image__color--<?=$color?>" style="background-image:url(<?php if ($image): ?><?= $image['url'] ?> <?php endif; ?>); background-position:<?php if ($image_alignment): ?><?= $image_alignment ?> <?php endif; ?>" id=<?$menu_link_id?>>
    <div class="hero-image__darken" style="background-color: black; opacity: <?=$darken?>"></div>
    <div class="hero-image__inside container__inside" id="<?=$id?>">
    <div class="hero-image__content">
    <?php if ($content): ?>
        <?= $content ?>
    <?php endif; ?>
    </div>
    </div>
</article>
<?php endif; ?>