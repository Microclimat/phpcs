About
-----

PHP\_CodeSniffer is a set of two PHP scripts; the main `phpcs` script that tokenizes PHP, JavaScript and CSS files to detect violations of a defined coding standard, and a second `phpcbf` script to automatically correct coding standard violations. PHP\_CodeSniffer is an essential development tool that ensures your code remains clean and consistent.

Installation
------------

1. Install [PHP_CodeSniffer](https://github.com/squizlabs/PHP_CodeSniffer)

2. In command line, go inside the phpcs `Standards` directory

3. Checkout this repository

        git clone https://github.com/Microclimat/phpcs Happy

4. Check the installed coding standards for "Happy"

        phpcs -i

5. Set Happy like default standard

        phpcs --config-set default_standard Happy

6. Done!

Options - Not required but recommanded
----------------------

To use colors in output by default

        phpcs --config-set colors 1

Hiding warnings by default :

        phpcs --config-set show_warnings 0

Usage
------

Launch an analyse

        phpcs /path/to/code
        
Fixing Errors Automatically

        phpcbf /path/to/code

All documentation is [here](https://github.com/squizlabs/PHP_CodeSniffer/wiki)

Just for fun
------------

Use this to show all commits with errors

        phpcs --report=gitblame /path/to/code
