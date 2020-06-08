<?php
namespace extas\interfaces\generators;

use extas\interfaces\IDispatcherWrapper;
use extas\interfaces\IHasTags;
use extas\interfaces\IItem;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Interface IGenerator
 *
 * @package extas\interfaces\generators
 * @author jeyroik@gmail.com
 */
interface IGenerator extends IItem, IDispatcherWrapper, IHasTags
{
    public const SUBJECT = 'extas.jsonrpc.generator';

    /**
     * @param array $sourceItems
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return array
     */
    public function run(array $sourceItems, InputInterface $input, OutputInterface $output): array;
}
