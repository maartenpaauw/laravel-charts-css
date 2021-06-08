# Laravel component to create gorgeous Charts.css charts.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/maartenpaauw/laravel-charts-css.svg?style=flat-square)](https://packagist.org/packages/maartenpaauw/laravel-charts-css)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/maartenpaauw/laravel-charts-css/run-tests?label=tests)](https://github.com/maartenpaauw/laravel-charts-css/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/maartenpaauw/laravel-charts-css/Check%20&%20fix%20styling?label=code%20style)](https://github.com/maartenpaauw/laravel-charts-css/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/maartenpaauw/laravel-charts-css.svg?style=flat-square)](https://packagist.org/packages/maartenpaauw/laravel-charts-css)

This library will help you generate CSS only charts based on the **Charts.css** library.

## Installation

You can install the package via composer:

```bash
composer require maartenpaauw/laravel-charts-css
```

## Usage

Here's how you can create a chart:

```bash
php artisan make:chart MedalsChart
```

This will generate a chart component within the `View/Components` namespace.

```php
<?php

namespace DummyNamespace;

use Maartenpaauw\Chart\Chart;
use Maartenpaauw\Chart\Data\Axes\Axes;
use Maartenpaauw\Chart\Data\Datasets\Dataset;
use Maartenpaauw\Chart\Data\Datasets\Datasets;
use Maartenpaauw\Chart\Data\Datasets\DatasetsContract;
use Maartenpaauw\Chart\Data\Entries\Entry;

class MedalsChart extends Chart
{
    protected function id(): string
    {
        return 'medals-chart';
    }

    protected function heading(): string
    {
        return __('Medals Chart');
    }

    protected function datasets(): DatasetsContract
    {
        return new Datasets(
            new Axes('Country', ['Gold', 'Silver', 'Bronze']),
            [
                new Dataset([
                    new Entry('46', 46),
                    new Entry('37', 37),
                    new Entry('38', 38),
                ], 'USA'),
                new Dataset([
                    new Entry('27', 27),
                    new Entry('23', 23),
                    new Entry('17', 17),
                ], 'GBR'),
                new Dataset([
                    new Entry('26', 26),
                    new Entry('18', 18),
                    new Entry('26', 26),
                ], 'CHN'),
            ]
        );
    }
}
```

To display your chart it is as easily as adding the following blade component:

```html
<x-medals-chart/>
```

## Advanced

There is a lot more to configure.

### Type

```php
use Maartenpaauw\Chart\Types\Bar;
use Maartenpaauw\Chart\Types\ChartType;

// ...

protected function type(): ChartType
{
    return new Bar();
}
```

At the moment there is support for 4 types of charts:

- `Area`
- `Bar`
- `Column`
- `Line`

By default each generated chart is a `Column` chart. If you want to change the chart type you can do it by overwriting the `type` method.

### Legend

```php
use Maartenpaauw\Chart\Legend\Appearance\Inline;
use Maartenpaauw\Chart\Legend\Appearance\Square;
use Maartenpaauw\Chart\Legend\Legend;

// ...

protected function legend(): Legend
{
    return parent::legend()
        ->withLabel('Gold')
        ->withLabel('Silver')
        ->withLabel('Bronze')
        ->withModification(new Inline())
        ->withModification(new Square());
}
```

By default, no legend is being generated and shown. You can change this behaviour by simply overwriting the `legend()` method.
By calling the `withLabel()` method on a `Legend` instance you can add a label.
By default, the legend is displayed vertically. You can change it to horizontally by adding the `Inline` modification.

The labels do not have any style by default. You can add one of the following shapes as a modification:

- `Circle`
- `Ellipse`
- `Line`
- `Rectangle`
- `Rhombus`
- `Square`

### Colorscheme

```php
use Maartenpaauw\Chart\Appearance\Colorscheme\Color;
use Maartenpaauw\Chart\Appearance\Colorscheme\ColorschemeContract;

// ...

protected function colorscheme(): ColorschemeContract
{
    return parent::colorscheme()
        ->add(new Color('#FF0000'))
        ->add(new Color('#00FF00'))
        ->add(new Color('#0000FF'));
}
```

The framework has a set of 10 default color repeating themselves.
You can change it by overwriting the `colorscheme()` method.

If you only add one color, **all** the data entries will get the same color.
You can add up to 10 colors by calling the `add()` method on the colorscheme.

```php
use Maartenpaauw\Chart\Appearance\Colorscheme\Color;
use Maartenpaauw\Chart\Appearance\Colorscheme\ColorschemeContract;

// ...

protected function colorscheme(): ColorschemeContract
{
    return new Colorscheme([
        new Color('#FF0000'),
        new Color('#00FF00'),
        new Color('#0000FF'),
    ]);
}
```

It is also possible to return a new instance of `Colorscheme` and given an array with colors as the first constructor parameter.

### Modifications

By overwriting the `modifications()` method you can add multiple modifications.

Out of the box the `ShowHeading` modification will be applied when the heading is present
and the modifications `Multiple` and `ShowLabels` are applied when there are multiple datasets configured.

All modifications can be found within the `Maartenpaauw\Chart\Appearance` namespace.

#### Data(sets) spacing

```php
use Maartenpaauw\Chart\Appearance\DatasetsSpacing;
use Maartenpaauw\Chart\Appearance\DataSpacing;
use Maartenpaauw\Chart\Appearance\ModificationsBag;

// ...

protected function modifications(): ModificationsBag
{
    return parent::modifications()
        ->add(new DataSpacing(10))
        ->add(new DatasetsSpacing(20));
}
```

By adding `DatasetsSpacing` or `DataSpacing` you can configure the space between the data entries. Both constructors accept a number between 1 and 20 defining the amount of space.

#### Hide data

```php
use Maartenpaauw\Chart\Appearance\HideData;
use Maartenpaauw\Chart\Appearance\ModificationsBag;

// ...

protected function modifications(): ModificationsBag
{
    return parent::modifications()
        ->add(new HideData());
}
```

The `HideData` modification will hide the display value of each entry.
The value will still be printed to the screen, but it is hidden by CSS.
This will respect screenreaders.

#### Show data on hover.

```php
use Maartenpaauw\Chart\Appearance\ModificationsBag;
use Maartenpaauw\Chart\Appearance\ShowDataOnHover;

// ...

protected function modifications(): ModificationsBag
{
    return parent::modifications()
        ->add(new ShowDataOnHover());
}
```

The `ShowDataOnHover` modification will hide the data the same way as the `HideData` modification.
The big difference is it will show the data when you hover it.

#### Label alignment

```php
use Maartenpaauw\Chart\Appearance\LabelsAlignCenter;
use Maartenpaauw\Chart\Appearance\LabelsAlignEnd;
use Maartenpaauw\Chart\Appearance\LabelsAlignStart;
use Maartenpaauw\Chart\Appearance\ModificationsBag;

// ...

protected function modifications(): ModificationsBag
{
    return parent::modifications()
        ->add(new LabelsAlignStart())
        ->add(new LabelsAlignCenter())
        ->add(new LabelsAlignEnd());
}
```

You can configure the label alignment by adding one of the following modifications: `LabelsAlignStart`, `LabelsAlignCenter` or `LabelsAlignRight`.

#### Multiple

```php
use Maartenpaauw\Chart\Appearance\ModificationsBag;
use Maartenpaauw\Chart\Appearance\Multiple;

// ...

protected function modifications(): ModificationsBag
{
    return parent::modifications()
        ->add(new Multiple());
}
````

When displaying multiple datasets the modification `Multiple` needs to be added.
Out of the box it is automatically add if there are multiple datasets.

#### Reverse

```php
use Maartenpaauw\Chart\Appearance\ModificationsBag;
use Maartenpaauw\Chart\Appearance\ReverseData;
use Maartenpaauw\Chart\Appearance\ReverseDatasets;
use Maartenpaauw\Chart\Appearance\ReverseOrientation;

// ...

protected function modifications(): ModificationsBag
{
    return parent::modifications()
        ->add(new ReverseData())
        ->add(new ReverseDatasets())
        ->add(new ReverseOrientation());
}
```

If you want to reverse the data, datasets or the orientation you can add the modifications: `ReverseData`, `ReverseDatasets` or/and `ReverseOrientation`.

#### Axes

```php
use Maartenpaauw\Chart\Appearance\ModificationsBag;
use Maartenpaauw\Chart\Appearance\ShowDataAxes;
use Maartenpaauw\Chart\Appearance\ShowPrimaryAxis;
use Maartenpaauw\Chart\Appearance\ShowSecondaryAxes;

// ...

protected function modifications(): ModificationsBag
{
    return parent::modifications()
        ->add(new ShowDataAxes())
        ->add(new ShowPrimaryAxis())
        ->add(new ShowSecondaryAxes());
}
```

By default, no axes are shown. You can show the primary axis by adding the `ShowPrimaryAxis`.
Same goes for the `ShowDataAxes`.

To display the secondary axes you can add the `ShowSecondaryAxes` modification.
The constructor accepts the amount of axes (with a limit of 10) as the first parameter.

#### Show heading

```php
use Maartenpaauw\Chart\Appearance\ModificationsBag;
use Maartenpaauw\Chart\Appearance\ShowHeading;

// ...

protected function modifications(): ModificationsBag
{
    return parent::modifications()
        ->add(new ShowHeading());
}
````

The heading (table caption) will always be printed to the screen to respect screenreaders,
but it will be hidden with CSS by default. If you want to display the heading you need to add the `ShowHeading` modification.
This modification will be added automatically when the heading is present.

#### Show labels

```php
use Maartenpaauw\Chart\Appearance\ModificationsBag;
use Maartenpaauw\Chart\Appearance\ShowLabels;

// ...

protected function modifications(): ModificationsBag
{
    return parent::modifications()
        ->add(new ShowLabels());
}
````

The labels will always be printed to the screen to respect screenreaders,
but they are hidden with CSS by default. If you want to display the labels you need to add the `ShowLabels` modification.

#### Stacked

```php
use Maartenpaauw\Chart\Appearance\ModificationsBag;
use Maartenpaauw\Chart\Appearance\Stacked;

// ...

protected function modifications(): ModificationsBag
{
    return parent::modifications()
        ->add(new Stacked());
}
````

If you want to stack multiple datasets you can add the `Stacked` modification.

#### Did I miss adding a modification?

```php
use Maartenpaauw\Chart\Appearance\CustomModification;
use Maartenpaauw\Chart\Appearance\ModificationsBag;

// ...

protected function modifications(): ModificationsBag
{
    return parent::modifications()
        ->add(new CustomModification('foo'));
}
````

Feel free to create a pull request or submitting an issue.
In the meanwhile you can add it easily by adding a `CustomModification`.

### Configuration

As mentioned before, the configuration is pretty smart. It adds a `ShowHeading` modification if a heading is present and
adds the modifications `Mulitple` and `ShowLabels` when multiple datasets are configured. This is done by wrapping the configuration within a `SmartConfiguration` decorator.

If you do not want this behaviour you can overwrite the `configuration` method and build the configuration by yourself.

```php
use Maartenpaauw\Chart\Configuration\Configuration;
use Maartenpaauw\Chart\Configuration\ConfigurationContract;

// ...

protected function configuration(): ConfigurationContract
{
    return new Configuration(
        $this->identity(),
        $this->legend(),
        $this->modifications(),
        $this->colorscheme(),
    );
}
````

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Maarten Paauw](https://github.com/maartenpaauw)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
