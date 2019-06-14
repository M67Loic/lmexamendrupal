<?php

namespace Drupal\upload_file\Controller;

use Drupal\Core\Controller\ControllerBase;

class UploadController extends ControllerBase {

 /**
  * @param string $param
  * @return array
  */
 public function content($param = '') {
   $message = $this->t('You are on the Upload_Filde page. Your name is @username! @param', [
     '@username' => $this->currentUser()->getAccountName(),
     '@param' => $param,
   ]);

   return ['#markup' => $message];
 }

}
