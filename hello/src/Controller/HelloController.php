<?php

namespace Drupal\hello\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Component\Utility\Unicode;

/**
 * Display content.
 */
class HelloController extends ControllerBase {

  /**
   * Return content the fields.
   *
   * @return array
   *   Output result.
   */
  public function content() {

    $config = $this->config('hello.settings');
    $case = $config->get('case');
    $hello_message = $config->get('hello_message');

    $markup = $hello_message;
    if ($case) {
      $markup = Unicode::strtoupper($markup);
    }

    return array(
      '#markup' => $markup,
    );
  }

}
