<?php

namespace Drupal\hello\Controller;

use Drupal\Core\Controller\ControllerBase;

class HelloController extends ControllerBase {
  public function content() {
    $config = $this->config('hello.settings');
    $case = $config->get('case');
    $hello_message = $config->get('hello_message');

    $markup = $hello_message;
    if ($case) {
      $markup = drupal_strtoupper($markup);
    }

    return array(
      '#markup' => $markup,
    );
  }
}
