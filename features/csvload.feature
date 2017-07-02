Feature: Task task
  In order to run a task
  I need to pass in some $argv

  Rules:
  - The $argv needs to contain a second parameter with an input parameter

  Scenario: Inputting no Parameter
    Given $argv has only one parameter
    Then a message should be displayed "you need to pass either 2 or 3 parameters"

  Scenario: Inputting correct file Parameter
    Given $argv has 2 parameters the second of which is "data/file.csv"
    Then a value message should be displayed "900"