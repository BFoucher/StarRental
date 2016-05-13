Feature: homepage.feature
  Test Behat


  Scenario: Access to homepage and I should see `Star Rental` title
    Given I am on the homepage
    Then I should see 1 "h1" elements
    And I should see "Star Rental" in the "h1" element

  Scenario: Test 404 page
    Given I am on homepage
    And I go to "/404_Not_Found"
    Then the response status code should be 404
    And I should see "404 Not Found"