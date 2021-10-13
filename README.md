# ChartJS PHP

Create charts in code for Drupal 8/9

## How to use
Install charts_js_php via composer
```json
{
    "repositories": [
        {
            "type": "git",
            "url": "https://github.com/CallumSpeirs/charts_js_php"
        }
    ],
    "require": {
        "callumspeirs/charts_js_php": "dev-master"
    }
}
```

Add js library to page
```php
'#attached' => [
  'library' => [
    'charts_js_php/chart'
  ]
]
```

To use chart in twig ensure you use the raw function
```twig
{{ chart|raw }}
```

## Documentation
Full documentation is available at [Chart.js](http://www.chartjs.org/docs/latest/charts/) website. There you can find what type of charts and associated properties are available.
