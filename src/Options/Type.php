<?php

/**
 * @file
 * Contains Type.php
 */

namespace Drupal\charts_js_php\Options;

use Drupal\charts_js_php\Helpers\Enum;

abstract class Type extends Enum
{
  const Line = 0;
  const Bar = 1;
  const Radar = 2;
  const Doughnut = 3;
  const Pie = 4;
  const Polar = 5;
  const Bubble = 6;
  const Scatter = 7;

  /**
   * Get string value of char enum.
   *
   * @param int $type
   * @return string
   */
  public static function TypeToString(int $type): string {
    switch ($type) {
      case self::Line:      return 'line';
      case self::Bar:       return 'bar';
      case self::Radar:     return 'radar';
      case self::Doughnut:  return 'doughnut';
      case self::Pie:       return 'pie';
      case self::Polar:     return 'polarArea';
      case self::Bubble:    return 'bubble';
      case self::Scatter:   return 'scatter';
      default:              return '';
    }
  }
}