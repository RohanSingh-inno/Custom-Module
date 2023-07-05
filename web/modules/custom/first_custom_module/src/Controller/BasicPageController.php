<?php
namespace Drupal\first_custom_module\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class for showing the pages.
 */
class BasicPageController extends ControllerBase
{

    /**
     * Display the markup.
     *
     * @return array
     *   Return markup array.
     */
    public function Page1()
    {
        $user = \Drupal::currentUser()->getAccountName();
        return [
            '#type' => 'markup',
            '#markup' => $this->t('Hi ' . $user . '!!')
        ];
    }

    /**
     * Display the markup.
     *
     * @return array
     *   Return markup array.
     */
    public function Page2()
    {
        return [
            '#title' => 'Hi arijit this side',
            '#data' => 'This is the data field'
        ];
    }

}

?>
