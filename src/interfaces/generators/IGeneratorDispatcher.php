<?php
namespace extas\interfaces\generators;

use extas\interfaces\IHasIO;
use extas\interfaces\IItem;

/**
 * Interface IGeneratorDispatcher
 *
 * @package extas\interfaces\generators
 * @author jeyroik@gmail.com
 */
interface IGeneratorDispatcher extends IItem, IHasIO
{
    public const SUBJECT = 'extas.generator.dispatcher';

    public const FIELD__GENERATOR = 'generator';

    /**
     * @param array $sourceItems
     * @return array generated data
     */
    public function __invoke(array $sourceItems): array;

    /**
     * @return IGenerator
     */
    public function getGenerator(): IGenerator;
}
