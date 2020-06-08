<?php
namespace extas\components\generators;

use extas\components\Item;
use extas\components\THasIO;
use extas\interfaces\generators\IGenerator;
use extas\interfaces\generators\IGeneratorDispatcher;
use extas\interfaces\stages\IStageGenerateAfter;
use extas\interfaces\stages\IStageGenerateBefore;

/**
 * Class GeneratorDispatcher
 *
 * @package extas\components\generators
 * @author jeyroik@gmail.com
 */
abstract class GeneratorDispatcher extends Item implements IGeneratorDispatcher
{
    use THasIO;

    /**
     * @param array $sourceItems
     * @return array
     */
    public function __invoke(array $sourceItems): array
    {
        $this->runBefore($sourceItems);
        $result = $this->run($sourceItems);
        $this->runAfter($result);

        return $result;
    }

    /**
     * @return IGenerator
     */
    public function getGenerator(): IGenerator
    {
        return $this->config[static::FIELD__GENERATOR];
    }

    /**
     * @param array $sourceItems
     */
    protected function runBefore(array &$sourceItems): void
    {
        $pluginConfig = $this->getIO();

        $stage = $this->createStageName(IStageGenerateBefore::NAME);
        foreach ($this->getPluginsByStage($stage, $pluginConfig) as $plugin) {
            $plugin($sourceItems);
        }

        foreach ($this->getPluginsByStage(IStageGenerateBefore::NAME, $pluginConfig) as $plugin) {
            $plugin($sourceItems);
        }
    }

    /**
     * @param array $result
     */
    protected function runAfter(array &$result): void
    {
        $pluginConfig = $this->getIO();

        $stage = $this->createStageName(IStageGenerateAfter::NAME);
        foreach ($this->getPluginsByStage($stage, $pluginConfig) as $plugin) {
            $plugin($result);
        }

        foreach ($this->getPluginsByStage(IStageGenerateAfter::NAME, $pluginConfig) as $plugin) {
            $plugin($result);
        }
    }

    /**
     * @param string $stage
     * @return string
     */
    protected function createStageName(string $stage): string
    {
        return $stage . '.' . $this->getGenerator()->getName();
    }

    /**
     * @param array $sourceItems
     * @return array
     */
    abstract protected function run(array $sourceItems): array;


    /**
     * @return string
     */
    protected function getSubjectForExtension(): string
    {
        return static::SUBJECT;
    }
}
