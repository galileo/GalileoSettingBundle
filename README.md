# GalileoSettingBundle
With this repository we will try to fill the gap of simple configuration and settings functionality handled by external storage mechanism.

## Comparision to CraueConfigBundle

This bundle will add you some additional possibilities to handle your settings, and also is esier to use without exception handling in our application.

| FUnctionality                        | GalileoSettingBundle | CraueSettingBundle |
| ---                                  | ---                  | ---                |
| Get values without exception         | :white_check_mark:   | :x:                |
| Settings unique for all sections     | :x:                  | :white_check_mark: |
| Settings unique within section       | :white_check_mark:   | :x:                |
| GUI panel to manage settings         | :x:                  | :white_check_mark: |
| Set settings default values          | :white_check_mark:   | :x:                |
| Events exposed for customize actions | :white_check_mark:   | :x:                |
| Change setting value                 | :white_check_mark:   | :white_check_mark: |
| Established create function          | :white_check_mark:   | :x:                |

Craue documentation:

https://github.com/craue/CraueConfigBundle

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

## Dispatched events

### Events you can listen to

| Event name | Event class |
| --- | --- |
| `galileo.setting.not_existing_setting_queried` | Galileo\SettingBundle\Domain\Model\Events\NotExistingSettingQueriedEvent |
| `galileo.setting.setting_queried`              | Galileo\SettingBundle\Domain\Model\Events\SettingQueriedEvent            |
| `galileo.setting.setting_created`              | Galileo\SettingBundle\Domain\Model\Events\SettingCreatedEvent            |
| `galileo.setting.setting_changed`              | Galileo\SettingBundle\Domain\Model\Events\SettingChangedEvent            |
| `galileo.setting.setting_deleted`              | Galileo\SettingBundle\Domain\Model\Events\SettingDeletedEvent            |

### Getter events 

There are two different events that are called after you try to get some setting value. 

The first one will be dispatched after you ask for setting that is not registered in any storage system.

You can listen for it with kernel.listener with event value `galileo.setting.not_existing_setting_queried`

~~~
class GalileoSettingNoteExistingSettingQueried
~~~

And the second one will be dispatched after you ask for setting that already exist in our storage system

The name you can listen to is `galileo.setting.setting_queried`

### Setter events
