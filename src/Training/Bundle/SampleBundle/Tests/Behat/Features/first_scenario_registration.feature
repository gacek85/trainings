@firstFeature
@fixture-TrainingSampleBundle:CustomerUserFixture.yml
Feature: As A guest
  In order to create customer account
  I need to be able to reach, fill and submit registration form

  Scenario: Creating customer account via registration form
    Given I am on homepage
    And I click on "Register Button"
    When  I fill form with:
      | Company Name          | Test Company   |
      | First Name            | George         |
      | Last Name             | Example        |
      | Email Address         | gw@example.com |
      | Password              | 123#Example    |
      | Confirm Password      | 123#Example    |
    And I click on "Create An Account Button"
    Then I should see "Please check your email to complete registration" flash message
    And the message is gone after a while

  Scenario: Registration for existing email is not allowed
    Given I am on homepage
    And I click on "Register Button"
    When  I fill form with:
      | Company Name          | Another Test Company   |
      | First Name            | Matt                   |
      | Last Name             | Lang                   |
      | Email Address         | de@example.com         |
      | Password              | 123#Example            |
      | Confirm Password      | 123#Example            |
    And I click on "Create An Account Button"
    Then I should see "This email is already used."
    And I see form contains 9 fields
