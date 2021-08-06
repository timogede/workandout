<?php
/**
 * @title: Trainings
 * @description: Training Liste mit verschiedenen Workouts
 * @icon: text-page
 *
 * @date 20.07.2021
 * @author Timo Gede <timo@timogede.com>
 *
 * @var $block array
 */
if( isset( $block['data']['preview_image_help'] )  ) :    /* rendering in inserter preview  */

   echo '<img src="'. $block['data']['preview_image_help'] .'" style="width:100%; height:auto;">';


else : /* rendering in editor body */
$id = 'trainings--' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}
$extra_box = get_field('extra_box');
$extra_box_headline = get_field('extra_box_headline')?: '';
$extra_box_subline = get_field('extra_box_subline')?: '';
$extra_box_button_text = get_field('extra_box_button_text')?: '';
$extra_box_button_link = get_field('extra_box_button_link')?: '';
$items = get_field_object('items');
$i = 0;
?>
    <article class="trainings container">
    <div class="trainings__inside container__inside" id="<?=$id?>">
      <div class="training-list">
      <?php if (is_array($items['value'])): foreach (
                $items['value'] as $item
            ): $i++;?>
         <div class="training">
            <div class="training-number"><?= $i ?></div>
            <h3 class="training-name"><?php if ($item['headline']): ?><?= $item['headline'] ?> <?php endif; ?></h3>
            <dl class="training-details">
               <dt><?php if ($item['property_1']): ?><?= $item['property_1'] ?> <?php endif; ?></dt>
               <dd>
                  <div class="dots">
                     <div class="dot <?php if ($item['property_1_value'] == "one" || $item['property_1_value'] == "two" || $item['property_1_value'] == "three" || $item['property_1_value'] == "four" || $item['property_1_value'] == "five"): ?> is-active<?php endif; ?>"></div>
                     <div class="dot <?php if ($item['property_1_value'] == "two" || $item['property_1_value'] == "three" || $item['property_1_value'] == "four" || $item['property_1_value'] == "five"): ?> is-active<?php endif; ?>"></div>
                     <div class="dot <?php if ($item['property_1_value'] == "three" || $item['property_1_value'] == "four" || $item['property_1_value'] == "five"): ?> is-active<?php endif; ?>"></div>
                     <div class="dot <?php if ($item['property_1_value'] == "four" || $item['property_1_value'] == "five"): ?> is-active<?php endif; ?>"></div>
                     <div class="dot <?php if ($item['property_1_value'] == "five"): ?> is-active<?php endif; ?>"></div>

                  </div>
               </dd>
               <dt><?php if ($item['property_2']): ?><?= $item['property_2'] ?> <?php endif; ?></dt>
               <dd>
               <div class="dots">
                     
                     <div class="dot <?php if ($item['property_2_value'] == "one" || $item['property_2_value'] == "two" || $item['property_2_value'] == "three" || $item['property_2_value'] == "four" || $item['property_2_value'] == "five"): ?> is-active<?php endif; ?>"></div>
                     <div class="dot <?php if ($item['property_2_value'] == "two" || $item['property_2_value'] == "three" || $item['property_2_value'] == "four" || $item['property_2_value'] == "five"): ?> is-active<?php endif; ?>"></div>
                     <div class="dot <?php if ($item['property_2_value'] == "three" || $item['property_2_value'] == "four" || $item['property_2_value'] == "five"): ?> is-active<?php endif; ?>"></div>
                     <div class="dot <?php if ($item['property_2_value'] == "four" || $item['property_2_value'] == "five"): ?> is-active<?php endif; ?>"></div>
                     <div class="dot <?php if ($item['property_2_value'] == "five"): ?> is-active<?php endif; ?>"></div>

                  </div>
               </dd>
               <dt><?php if ($item['property_3']): ?><?= $item['property_3'] ?> <?php endif; ?></dt>
               <dd><?php if ($item['property_3_value']): ?><?= $item['property_3_value'] ?> <?php endif; ?> Minuten</dd>
            </dl>
            <div class="training-short-description"><?php if ($item['subline']): ?><?= $item['subline'] ?> <?php endif; ?></div>
            <div class="training-description"><?php if ($item['description']): ?><?= $item['description'] ?> <?php endif; ?></div>
               <img src="<?php if ($item['icon']): ?><?= $item['icon']['sizes']['large'] ?> <?php endif; ?>"
                             alt="<?php if ($item['icon']): ?><?= $item['icon']['alt'] ?> <?php endif; ?>"
                             class="training-icon">
         </div>
         <?php endforeach; endif; ?>
      </div>
      <?php if ($extra_box): ?>
      <div class="personal-training">
         <h3><?= $extra_box_headline ?></h3>
         <?= $extra_box_subline ?>
         <a href="<?= $extra_box_button_link ?>" class="button button--brand"><?= $extra_box_button_text ?></a>
      </div>
      <?php endif; ?>
   </div>
    </article>
    <?php endif; ?>