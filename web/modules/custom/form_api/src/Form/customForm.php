<?php

namespace Drupal\form_api\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class for creating a custom form by extending ConFigBase
 */
class customForm extends ConfigFormBase{

  /**
   * {@inheritdoc}
   */
  public function getFormId(){
    return 'form_api_admin_settings';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames(){
    return [
      'form_api.admin_settings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state){
    $config = $this->config('your_module.admin_settings');
    $form['fullName'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Full Name'),
      '#default_value' => $config->get('fullName'),
      '#required' => TRUE,
    ];
    $form['phoneNumber'] = [
      '#type' => 'tel',
      '#title' => 'Phone Number',
      '#default_value' => $config->get('phoneNumber'),
    ];

    $form['email'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Email Id'),
      '#default_value' => $config->get('email'),
    ];

    $form['gender'] = [
      '#type' => 'select',
      '#options' => [
        'select' => 'Select One',
        'male' => 'Male',
        'female' => 'Female',
        'others' => 'Others'
      ],
      '#title' => $this->t('gender'),
      '#default_value' => $config->get('gender'),
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * Function for validating the form inputs.
   *
   * @param array $form
   * @param FormStateInterface $form_state
   * @return void
   */
  public function validateForm(array &$form, FormStateInterface $form_state){
    $phone = $form_state->getValue('phoneNumber');
    $email = $form_state->getValue('email');
    $public_domain = ['yahoo', 'gmail', 'outlook', 'hotmail'];

    //Phone Number Validation
    if (is_numeric($phone)) {
      if (!preg_match("/^[6-9][0-9]{9}$/", $phone)) {
        $form_state->setErrorByName('phoneNumber', 'Please use a Valid Indian Number');
      }
    } else {
      $form_state->setErrorByName('phoneNumber', 'Please use a 10 digit number only');
    }

    // Email ID Validation
    if (substr($email, strlen($email) - 4, strlen($email)) == '.com') {
      $explode_at_rate = explode('@', $email);
      $explode_at_dot = explode('.', $explode_at_rate[1]);
      if (in_array($explode_at_dot[0], $public_domain)) {
        $form_state->setErrorByName('email', 'You are using Public domain');
      }
    } else {
      $form_state->setErrorByName('email', 'Email should end with .com only');
    }
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state){
    $this->config('form_api.admin_settings')
      ->set('fullName', $form_state->getValue('fullName'))
      ->set('phoneNumber', $form_state->getValue('phoneNumber'))
      ->set('email', $form_state->getValue('email'))
      ->set('gender', $form_state->getValue('gender'))
      ->save();
    parent::submitForm($form, $form_state);
  }

}
