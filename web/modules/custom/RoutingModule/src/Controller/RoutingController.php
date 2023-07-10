<?php 

namespace Drupal\RoutingModule\Controller;

use Drupal\Core\Controller\ControllerBase;

class RoutingController extends ControllerBase{
    public function static(){
        return[
            '#type'   => '#markup' ,
            '#markup' => $this->t('This is a normal page which will be loaded ')
        ];
    }

    public function campaign($user = null){
        return[
            '#type' => '#markup',
            '#markup' => $this->t('This page has the details regarding the campaign number ' . $user)
        ];
    }
}

?>