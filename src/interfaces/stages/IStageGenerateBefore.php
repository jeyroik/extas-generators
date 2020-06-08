<?php
namespace extas\interfaces\stages;

use extas\interfaces\IHasIO;

/**
 * Interface IStageGenerateBefore
 *
 * @package extas\interfaces\stages
 * @author jeyroik <jeyroik@gmail.com>
 */
interface IStageGenerateBefore extends IHasIO
{
    public const NAME = 'extas.generate.before';

    /**
     * @param array $sourceItems
     */
    public function __invoke(array &$sourceItems): void;
}
