<?php
namespace extas\components\generators;

use extas\components\Item;
use extas\components\TDispatcherWrapper;
use extas\components\THasTags;
use extas\interfaces\generators\IGeneratorDispatcher;
use extas\interfaces\generators\IGenerator;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class Generator
 *
 * @package extas\components\generators
 * @author jeyroik@gmail.com
 */
class Generator extends Item implements IGenerator
{
    use TDispatcherWrapper;
    use THasTags;

    /**
     * @param array $sourceItems
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return array
     */
    public function run(array $sourceItems, InputInterface $input, OutputInterface $output): array
    {
        $dispatcher = $this->buildClassWithParameters([
            IGeneratorDispatcher::FIELD__INPUT => $input,
            IGeneratorDispatcher::FIELD__OUTPUT => $output,
            IGeneratorDispatcher::FIELD__GENERATOR => $this
        ]);

        return  $dispatcher($sourceItems);
    }

    /**
     * @return string
     */
    protected function getSubjectForExtension(): string
    {
        return static::SUBJECT;
    }
}
