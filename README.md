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
        
To register PHP Code Sniffer in IntelliJ IDEA
---------------------------------------------

Open the Settings dialog box, and click Code Sniffer under the PHP node.
In the PHP Code Sniffer path text box, specify the location of the Code Sniffer executable phpcs.bat. Type the path manually or click the Browse button browseButton.png and select the path in the dialog box, that opens.
To check that the specified path to phpcs.bat ensures interaction between IntelliJ IDEA and Code Sniffer, that is, the tool can be launched from IntelliJ IDEA and IntelliJ IDEA will receive problem reports from it, click the Validate button. This validation is equal to running the phpcs --version command. If validation passes successfully, IntelliJ IDEA displays the information on the detected Code Sniffer version.

To configure PHP Code Sniffer as a IntelliJ IDEA inspection
-----------------------------------------------------------

Open the Settings dialog box, and click Inspections.
On the Inspections page that opens, select the PHP Code Sniffer validation check box under the PHP node.
On the right-hand pane of the page, configure the PHP Code Sniffer tool using the controls in the Options area:
From the Severity drop-down list, choose the severity degree for the Code Sniffer inspection. The selected value determines how serious the detected discrepancies will be treated by IntelliJ IDEA and presented in the inspection results.
In the Coding standard drop-down list, appoint the coding style to check your code against. The list contains all the coding standards installed inside the main PHP_CodeSniffer directory structure.
Use one of the predefined coding standards or choose Custom to appoint your own standard.
Optionally, select the Ignore warnings check box to have only errors reported and suppress reporting warnings. This option is equal to the -n command line argument.
