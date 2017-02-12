Feature: For extending possibilites for other developers and to fulfil external needs we should dispatch some setting
  events
  As an develoepr
  We should dispatch events for create, change and maybe get actions

  Background:
    Given there are registered settings:
      | existing_setting | galileox86@gmail.com |

  Scenario: Call get method for not existing setting
    When you try to get not_existing_setting
    Then there should be dispatched event named galileo.settings.not_existing_setting_queried

  Scenario: Call get method for existing setting
    When you try to get existing_setting
    Then there should be event dispatcher with name galileo.settings.setting_queried with value galileox86@gmail.com