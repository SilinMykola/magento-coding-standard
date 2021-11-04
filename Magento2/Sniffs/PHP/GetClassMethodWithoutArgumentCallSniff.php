<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types = 1);

namespace Magento2\Sniffs\PHP;

use PHP_CodeSniffer\Sniffs\Sniff;
use PHP_CodeSniffer\Files\File;

/**
 * Custom phpcs sniff to detect deprecated method calls
 * get_class(), get_parent_class() and get_called_class() without argument.
 */
class GetClassMethodWithoutArgumentCallSniff implements Sniff
{
    /**
     * Array of methods whose call without parameters is deprecated
     */
    private const DEPRECATED_GET_CLASS_METHODS = [
        'get_class', 'get_parent_class', 'get_called_class'
    ];
    /**
     * @inheritdoc
     */
    public function register(): array
    {
        return [
            T_STRING
        ];
    }

    /**
     * @inheritdoc
     */
    public function process(File $phpcsFile, $stackPtr): void
    {
        $tokens = $phpcsFile->getTokens();
        if (in_array($tokens[$stackPtr]['content'], self::DEPRECATED_GET_CLASS_METHODS)
            && $phpcsFile->findNext(T_OPEN_PARENTHESIS, $stackPtr)
            && $phpcsFile->findNext(T_OPEN_PARENTHESIS, $stackPtr + 1)
        ) {
            $method = $tokens[$stackPtr]['content'];
            $error = 'Deprecated: Call method without argument is deprecated.';
            $phpcsFile->addError($error, $method, 'GetClassMethodWithoutArgumentCall');
        }
    }
}
