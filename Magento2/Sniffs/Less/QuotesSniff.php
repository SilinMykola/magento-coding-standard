<?php
/**
 * Copyright 2021 Adobe
 * All Rights Reserved.
 */
namespace Magento2\Sniffs\Less;

use PHP_CodeSniffer\Sniffs\Sniff;
use PHP_CodeSniffer\Files\File;

/**
 * Class QuotesSniff
 *
 * Ensure that single quotes are used
 *
 * @link https://devdocs.magento.com/guides/v2.4/coding-standards/code-standard-less.html#quotes
 */
class QuotesSniff implements Sniff
{
    /**
     * A list of tokenizers this sniff supports.
     *
     * @var array
     */
    public $supportedTokenizers = [TokenizerSymbolsInterface::TOKENIZER_CSS];

    /**
     * @inheritdoc
     */
    public function register()
    {
        return [T_CONSTANT_ENCAPSED_STRING];
    }

    /**
     * @inheritdoc
     */
    public function process(File $phpcsFile, $stackPtr)
    {
        $tokens = $phpcsFile->getTokens();

        if (false !== strpos($tokens[$stackPtr]['content'], '"')) {
            $phpcsFile->addError('Use single quotes', $stackPtr, 'DoubleQuotes');
        }
    }
}
