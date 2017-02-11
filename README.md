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

| FUnctionality | GalileoSettingBundle | CraueSettingBundle |
| --- | --- | --- |
| Get values without exception | X | 0 |
| Settings unique for all sections | 0 | X |
| Settings unique within section | X | 0 |
| GUI panel to manage settings | 0 | X |
| Get values with defaule values | X | 0 |
| Events exposed for customize actions | X | 0 |
| Change values for setting | X | X |
| Established create function | X | 0 |

Craue documentation:

https://github.com/craue/CraueConfigBundle
