<?php

namespace Drupal\first_custom_module\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class customForm extends FormBase
{
    public function getFormId()
    {
        return 'custom_form_data';
    }
    // protected function getEditableConfigNames(){
    //     return [
    //         'custom_form_data',
    //       ];
    // }
    public function buildForm(array $form, FormStateInterface $form_state)
    {
        $form['fullName'] = [
            '#type' => 'textfield',
            '#title' => 'Full Name',
            '#required' => true
        ];

        $form['PhoneNumber'] = [
            '#type' => 'tel',
            '#title' => 'Enter your Phone Number',
            '#required' => true
        ];

        $form['email'] = [
            '#type' => 'email',
            '#title' => 'Enter your Email Id',
            '#required' => true
        ];

        $form['gender'] = [
            '#type' => 'radios',
            '#title' => 'Select your gender',
            '#options' => [
                'male' => 'Male',
                'female' => 'Female',
                'others' => 'Others'
            ],
            '#required' => true
        ];

        $form['submit'] = [
            '#type' => 'submit',
            '#value' => 'Submit'
        ];

        return $form;
    }
    public function validateForm(array &$form, FormStateInterface $form_state)
    {
        $phone = $form_state->getValue('PhoneNumber');
        $email = $form_state->getValue('email');
        if (is_numeric($phone)) {
            if (strlen($phone) != 10) {
                $form_state->setErrorByName('PhoneNumber', 'Phone number should have 10 letters');
            }
        } else {
            $form_state->setErrorByName('PhoneNumber', 'Enter only numbers');
        }
        $public_domain = array("gmail", "yahoo", "outlook");
        if (preg_match('/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/', $email)) {
            $break_1 = explode('@', $email);
            $break_2 = explode('.', $break_1[1]);
            $domain = $break_2[0];
            if (!in_array($domain, $public_domain)) {
                $form_state->setErrorByName('email', 'You are not using Public Domain');
            }
        } else {
            $form_state->setErrorByName('email', 'Use correct email. Email should end from ".com"');
        }
    }

    public function submitForm(array &$form, FormStateInterface $form_state)
    {
        \Drupal::messenger()->addMessage('User details submitted successfully');
    }
}