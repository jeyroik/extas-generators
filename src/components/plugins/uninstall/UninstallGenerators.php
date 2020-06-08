<?php
namespace extas\components\plugins\uninstall;

use extas\components\generators\Generator;

/**
 * Class UninstallGenerators
 *
 * @package extas\components\plugins\init
 * @author jeyroik@gmail.com
 */
class UninstallGenerators extends UninstallSection
{
    protected string $selfRepositoryClass = 'generatorRepository';
    protected string $selfUID = Generator::FIELD__NAME;
    protected string $selfSection = 'generators';
    protected string $selfName = 'generator';
    protected string $selfItemClass = Generator::class;
}
