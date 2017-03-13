Feature: We should provide data persisted in storage mechanism
  As an developer
  You want to get setting value

  Background:
    Given there are persisted settings in storage system
      | email         | hello@example.com         |         |
      | section_email | hello+section@example.com | section |

  @getSetting
  Scenario: Get not existing setting value
    When you try to get awesome_setting
    Then you should get setting with null value

  @getSetting
  Scenario: Get not existing setting value
    When you try to get awesome_setting with default value 'awesome@example.com'
    Then you should get setting with awesome@example.com value

  @getSetting
  Scenario: Get settings for existing value
    When you try to get email
    Then you should get setting with hello@example.com value

  @getSetting @section
  Scenario: Get setting withing section without section information
    When you try to get section_email
    Then you should get setting with null value

  @getSetting @section
  Scenario: Get setting withing section with section information
    When you try to get section_email within section
    Then you should get setting with hello+section@example.com value
