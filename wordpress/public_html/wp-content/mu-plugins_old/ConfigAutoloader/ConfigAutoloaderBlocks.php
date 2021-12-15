<?php
/**
 * Block Register
 * Looks into the theme's `blocks` directory for a config file, which it
 * expects to list of block definitions the theme wants to register.
 */

if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

require_once __DIR__ . '/ConfigAutoloaderBase.php';

class ConfigAutoloaderBlocks extends ConfigAutoloaderBase
{
    public function include($configArray, $args = false)
    {
        // skip processing if the ACF plugin is not active.
        if (! function_exists('acf_register_block_type')) {
            return;
        }

        foreach($configArray as $blockId) {
            $blockDefaults = array(
                'name' => $blockId,
                'title' => $blockId,
                'icon' => 'dashicons-warning',
                'category' => 'sbm',
                'description' => '',
                'enqueue_assets' => array($this, 'importDependencies'),
                'supports' => array(
                    'align' => true,
                    'mode' => true,
                    'multiple' => true
                ),
            );

            $filePath = $this->baseDirectory . 'src/blocks/' . $blockId . '/config.php';
            $config = array();

            if (file_exists($filePath)) {
                $config = include $filePath;
            } else {
                trigger_error(
                    'ConfigAutoloaderBlocks: Block configuration file does not exist: "' . htmlentities($filePath) . '".',
                    E_USER_WARNING
                );

                continue;
            }

            $block_data = array_merge($blockDefaults, $config);
            $block_data['render_callback'] = array($this, 'renderBlockTemplate');

            $this->importAcfFields(
                $block_data,
                array(
                    'param' => 'block',
                    'operator' => '==',
                    'value' => "acf/{$blockId}",
                ),
                $blockId,
                "block-{$blockId}_"
            );

            // register block.
            acf_register_block_type($block_data);
        }
    }

    /**
     * Render callback for wp-block
     */
    public function renderBlockTemplate($block, $content = '', $isPreview = false)
    {
        $block_url = preg_replace('/^acf\//', '', $block['name']);

        $blockFields = array(
            'id' => $block_url . '-' . $block['id'],
            'name' => $block_url,
            'is-preview' => $isPreview
        );
        $templatePath = $this->baseDirectory . 'src/blocks/' . $block_url . '/template.php';

        render_partial(
            $templatePath,
            $blockFields
        );
    }
}

