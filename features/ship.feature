Feature: Ship
  Ship test

  Scenario: I go to Ship List page and I see a list of Ship
    Given I am on "/ship"
    Then I should see 2 "h1" elements
    And I should see 1 "table" elements
    And I should see "Ship list"
    And I should see "Create a new entry"

  Scenario: I go to Ship creation form and don't see color option.
    Given I am on "/ship/new"
    Then I should see 2 "h1" elements
    And I should see "Ship creation"
    And I should not see "Color"

  Scenario: Edit an TieFighter ship and could see Color option.
    Given I create TieFighter Ship;
    And I go to "/ship"
    And I should see "TestShip"
    Then I follow "1"
    Then I follow "Edit"
    And I should see "Color"

  Scenario: Edit an XWing ship and could not see Color option.
    Given I create XWing Ship;
    And I go to "/ship"
    And I should see "TestShip2"
    Then I follow "2"
    Then I follow "Edit"
    And I should not see "Color"