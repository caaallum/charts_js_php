<?php

use Drupal\charts_js_php\Chart;
use Drupal\charts_js_php\Dataset;
use Drupal\charts_js_php\Options\Type;
use Drupal\charts_js_php\Options\Scale;

/**
 * Creates simple bar chart.
 * @return Chart
 */
function getChart(): Chart {
  $dataset = Dataset::CreateDataSet('My First Dataset')
    ->setData(array (65, 59, 80, 81, 56, 55, 40))
    ->setBackgroundColors(array(
      'rgba(255, 99, 132, 0.2)',
      'rgba(255, 159, 64, 0.2)',
      'rgba(255, 205, 86, 0.2)',
      'rgba(75, 192, 192, 0.2)',
      'rgba(54, 162, 235, 0.2)',
      'rgba(153, 102, 255, 0.2)',
      'rgba(201, 203, 207, 0.2)'
    ))
    ->setBorderColors(array(
      'rgb(255, 99, 132)',
      'rgb(255, 159, 64)',
      'rgb(255, 205, 86)',
      'rgb(75, 192, 192)',
      'rgb(54, 162, 235)',
      'rgb(153, 102, 255)',
      'rgb(201, 203, 207)'
    ))
    ->addOption('borderWidth', 1);

  return Chart::CreateChart(Type::Bar)
    ->setLabels(array('January', 'February', 'March', 'April', 'May', 'June', 'July'))
    ->addOptionScale(Scale::Y, 'beginAtZero', true)
    ->addDataSet($dataset);
}
