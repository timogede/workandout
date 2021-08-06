<?php
/**
 * @title: Code
 * @description: Code Element für z.B. HTML Snippets wie Fitogram
 * @icon: media-code
 *
 * @date 22.07.2021
 * @author Timo Gede <timo@timogede.com>
 *
 * @var $block array
 */
if( isset( $block['data']['preview_image_help'] )  ) :    /* rendering in inserter preview  */

    echo '<img src="'. $block['data']['preview_image_help'] .'" style="width:100%; height:auto;">';


else : /* rendering in editor body */
$id = 'code--' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

$code_content = get_field('code_content') ?: '';

?>
<article class="code container">
    <div class="code__inside container__inside" id="<?=$id?>">
        <div class="code__wrap">
        <?php if ($code_content): ?>
            <?= $code_content ?>
        <?php endif; ?>
        </div>
    </div>
</article>
<?php endif;?>