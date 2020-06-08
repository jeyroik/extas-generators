<?php
namespace extas\components\generators;

use extas\components\repositories\Repository;
use extas\interfaces\generators\IGeneratorRepository;

/**
 * Class GeneratorRepository
 *
 * @package extas\components\generators
 * @author jeyroik@gmail.com
 */
class GeneratorRepository extends Repository implements IGeneratorRepository
{
    protected string $name = 'generators';
    protected string $scope = 'extas';
    protected string $pk = Generator::FIELD__NAME;
    protected string $itemClass = Generator::class;
}
