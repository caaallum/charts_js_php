<?php

namespace Drupal\charts_js_php\Helpers;

use ReflectionClass;
use ReflectionException;

abstract class Enum
{
  private static $constCacheArray = NULL;

  /**
   * Get const values from enum.
   *
   * @return array|mixed
   */
  private static function GetConstants() {
    if (self::$constCacheArray == NULL)
      self::$constCacheArray = [];

    $calledClass = get_called_class();
    $reflect = NULL;
    if (!array_key_exists($calledClass, self::$constCacheArray)) {
      try {
        $reflect = new ReflectionClass($calledClass);
      }
      catch (ReflectionException $e) {
        \Drupal::messenger()->addError("Reflection error " . $e->getMessage());
        return FALSE;
      }
      self::$constCacheArray[$calledClass] = $reflect->getConstants();
    }
    return self::$constCacheArray[$calledClass];
  }

  /**
   * Check if param is value name.
   *
   * @param $name
   * @param false $strict
   * @return bool
   */
  public static function IsValidName($name, bool $strict = FALSE): bool {
    $constants = self::getConstants();

    if ($strict) {
      return array_key_exists($name, $constants);
    }

    $keys = array_map('strtolower', array_keys($constants));
    return in_array(strtolower($name), $keys);
  }

  /**
   * Check if param is valid value.
   *
   * @param $value
   * @param bool $strict
   * @return bool
   */
  public static function IsValidValue($value, bool $strict = TRUE): bool {
    $values = array_values(self::getConstants());
    return in_array($value, $values, $strict);
  }
}