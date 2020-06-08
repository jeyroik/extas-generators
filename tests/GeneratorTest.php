<?php
namespace tests;

use extas\interfaces\stages\IStageGenerateAfter;
use extas\interfaces\stages\IStageGenerateBefore;

use extas\components\console\TSnuffConsole;
use extas\components\generators\Generator;
use extas\components\plugins\PluginEmpty;
use extas\components\plugins\PluginRepository;
use extas\components\plugins\TSnuffPlugins;
use extas\components\repositories\TSnuffRepository;

use Dotenv\Dotenv;
use PHPUnit\Framework\TestCase;

/**
 * Class GeneratorTest
 *
 * @package tests
 * @author jeyroik@gmail.com
 */
class GeneratorTest extends TestCase
{
    use TSnuffConsole;
    use TSnuffRepository;
    use TSnuffPlugins;

    protected function setUp(): void
    {
        parent::setUp();
        $env = Dotenv::create(getcwd() . '/tests/');
        $env->load();
        $this->registerSnuffRepos([
            'pluginRepository' => PluginRepository::class
        ]);
    }

    protected function tearDown(): void
    {
        $this->unregisterSnuffRepos();
    }

    public function testGenerateByPluginInstallDefault()
    {
        $this->createSnuffPlugin(PluginEmpty::class, [
            IStageGenerateBefore::NAME . '.test',
            IStageGenerateBefore::NAME,
            IStageGenerateAfter::NAME . '.test',
            IStageGenerateAfter::NAME
        ]);
        $generator = new Generator([
            Generator::FIELD__NAME => 'test',
            Generator::FIELD__CLASS => GenerateNothing::class
        ]);
        $result = $generator->run([], $this->getInput(), $this->getOutput());
        $this->assertEquals(['is ok'], $result);
        $this->assertEquals(4, PluginEmpty::$worked);
    }
}
