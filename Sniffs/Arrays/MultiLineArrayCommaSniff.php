<?php
/**
 * This file is part of the Happy-coding-standard (phpcs standard)
 *
 * PHP version 5
 *
 * @category PHP
 * @package  PHP_CodeSniffer-Happy
 * @author   wicliff wolda <dev@bloody-wicked.com>
 * @license  http://spdx.org/licenses/MIT MIT License
 * @version  GIT: master
 * @link     https://github.com/escapestudios/Happy-coding-standard
 */

/**
 * Happy_Sniffs_WhiteSpace_MultiLineArrayCommaSniff.
 *
 * Throws warnings if the last item in a multi line array does not have a
 * trailing comma
 *
 * @category PHP
 * @package  PHP_CodeSniffer-Happy
 * @author   wicliff wolda <dev@bloody-wicked.com>
 * @license  http://spdx.org/licenses/MIT MIT License
 * @link     https://github.com/escapestudios/Happy-coding-standard
 */
class Happy_Sniffs_Arrays_MultiLineArrayCommaSniff
    implements PHP_CodeSniffer_Sniff
{
    /**
     * A list of tokenizers this sniff supports.
     *
     * @var array
     */
    public $supportedTokenizers = array(
                                   'PHP',
                                  );

    /**
     * Returns an array of tokens this test wants to listen for.
     *
     * @return array
     */
    public function register()
    {
        return array(
                T_ARRAY,
                T_OPEN_SHORT_ARRAY,
               );

    }//end register()

    /**
     * Processes this test, when one of its tokens is encountered.
     *
     * @param PHP_CodeSniffer_File $phpcsFile The file being scanned.
     * @param int                  $stackPtr  The position of the current token
     *                                        in the stack passed in $tokens.
     *
     * @return void
     */
    public function process(PHP_CodeSniffer_File $phpcsFile, $stackPtr)
    {
        $tokens = $phpcsFile->getTokens();
        $open   = $tokens[$stackPtr];

        if ($open['code'] === T_ARRAY) {
            $closePtr = $open['parenthesis_closer'];
        } else {
            $closePtr = $open['bracket_closer'];
        }

        if ($open['line'] <> $tokens[$closePtr]['line']) {
            $lastComma = $phpcsFile->findPrevious(T_COMMA, $closePtr);

            while ($lastComma < $closePtr -1) {
                $lastComma++;

                if ($tokens[$lastComma]['code'] !== T_WHITESPACE) {
                    $phpcsFile->addError(
                        'Add a comma after each item in a multi-line array',
                        $stackPtr,
                        'Invalid'
                    );
                    break;
                }
            }
        }

    }//end process()

}//end class

