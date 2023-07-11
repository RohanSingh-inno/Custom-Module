<?php

namespace Drupal\first_custom_module\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Session\AccountInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class for showing the pages.
 */
class BasicPageController extends ControllerBase {

  /**
   * Account information.
   *
   * @var string
   */
  protected $account;

  /**
   * Constructor function.
   */
  public function __construct(AccountInterface $account) {
    $this->account = $account;
  }

  /**
   * Function to get current user.
   */
  public static function create(ContainerInterface $container) {
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
  public function page1() {
    $name = $this->account->getAccountName();
    return [
      '#type' => 'markup',
      '#markup' => $this->t('Hi @name !!', [
        "@name" => $name,
      ]),
    ];
  }

  /**
   * Display the markup.
   *
   * @return array
   *   Return markup array.
   */
  public function page2() {
    return [
      '#title' => 'Hi arijit this side',
      '#data' => 'This is the data field',
    ];
  }

}
