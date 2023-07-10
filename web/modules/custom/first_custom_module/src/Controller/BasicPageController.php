<?php

namespace Drupal\first_custom_module\Controller;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Session\AccountInterface;

/**
 * Class for showing the pages.
 */
class BasicPageController extends ControllerBase{

    protected $account;

    public function __construct(AccountInterface $account){
      $this->account = $account;
    }

    public static function create(ContainerInterface $container){
      return new static(
        $container->get('current_user')
      );
    }

    /**
     * Display the markup.
     *
     * @return array
     *   Return markup array.
     */
    public function page1(){
      return [
      '#type' => 'markup',
      '#markup' => $this->t('Hi ' . $this->account->getAccountName() . '!!')
      ];
    }

    /**
     * Display the markup.
     *
     * @return array
     *   Return markup array.
     */
    public function page2(){
      return [
      '#title' => 'Hi arijit this side',
      '#data' => 'This is the data field'
      ];
    }

}

?>
