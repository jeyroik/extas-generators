<?php
namespace tests;

use extas\components\generators\GeneratorDispatcher;

/**
 * Class GenerateNothing
 *
 * @package tests
 * @author jeyroik <jeyroik@gmail.com>
 */
class GenerateNothing extends GeneratorDispatcher
{
    /**
     * @param array $sourceItems
     * @return array|string[]
     */
    protected function run(array $sourceItems): array
    {
        return ['is ok'];
    }
}
