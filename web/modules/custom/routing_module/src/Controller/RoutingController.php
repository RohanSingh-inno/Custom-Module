<?php

namespace Drupal\routing_module\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class for showing the pages.
 */
class RoutingController extends ControllerBase
{
  /**
   * Display the markup.
   *
   * @return array
   *   Return markup array.
   */
  public function static()
  {
    return [
      '#type' => '#markup',
      '#markup' => $this->t('This is a normal page which will be loaded ')
    ];
  }
  /**
   * Display the markup.
   *
   * @return array
   *   Return markup array.
   */
  public function campaign($user = null)
  {
    return [
      '#type' => '#markup',
      '#markup' => $this->t('This page has the details regarding the campaign number ' . $user)
    ];
  }
}

?>
