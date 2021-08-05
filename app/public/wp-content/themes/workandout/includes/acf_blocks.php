<?php

function theme_block_category($categories, $post)
{
    return array_merge(
        $categories,
        array(
            array(
                'slug' => 'content-blocks',
                'title' => __('Inhalselemente', 'content-blocks'),
            ),
        )
    );
}

add_filter('block_categories', 'theme_block_category', 10, 2);

add_action('acf/init', 'theme_acf_init');
function theme_acf_init()
{
    foreach (
        glob(get_template_directory() . '/partials/content/*.php') as $filepath
    ) {
        $filepathParts = pathinfo($filepath);
        $fileContent = file_get_contents($filepath);
        $filename = $filepathParts['filename'];
        $name = str_replace('_', '-', $filename);
        $title = $name;
        $description = '';
        $category = 'content-blocks';
        $icon = '';

        $hasTitleValue = preg_match('/title.*:(.*)\n/', $fileContent,
            $titleParts);
        if ($hasTitleValue) {
            $title = trim($titleParts[1]);
        }

        $hasDescriptionValue = preg_match('/description.*:(.*)\n/',
            $fileContent,
            $descriptionParts);
        if ($hasDescriptionValue) {
            $description = trim($descriptionParts[1]);
        }

        $hasIconValue = preg_match('/icon.*:(.*)\n/', $fileContent,
            $iconParts);
        if ($hasIconValue) {
            $icon = trim($iconParts[1]);
        }

        acf_register_block_type([
            'name' => $name,
            'title' => __($title),
            'description' => __($description),
            'icon' => $icon,
            'render_template' => $filepath,
            'category' => $category,
            'mode' => 'edit',
             // Just add this and you'll get the block preview:
             'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'preview_image_help' => '/wp-content/themes/workandout/partials/content/previews/' . $name . '.jpg',
                    )
                )
                    ),
            'supports' => [
                'align' => false
            ]
        ]);
    }
}

function theme_admin_style()
{
    wp_enqueue_style('admin-styles',
        get_template_directory_uri() . '/assets/dist/backend.css');
}

add_action('admin_enqueue_scripts', 'theme_admin_style');


add_filter('allowed_block_types', 'theme_filter_allowed_block_types');
function theme_filter_allowed_block_types($allowed_block_types)
{
    $allowedCoreBlocks = ['core/shortcode'];

    $result = [];
    $registeredBlocks = WP_Block_Type_Registry::get_instance()
        ->get_all_registered();

    foreach ($registeredBlocks as $registeredBlockName => $registeredBlock) {
        if (strpos($registeredBlockName, 'core/') !== 0 || in_array($registeredBlockName, $allowedCoreBlocks)) {
            $result[] = $registeredBlockName;
        }
    }

//    foreach (
//        glob(get_template_directory() . '/partials/content/*.php') as $filepath
//    ) {
//        $pathinfo = pathinfo($filepath);
//        $name = str_replace('_', '-', $pathinfo['filename']);
//        $result[] = 'acf/'.$name;
//    }
    return $result;
}

remove_theme_support('core-block-patterns');
