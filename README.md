TDD in PHP 
==========
(http://slidesha.re/o7hwWR)

The Tutor library and unit tests are the end result of the live code portion
of my TDD in PHP presentation.

Library Requirements
--------------------

The tests in the Tutor Library, and the resulting implementations, are based on
the following set of requirements.

### Calculator
* Adds one integer to another
* Throws exceptions in the following cases
** Non-integer arguments provided
** Integer overflow
** Integer underflow
* Must be coded to an interface, not an implementation
** Tutor\Calculator\CalculatorInterface
** Tutor\Calculator\IntegerCalculator

### MathTutor
* Verifies correct responses to addition questions
* Uses the caculator class(es) to test responses (composition over inheritance)

Branches
--------

### master

The master branch is the code I write in the TDD presentation, with the addition
of a few tests and a BinaryCalculator (the BinaryCalculator is intended as a further
demonstration of the benefits of composition, but I usually run out of time 
before I can get to it).

### tests-only

This branch includes only the tests, leaving the implementation up to you. 

### community-improvement

The community-improvement branch is a place where the example can grow, based
on your contribution.  Do you see any bugs?  Can you break the library?  Is the
implementation garbage?  Fork the project, make the necessary changes, and issue
a pull request.  I can't wait to see how the code improves with your input.