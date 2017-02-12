Feature: Create new settings at any application lifetime
  As an developer
  You should be able to create any settings that will fulfil your needs with some value

  @createSetting
  Scenario: Create new settings
    Given there is nothing registed in storage system
    When you try to create new setting email with value hello@galileoprime.com
    Then you should get success result

  @changeSetting
  Scenario: Create new setting for already existing setting name
    Given there is already registered email_registered setting with hello+registered@galileprime value
    When you try to create new setting for email_registered setting with value hell+newvalue@galileoprime value
    Then the value for currently existing setting should be replaced
