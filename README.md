# Using the tool

## Installation

To use first run composer install. This will insert the required packages in the vendor directory

## Run

To run goto the directory in cmd and run with either 1 or 2 parameters.

Ways to run: 

- Via input and output parameters (if output is set the result will go in a file in that directory)

```
$ php RunTask.php --input="data/file.csv" --output="results/result.txt
```

- Via only an input parameter (note that this option does not include --input)

```
$ php RunTask.php data/file.csv
```

## PSR 2 

I have included http://cs.sensiolabs.org/ php coding standards fixer in composer under require dev. 

In windows to run you just need to go to vendor bin and run 


```
$ php-cs-fixer.bat fix ../../src --rules=@PSR2
```

## Testing

There are two types of testing in this application unit (phpUnit) and fucntional (behat)

To run the unit tests:

```
$ phpunit Tests
```

To Run the behat tests:

```
$ vendor\bin\behat
```

The Behat tests are very basic but will test the end to end of one journey with a CSV file. 


## What i could improve

- Refactor error handling to provide exception handling and logging. 
- Refactor file handling to ensure directory exists and better error handling. 
- Refactor Task.php, the code is untidy and could be managed better in separate functions. 
- Better use of the interface so that in task php it can handle any file type. 
- Improve the unit test. More tests are required - Test all data and helper classes fully
- Add more behat tests, rather than just testing only user journey I need to test all the user journeys


# Recruitment task

The aim is to create a command line tool which reads data from a file, performs simple operation on this data and stores or prints a result. Input files could have different format (csv, yml, xml), but they contain the same data. The result could be stored in a plain text file or printed on stdout. Please see the input files (located in `data` directory) to check the data structure.

## Requirements

- Fork this repository.
- Bootstrap a project with Composer.
- Use PSR-4 for autoloading.
- Follow PSR-2 coding standard.
- Build the tool.
- Add some tests (any one of the following: unit/integration/functional in TDD/BDD style - it's up to you).
- Add very basic documentation in README.md (how to run the tool). You can replace this readme file.
- Push your code into your github account. Make it available for review.

## Logic

We should be able to run the tool from a command line and pass an input parameter and optional output parameter.

- Input parameter is a path to a file that should be processed.
- Output parameter is an optional path to the output file.
- If the output parameter is not provided the result should be printed to `stdout`.

The tool should parse the input file and output the result. The result is a simple sum of `value` property for every _active_ entity.

We should be able to run the tool something like:

```
$ php script.php data/file.yml

# outputs 900
```

or

```
$ php script.php --input="data/file.xml" --output="results/result.txt"

# creates results/result.txt and puts a number 900 as a content
```

## Assumptions

- File extension describes file type (*.csv, *.yml, *.xml).
- User always has to pass 1 or 2 parameters - input and optionally output.

## Recommendations

- Try to avoid using full stack frameworks (like Symfony or Laravel). Standalone libraries or components are obviously acceptable.
- Try to follow an OOP approach. Don't be afraid of "over-engineering" that tool. This task obviously is simple and could be done in a few lines of code but we're interested in your OOP knowledge.
