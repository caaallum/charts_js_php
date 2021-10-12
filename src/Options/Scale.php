<?php

/**
 * @file
 * Contains Scale.php
 */

namespace Drupal\charts_js_php\Options;

use Drupal\charts_js_php\Helpers\Enum;

abstract class Scale extends Enum
{
  const X = 0;
  const Y = 1;

  /**
   * Get scale string from scale enum.
   *
   * @param int $scale
   * @return string
   */
  public static function ScaleToString(int $scale): string {
    switch ($scale) {
      case self::X:  return 'x';
      case self::Y:  return 'y';
      default:       return '';
    }
  }
}