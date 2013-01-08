# Day 1. Calc Stats

Your task is to process a sequence of integer numbers to determine the following statistics:

- minimum value
- maximum value
- number of elements in the sequence
- average value

For example: array(6, 9, 15, -2, 92, 11)

- minimum value = -2
- maximum value = 92
- number of elements in the sequence = 6
- average value = 21.833333


# Day 2. Number Names

Spell out a number. For example

    99 –> ninety nine
    300 –> three hundred
    310 –> three hundred and ten
    1501 –> one thousand, five hundred and one
    12609 –> twelve thousand, six hundred and nine
    512607 –> five hundred and twelve thousand, six hundred and seven
    43112603 –> forty three million, one hundred and twelve thousand, six hundred and three


# 3. Mine Field

A field of N x M squares is represented by N lines of exactly M characters each. The character ‘*’ represents a mine and the character ‘.’ represents no-mine.

Example input (a 3 x 4 mine-field of 12 squares, 2 of which are mines)

    3 4
    *...
    ..*.
    ....

Your task is to write a program to accept this input and produce as output a hint-field of identical dimensions where each square is a * for a mine or the number of adjacent mine-squares if the square does not contain a mine.

Example output (for the above input):

    *211
    12*1
    0111


# 4. Monty Hall

Suppose you’re on a game show and you’re given the choice of three doors. Behind one door is a car; behind the others, goats. The car and the goats were placed randomly behind the doors before the show.

The rules of the game show are as follows:

After you have chosen a door, the door remains closed for the time being. The game show host, Monty Hall, who knows what is behind the doors, now has to open one of the two remaining doors, and the door he opens must have a goat behind it. If both remaining doors have goats behind them, he chooses one randomly. After Monty Hall opens a door with a goat, he will ask you to decide whether you want to stay with your first choice or to switch to the last remaining door.

For example:
Imagine that you chose Door 1 and the host opens Door 3, which has a goat. He then asks you “Do you want to switch to Door Number 2?” Is it to your advantage to change your choice?

Note that the player may initially choose any of the three doors (not just Door 1), that the host opens a different door revealing a goat (not necessarily Door 3), and that he gives the player a second choice between the two remaining unopened doors.

Simulate at least a thousand games using three doors for each strategy and show the results in such a way as to make it easy to compare the effects of each strategy.


# 5. Fizz Buzz

Write a program that prints the numbers from 1 to 100. But for multiples of three print “Fizz” instead of the number and for the multiples of five print “Buzz”. For numbers which are multiples of both three and five print “FizzBuzz”.

Sample output:

    1
    2
    Fizz
    4
    Buzz
    Fizz
    7
    8
    Fizz
    Buzz
    11
    Fizz
    13
    14
    FizzBuzz
    16
    17
    Fizz
    19
    Buzz
... etc up to 100


# 6. Recently-Used List

Develop a recently-used-list class to hold strings uniquely in Last-In-First-Out order.

- A recently-used-list is initially empty.
- The most recently added item is first, the least recently added item is last.
- Items can be looked up by index, which counts from zero.
- Items in the list are unique, so duplicate insertions are moved rather than added.

Optional extras:

- Null insertions (empty strings) are not allowed.
- A bounded capacity can be specified, so there is an upper limit to the number of items contained, with the least recently added items dropped on overflow.


# 7. Template Engine

Write a "template engine" meaning a way to transform template strings, "Hello {$name}" into "instanced" strings. To do that a variable->value mapping must be provided. For example, if name="Bill" and the template string is "Hello {$name}" the result would be "Hello Bill".

- Should evaluate template single variable expression:

        mapOfVariables.put("name","Bill");
        templateEngine.evaluate("Hello {$name}", mapOfVariables)
        => "Hello Bill"

- Should evaluate template with multiple expressions:

        mapOfVariables.put("firstName","Bill");
        mapOfVariables.put("lastName","Clay");
        templateEngine.evaluate("Hello {$firstName} {$lastName}", mapOfVariables);
        => "Hello Bill Clay"

- Should give error if template variable does not exist in the map:

        map empty
        templateEngine.evaluate("Hello {$firstName} ", mapOfVariables);
        => missingvalueexception

- Should evaluate complex cases:

        mapOfVariables.put("name","Bill");
        templateEngine.evaluate("Hello ${{$name}}", mapOfVariables);
        => should evaluate to "Hello ${Bill}"


# 8. Range

In mathematics we denote a range using open-closed bracket notation: \[0,10) means all real numbers equal to or greater than zero, but less than ten. So 0 lies in this range, while 10 does not.

1. Develop an integer range class, that has the following operations:
**Construction:**

- For example: r = new Range(0,10) // modify to fit your language's syntax

**Checking whether an integer lies in the range:**

- What name do you think is appropriate?

**Intersection of two ranges**, creating a new range consisting of all integers that are in both ranges:

- For example, the intersection of range [0..3] (numbers 0, 1, 2 & 3) and range \[2..4] is the range \[2..3]
- What do you think should happen if the intersection is empty?

1. Develop another class to represent floating point ranges, with the same operations.

- **While developing** the floating point range class, think about how it differs from the integer range.
- **Is it possible to modify** the behaviour of one of them to become more consistent with the behaviour of the other? The more uniform their behaviour, the easier the classes will be to use.
- **If you modify one of the classes** - do you feel confident you do not break anything? If you don’t feel confident, what can you do about that?

source: https://sites.google.com/site/tddproblems/all-problems-1/range



