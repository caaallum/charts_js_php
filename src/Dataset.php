<?php

/**
 * @file
 * Contains Dataset.php
 */

namespace Drupal\charts_js_php;

class Dataset
{
  /**
   * Custom options for displaying the dataset.
   * @var array
   */
  private $options;

  /**
   * Dataset label.
   * @var string
   */
  private $label;

  /**
   * Chart data.
   * @var array
   */
  private $data;

  /**
   * Data labels.
   * @var array
   */
  private $labels;

  /**
   * Create dataset object from label
   *
   * @param string $label
   * @return Dataset
   */
  public static function CreateDataSet(string $label): Dataset {
    return new Dataset($label);
  }

  /**
   * Create dataset.
   *
   * @param string $label
   */
  function __construct(string $label) {
    $this->label = $label;
    $this->data = array();
    $this->options = array();
  }

  /**
   * Add a piece of data to the dataset.
   *
   * @param $data
   * @return Dataset
   */
  public function addData($data): Dataset {
    array_push($this->data, $data);
    return $this;
  }

  /**
   * Set data to existing array.
   *
   * @param array data to set
   * @return Dataset
   */
  public function setData($data): Dataset {
    $this->data = $data;
    return $this;
  }

  /**
   * Set chart label.
   *
   * @param $label
   */
  public function setLabel($label) {
    $this->label = $label;
  }

  /**
   * Get current label value.
   *
   * @return string
   */
  public function getLabel() : string {
    return $this->label;
  }

  /**
   * Set the background color of dataset.
   *
   * @param array $colors
   * @return Dataset
   */
  public function setBackgroundColors(array $colors): Dataset {
    $this->options['backgroundColor'] = $colors;
    return $this;
  }

  /**
   * Add background color to array.
   *
   * @param string $color
   * @return Dataset
   */
  public function addBackgroundColor(string $color): Dataset {
    $this->options['backgroundColor'][] = $color;
    return $this;
  }

  /**
   * Set the border colors of dataset.
   *
   * @param array $colors
   * @return Dataset
   */
  public function setBorderColors(array $colors): Dataset {
    $this->options['borderColor'] = $colors;
    return $this;
  }

  /**
   * Add background color to dataset.
   *
   * @param string $color
   * @return Dataset
   */
  public function addBordercolor(string $color): Dataset {
    $this->options['borderColor'][] = $color;
    return $this;
  }

  /**
   * Add option to the dataset.
   *
   * @param string $key
   * @param $val
   * @return $this
   */
  public function addOption(string $key, $val): Dataset {
    $this->options[$key] = $val;
    return $this;
  }

  /**
   * Add label to data labels.
   *
   * @param string $label
   * @return $this
   */
  public function addLabel(string $label): Dataset {
    $this->labels[] = $label;
    return $this;
  }

  /**
   * Get dataset array for chart
   *
   * @return array dataset
   */
  public function toArray() : array {
    return array_merge(array(
      'data' => $this->data,
      'label' => $this->label,
      'labels' => $this->labels,
    ), $this->options);
  }
}
