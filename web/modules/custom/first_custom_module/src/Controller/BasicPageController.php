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
   * Variable that holds the user's information.
   *
   * @var \Drupal\Core\Session\AccountInterface
   */
  protected $account;

  /**
   * Constructor Function which initializes user's details to a variable.
   *
   * @param \Drupal\Core\Session\AccountInterface $account
   *   Defines an account interface which represents the current user.
   */
  public function __construct(AccountInterface $account) {
    $this->account = $account;
  }

  /**
   * Function that creates an Instance of the class.
   *
   * @param \Symfony\Component\DependencyInjection\ContainerInterface $container
   *   It is the interface implemented by service container classes.
   */
  public static function create(ContainerInterface $container) {
    // Instantiates this form class.
    return new static(
      // Load the service required to construct this class.
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
    return [
      '#type' => 'markup',
      '#markup' => $this->t('Hi @user !!', [
        '@user' => $this->account->getAccountName(),
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
