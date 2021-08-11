<?php
/**
 * @title: Location-Box
 * @description: location-Box Element für z.B. die Vorstellung verschiedener Locations und deren Trainer
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
$id = 'location-box--' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}
$menu_link_id = get_field('menu_link_id')?: '';
$items = get_field_object('items');
$color = get_field('color')?: '';
$headline = get_field('headline')?: '';
$topline = get_field('topline')?: '';
$days = get_field('days');
$trainer_name = get_field('trainer_name')?: '';
$trainer_image = get_field('trainer_image')?: '';
$subline = get_field('subline')?: '';
$button = get_field('button')?: '';
$button_link = get_field('button_link')?: '';
$order = get_field('order');
$extra_text_left = get_field('extra_text_left');
$extra_text_right = get_field('extra_text_right');
$description = get_field('description')?: '';
?>
<article class="location-box container location-box__color--<?=$color?> location-box__image-order--<?=$order?>" id=<?=$menu_link_id?>>
    <div class="location-box__inside" id="<?=$id?>">
        <div class="location-box__columns">

            <div class="location-box__column location-box__column-1">
                <div class="location-box__topline">
                    <?=$topline?>
                </div>
                <div class="location-box__column-wrap">
                    <h2><?=$headline?></h2>
                    <div class="location-box__description-wrap">
                            <?=$description?>
                    </div>
                    <div class="location-box__days-trainer__wrap">
                    <?php if (in_array("mo", $days)):?>                           
                        <div class="location-box__days-trainer__item">
                            <p>Mo</p>
                        </div>
                    <?php endif; ?>
                    <?php if (in_array("di", $days)):?>
                        <div class="location-box__days-trainer__item">
                            <p>Di</p>
                        </div>
                    <?php endif; ?>
                    <?php if (in_array("mi", $days)):?>
                        <div class="location-box__days-trainer__item">
                            <p>Mi</p>
                        </div>
                    <?php endif; ?>
                    <?php if (in_array("do", $days)):?>
                        <div class="location-box__days-trainer__item">
                            <p>Do</p>
                        </div>
                    <?php endif; ?>
                    <?php if (in_array("fr", $days)):?>
                        <div class="location-box__days-trainer__item">
                            <p>Fr</p>
                        </div>
                    <?php endif; ?>
                    <?php if (in_array("sa", $days)):?>
                        <div class="location-box__days-trainer__item">
                            <p>Sa</p>
                        </div>
                    <?php endif; ?>
                    <?php if (in_array("so", $days)):?>
                        <div class="location-box__days-trainer__item">
                            <p>So</p>
                        </div>
                    <?php endif; ?>
                    <div class="location-box__trainer-wrap">
                    <?php if ($trainer_image): ?>
                        <div class="location-box__trainer-image__item">
                            <div class="location-box__trainer" style="background-image:url(<?php if ($trainer_image): ?><?= $trainer_image['url'] ?> <?php endif; ?>);"></div>
                        </div>
                    <?php endif; ?>
                        <div class="location-box__trainer-name__item">
                            <h4><?=$trainer_name?></h4>
                        </div>
                            </div>
                    </div>



                    <?php if ($subline):?>
                    <div class="location-box__sponsored">
                        <?=$subline?>
                    </div>
                    <?php endif; ?>




                    <?php if ($button):?>
                        <a class="location-box__button button button--<?=$color?>" href="<?=$button_link?>">
                            <?=$button?>
                        </a>
                    <?php endif; ?>
                </div>
             
            </div>


            <div class="location-box__column location-box__column-2">
                <div class="location-box__slick-arrows">
                    <div class="location-box__slick-arrow prev-arrow"><?php include( get_template_directory() . '/assets/images/chevron-left-regular.svg' ); ?></div>
                    <div class="location-box__slick-arrow next-arrow"><?php include( get_template_directory() . '/assets/images/chevron-right-regular.svg' ); ?></div>
                </div> 
            <div class="location-box__items">
                    <?php if (is_array($items['value'])): foreach (
                        $items['value'] as $item
                    ): ?>
                    <div class="location-box__item" style="background-image:url(<?php if ($item['image']): ?><?= $item['image']['url'] ?> <?php endif; ?>); background-position:<?php if ($item['image_alignment']): ?><?= $item['image_alignment'] ?> <?php endif; ?>">>
                    </div>
                    <?php endforeach; endif; ?>
                </div>
            </div>




        </div>
       
                <div class="location-box__extra-columns">
                    <div class="location-box__extra-column location-box__extra-column-1">
                        <div class="location-box__extra-text-left">
                            <?=$extra_text_left?>
                        </div>
                    </div>
                    <div class="location-box__extra-column location-box__extra-column-2">
                        <div class="location-box__extra-text-right">
                            <?=$extra_text_right?>
                        </div>
                    </div>
                </div>

    </div>
</article>
<?php endif; ?>