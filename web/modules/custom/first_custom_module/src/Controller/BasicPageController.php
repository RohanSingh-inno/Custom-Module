<?php
   namespace Drupal\first_custom_module\Controller;

   use Drupal\Core\Controller\ControllerBase;
//    use Drupal\Core\Cache\CacheableMetadata;
//    use Drupal\Core\Entity\EntityFieldManagerInterface;

   class BasicPageController extends ControllerBase {
    
    // public function __construct(EntityFieldManagerInterface $entityFieldManager) {
    //     $this->entityFieldManager = $entityFieldManager;
    //   }
    public function Page1(){
        // $cacheTags = $this->entityFieldManager->getDefinition('user')->getListCacheTags();
        // $cacheability = (new CacheableMetadata())->setCacheTags($cacheTags);
        // $userName = \Drupal::currentUser()->getAccountName();
      
        // $cacheability->applyTo($userName);
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