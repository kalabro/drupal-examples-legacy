<?php

namespace Drupal\hello\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Configure text display settings for this the hello world page.
 */
class HelloConfigForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'hello_settings_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('hello.settings');
    $form['case'] = array(
      '#type' => 'radios',
      '#title' => $this->t('Letter case of your "Hello World!" message'),
      '#default_value' => $config->get('case'),
      '#options' => array(
        0 => $this->t('Do not modify'),
        1 => $this->t('UPPER'),
      ),
      '#description' => $this->t('Choose the case of your "Hello, world!" message.'),
    );

    $form['hello_message'] = array(
      '#type' => 'textfield',
      '#title' => t('Your "Hello World!" message'),
      '#default_value' => $config->get('hello_message'),
      '#required' => TRUE,
    );

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->config('hello.settings')
      ->set('case', $form_state->getValue('case'))
      ->set('hello_message', $form_state->getValue('hello_message'))
      ->save();

    parent::submitForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'hello.settings',
    ];
  }

}
