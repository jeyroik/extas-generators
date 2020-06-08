<?php
namespace extas\interfaces\stages;

use extas\interfaces\IHasIO;

/**
 * Interface IStageGenerateAfter
 *
 * @package extas\interfaces\stages
 * @author jeyroik <jeyroik@gmail.com>
 */
interface IStageGenerateAfter extends IHasIO
{
    public const NAME = 'extas.generate.after';

    /**
     * @param array $result
     */
    public function __invoke(array &$result): void;
}
