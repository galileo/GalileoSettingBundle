Feature: We should provide data persisted in storage mechanism
  As an developer
  You want to get setting value

  Background:
    Given there are persisted settings in storage system
      | email | hello@galileoprime.com          | null             |
      | email | hello+buissnes@galileoprime.com | bussiens_section |

  @getSetting
  Scenario: Get not existing setting value
    When you try to get awesome_setting
    Then you should get setting with null value

  @getSetting
  Scenario: Get not existing setting value
    When you try to get awesome_setting with default value 'awesome@example.com'
    Then you should get setting with null value
