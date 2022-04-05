# Changelog

All notable changes to `laravel-charts-css` will be documented in this file.

## Unreleased

### Added

- Support for Laravel 9.

### Changed

- Make use of `maartenpaauw/laravel-specification-pattern` package.

### Removed

- Support for PHP `7.4`.

## 1.2.3 - 2021-08-13

### Fixed

- Bugfix for area and line charts.

## 1.2.2 - 2021-07-31

### Fixed

- Area charts, with multiple datasets given, will be displayed correctly.

## 1.2.1 - 2021-07-31

### Fixed

- `HighestEntryStatistic` will return zero when passing datasets without entries.

## 1.2.0 - 2021-07-17

### Added

- Added support for simple stacked and percentage stacked datasets.

## 1.1.0 - 2021-07-08

### Added

- Added abstract `AreaChart`, `BarChart` and `LineChart` classes.

## 1.0.0 - 2021-07-05

- initial release
