# Locale

[![Build Status](https://travis-ci.org/giggsey/Locale.svg?branch=master)](https://travis-ci.org/giggsey/Locale) [![Coverage Status](https://coveralls.io/repos/giggsey/Locale/badge.png)](https://coveralls.io/r/giggsey/Locale) [![StyleCI](https://styleci.io/repos/24566760/shield)](https://styleci.io/repos/24566760)


## Generating data

Data is compiled from the latest [CLDR Data](http://cldr.unicode.org/) as specified in [CLDR-VERSION.txt](CLDR-VERSION.txt).

A [Phing](https://www.phing.info/) task is used to compile the data from [JSON](https://github.com/unicode-cldr/cldr-localenames-full) into native PHP arrays.

It is not normally needed to compile the data, as this repository will always have the up to date CLDR data.
To manually compile the data, ensure you have all the dependencies installed, then run:

```bash
vendor/bin/phing compile
```
