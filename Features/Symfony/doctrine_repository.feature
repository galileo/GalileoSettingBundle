Feature: Find settings within repository
  As an developer
  You should be able to create any settings that will fulfil your needs with some value

  Scenario: Create new settings
    Given there is nothing registered in storage system
    When you try to create new setting named email with value 'email@example.com'
    Then the value for email should be 'email@example.com'

  @changeSetting
  Scenario: Create new setting for already existing setting name
    Given there is already registered email_registered setting with 'registered@example.com' value
    When you try to create new setting named email_registered with value 'changed@example.com'
    Then the value for email_registered should be 'changed@example.com'
