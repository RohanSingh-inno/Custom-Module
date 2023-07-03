<?php
   namespace Drupal\first_custom_module\Controller;

   use Drupal\Core\Controller\ControllerBase;


   class BasicPageController extends ControllerBase {
    
    public function Page1(){
        $user = \Drupal::currentUser()->getAccountName();
        return [
            '#type'=> 'markup',
            '#markup'=> $this->t('Hi '.$user.'!!')
        ];
    }

    public function Page2(){
        return [
            '#title'=> 'Hi arijit this side',
            '#data'=> 'This is the data field'
        ];
    }

   }
?>