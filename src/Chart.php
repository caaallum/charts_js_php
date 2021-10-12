<?php

/**
 * @file
 * Contains Chart.php
 */

namespace Drupal\charts_js_php;

use Drupal\charts_js_php\Options;

class Chart
{
  /**
   * The type of chart being created.
   * @var string
   */
  private $type;

  /**
   * Chart attributes.
   * @var array
   */
  private $attributes;

  /**
   * Chart options.
   * @var array
   */
  private $options;

  /**
   * The data that will make up the chart.
   * @var array
   */
  private $data;

  /**
   * Get a chart object
   *
   * @param int $type
   * @return Chart
   */
  public static function CreateChart(int $type): Chart {
    return new Chart($type);
  }

  /**
   * Create chart object.
   *
   * @param int $type
   */
  public function __construct(int $type) {
    $this->type = Options\Type::TypeToString($type);

    $this->options = array();
    $this->data = array();
  }

  /**
   * Override to string to allow echo of object canvas.
   *
   * @return string
   */
  public function __toString() {
    return $this->getCanvas();
  }

  /**
   * Get render canvas for chart display.
   *
   * @return string
   */
  public function getCanvas(): string {
    return sprintf('<canvas %s data-chartjs="%s" %s %s></canvas>', $this->getAttributes(), $this->type, $this->getData(), $this->getOptions());
  }

  /**
   * Get chart attributes.
   *
   * @return string
   */
  private function getAttributes(): string {
    $attribute = '';
    if (!isset($this->attributes['id']))
      $this->attributes['id'] = uniqid('chart_', TRUE);

    foreach($this->attributes as $key => $val)
      $attribute .= sprintf(' %s="%s"', $key, $val);
    return $attribute;
  }

  /**
   * Get chart options.
   *
   * @return string
   */
  private function getOptions(): string {
    return sprintf('data-options=\'%s\'', json_encode($this->options));
  }

  /**
   * Get chart data.
   *
   * @return string
   */
  private function getData(): string {
    return sprintf('data-data=\'%s\'', json_encode($this->data));
  }

  /**
   * Add attribute to chart
   *
   * @param string $key
   * @param $value
   * @return Chart
   */
  public function addAttribute(string $key, $value): Chart {
    $this->attributes[$key] = $value;
    return $this;
  }

  /**
   * Add multiple attributes at once.
   *
   * @param array $attributes
   * @return Chart
   */
  public function addAttributes(array $attributes): Chart {
    foreach($attributes as $key => $val)
      $this->attributes[$key] = $val;
    return $this;
  }

  /**
   * Set all attributes.
   *
   * @param array $attributes
   * @return Chart
   */
  public function setAttributes(array $attributes): Chart {
    $this->attributes = $attributes;
    return $this;
  }

  /**
   * Add custom chart option.
   *
   * @param string $key
   * @param $value
   * @return Chart
   */
  public function addOption(string $key, $value): Chart {
    $this->options[$key] = $value;
    return $this;
  }

  /**
   * Add scale option to chart.
   *
   * @param int $scale
   * @param string $key
   * @param $val
   * @return Chart
   */
  public function addOptionScale(int $scale, string $key, $val): Chart {
    $this->options['scales'][Options\Scale::ScaleToString($scale)][$key] = $val;
    return $this;
  }

  /**
   * Set custom chart options.
   *
   * @param array $options
   * @return Chart
   */
  public function setOptions(array $options): Chart {
    $this->options = $options;
    return $this;
  }

  /**
   * Set title of the chart.
   *
   * @param string $title
   * @param int $fontSize
   * @param string $fontColor
   * @return Chart
   */
  public function setTitle(string $title, int $fontSize = 16, string $fontColor = '#929fa1'): Chart {
    $this->options['plugins']['title'] = array(
      'display' => TRUE,
      'text' => $title,
      'fontSize' => $fontSize,
      'fontColor' => $fontColor,
    );
    return $this;
  }

  /**
   * Add dataset to chart.
   *
   * @param DataSet $ds
   * @return Chart
   */
  public function addDataSet(DataSet $ds): Chart {
    $this->data['datasets'][] = $ds->toArray();
    return $this;
  }

  /**
   * Add label to chart.
   *
   * @param string $label
   * @return Chart
   */
  public function addLabel(string $label): Chart {
    $this->data['labels'][] = $label;
    return $this;
  }

  /**
   * Set all labels for chart.
   *
   * @param array $labels
   * @return Chart
   */
  public function setLabels(array $labels): Chart {
    $this->data['labels'] = $labels;
    return $this;
  }

  /**
   * Add callback function to chart scale.
   *
   * @param int $scale
   * @param string $func
   * @return $this
   */
  public function addCallBack(int $scale, string $func): Chart {
    $this->options['scales'][Options\Scale::ScaleToString($scale)]['ticks'] = array('callback' => $func);
    return $this;
  }
}
