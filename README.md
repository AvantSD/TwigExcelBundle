# TwigExcelBundle

This Symfony bundle provides a PhpExcel integration for Twig.

## Supported output formats

The supported output formats are directly based on the capabilities of PhpExcel.

 * .CSV (only basic data output)
 * .ODS (only basic data output)
 * .XLS (limited functionality)
 * .XLSX

## Software requirements

The following software is required to use PHPExcel/TwigExcelBundle.

**Required by this bundle:**

 * PHP 7.0 or newer
 * Symfony 3.0 or newer

**Required by PhpExcel:**

 * PHP extension php_zip enabled
 * PHP extension php_xml enabled
 * PHP extension php_gd2 enabled (if not compiled in)
