About
-----

PHP\_CodeSniffer is a set of two PHP scripts; the main `phpcs` script that tokenizes PHP, JavaScript and CSS files to detect violations of a defined coding standard, and a second `phpcbf` script to automatically correct coding standard violations. PHP\_CodeSniffer is an essential development tool that ensures your code remains clean and consistent.

Installation
------------

1. Install [PHP_CodeSniffer](https://github.com/squizlabs/PHP_CodeSniffer)

2. In command line, go inside the phpcs `Standards` directory
> Under Linux Mint, the path is `/usr/share/php/PHP/CodeSniffer/Standards/`

3. Checkout this repository

        git clone git@github.com:Microclimat/phpcs.git Happy

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
        
Ignoring 

        <?php
        some_code();
        // @codingStandardsIgnoreStart
        this_will_be_ignored();
        // @codingStandardsIgnoreEnd
        some_other_code();

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


To use PHP CS on sublime Text
------------------------------

Use http://benmatselby.github.io/sublime-phpcs/
On win7 : Preference > Package Settings > Php Code Sniffer > Settings - User
 
```
{
    // Example for:
    // - Windows 7
    // - With phpcs and php-cs-fixer support

    // We want debugging on
    "show_debug": true,

    // Only execute the plugin for php files
    "extensions_to_execute": ["php"],

    // Do not execute for twig files
    "extensions_to_blacklist": ["twig.php"],

    // Execute the sniffer on file save
    "phpcs_execute_on_save": true,

    // Show the error list after save.
    "phpcs_show_errors_on_save": true,

    // Show the errors in the gutter
    "phpcs_show_gutter_marks": true,

    // Show outline for errors
    "phpcs_outline_for_errors": true,

    // Show the errors in the status bar
    "phpcs_show_errors_in_status": true,

    // Show the errors in the quick panel so you can then goto line
    "phpcs_show_quick_panel": true,

    // Path to php on windows installation
    // This is needed as we cannot run phars on windows, so we run it through php
    "phpcs_php_prefix_path": "C:\\Program Files (x86)\\PHP\\php.exe",

    // We want the fixer to be run through the php application
    "phpcs_commands_to_php_prefix": ["Fixer"],


    // PHP_CodeSniffer settings
    // Yes, run the phpcs command
    "phpcs_sniffer_run": true,

    // And execute it on save
    "phpcs_command_on_save": true,

    // This is the path to the bat file when we installed PHP_CodeSniffer
    "phpcs_executable_path": "C:\\Program Files (x86)\\PHP\\PEAR\\phpcs.bat",

    // I want to run the PSR2 standard, and ignore warnings
    "phpcs_additional_args": {
        "--standard": "PSR2",
        "-n": ""
    },


    // PHP-CS-Fixer settings
    // Don't want to auto fix issue with php-cs-fixer
    "php_cs_fixer_on_save": false,

    // Show the quick panel
    "php_cs_fixer_show_quick_panel": true,

    // The fixer phar file is stored here:
    "php_cs_fixer_executable_path": "C:\\Program Files (x86)\\PHP\\PEAR\\php-cs-fixer.phar",

    // Additional arguments, run all levels of fixing
    "php_cs_fixer_additional_args": {
    },


    // PHP Linter settings
    // Yes, lets lint the files
    "phpcs_linter_run": true,

    // And execute that on each file when saved (php only as per extensions_to_execute)
    "phpcs_linter_command_on_save": true,

    // Path to php
    "phpcs_php_path": "C:\\Program Files (x86)\\PHP\\php.exe",

    // This is the regex format of the errors
    "phpcs_linter_regex": "(?P<message>.*) on line (?P<line>\\d+)",


    // PHP Mess Detector settings
    // Not turning on the mess detector here
    "phpmd_run": false,
    "phpmd_command_on_save": false,
    "phpmd_executable_path": "",
    "phpmd_additional_args": {}
}
```
and change PATH with your own values

## Using phpcs with GrumPHP (inspection before commit)

First of all, you'll need grumphp : https://github.com/phpro/grumphp
Follow the instructions, and add a task of type phpcs into your grumphp.yml (edit it like in the below example).
You should have this written in your file :
```
parameters:
    git_dir: .
    bin_dir: vendor/bin
    tasks:
        phpcs:
            standard: "vendor/happytech/phpcs/Happy"
            show_warnings: true
            tab_width: ~
            whitelist_patterns: []
            encoding: ~
            ignore_patterns: []
            sniffs: []
            triggered_by: [php]
```
Go in your project's root folder, launch a terminal and type

```
composer require --dev happytech/phpcs
```

This will add the Happy convention and phpcs to your vendors and update your composer.json

Next, try to commit !
