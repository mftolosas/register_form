<?php
namespace Drupal\register_form\Form;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Component\Utility\UrlHelper;
use Drupal\Core\Url;


class RegisterForm extends FormBase {

  public function getFormId() {
    return 'register_form';
  }

  public function buildForm(array $form, FormStateInterface $form_state) {

    $form['name'] = array(
      '#type' => 'textfield',
      '#title' => t('Name'),
      '#required' => TRUE, 
      '#default_value' =>  \Drupal::state()->get('name'),
    );
    $form['lastname'] = array(
      '#type' => 'textfield',
      '#title' => t('LastName'),
      '#required' => TRUE,
      '#default_value' =>  \Drupal::state()->get('lastname'),
    );
    $form['gender'] = array(
        '#type' => 'textfield',
        '#title' => t('Gender'),
        '#required' => TRUE,
        '#default_value' =>  \Drupal::state()->get('gender'),
    );
    $form['age'] = array(
        '#type' => 'number',
        '#attributes' => array(
            'type' => 'number',
        ),
        '#title' => t('Age'),
        '#required' => TRUE,
        '#default_value' =>  \Drupal::state()->get('age'),
    );

    $form['submit'] = array(
      '#type' => 'submit',
      '#value' => t('Submit'),
    );
    return $form;
  }

  public function submitForm(array &$form, FormStateInterface $form_state) {
    foreach ($form_state->getValues() as $key => $value) {
        \Drupal::state()->set($key,$value);
    }     
    drupal_set_message(t('Your register has been save'));
  }
}
?>