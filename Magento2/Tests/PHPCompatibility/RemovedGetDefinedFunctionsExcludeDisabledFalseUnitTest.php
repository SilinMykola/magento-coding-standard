<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento2\Tests\PHPCompatibility;

/**
 * Test the RemovedGetDefinedFunctionsExcludeDisabledFalse sniff.
 *
 * @covers \Magento2\Sniffs\PHPCompatibility\RemovedGetDefinedFunctionsExcludeDisabledFalseSniff
 */
class RemovedGetDefinedFunctionsExcludeDisabledFalseUnitTest extends \PHPCompatibility\Tests\ParameterValues\RemovedGetDefinedFunctionsExcludeDisabledFalseUnitTest
{
    /**
     * @inheritdoc
     */
    protected function getSniffCode()
    {
        return 'Magento2.PHPCompatibility.RemovedGetDefinedFunctionsExcludeDisabledFalse';
    }
}
