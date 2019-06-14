<?php

namespace Drupal\file_upload\Plugin\Block;

use Drupal\Core\Block\Blockbase;

/**
* Provides a file_upload block.
*
* @Block(
* id = "fileupload_block",
* admin_label = @Translation("Download")
* )
*/
class file_upload extends BlockBase {

   public function build() {
       $build = [
        '#markup' => $this->t('Download %name. (this number is refresh each 5 minutes).', [
          '%name' => $name,
        ]),
        '#cache'  => [
          'keys' => ['fileupload:block'],
          'max-age' => '5',
          'contexts' => ['user'],
        ],
      ];
    return $build;
 }
}