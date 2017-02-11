# GalileoSettingBundle
With this repository we will try to fill the gap of simple configuration and settings functionality handled by external storage mechanism.

## Basic usage:

Simple get:
~~~
$service('galileo.settings.setting')->get('our_settinng');
~~~

Get with default value:

~~~
$service('galileo.settings.setting')->get('email_address', 'hello@galileoprime.com');
~~~

Get users within sections, you can use them for example for user specific settings:

~~~
$service('galileo.settings.setting')->section('userId:{userId}')->get('email_address', 'hello@galileoprime.com');
~~~

## Comparision to CraueConfigBundle

This bundle will add you some additional possibilities to handle your settings, and also is esier to use without exception handling in our application.

| FUnctionality                        | GalileoSettingBundle | CraueSettingBundle |
| ---                                  | ---                  | ---                |
| Get values without exception         | :white_check_mark:   | :x:                |
| Settings unique for all sections     | :x:                  | :white_check_mark: |
| Settings unique within section       | :white_check_mark:   | :x:                |
| GUI panel to manage settings         | :x:                  | :white_check_mark: |
| Set settings defaule values          | :white_check_mark:   | :x:                |
| Events exposed for customize actions | :white_check_mark:   | :x:                |
| Change setting value                 | :white_check_mark:   | :white_check_mark: |
| Established create function          | :white_check_mark:   | :x:                |

Craue documentation:

https://github.com/craue/CraueConfigBundle
