<?php
$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__)
    ->exclude('var')
    ->exclude('assets')
    ->exclude('config')
    ->exclude('node_modules');

$config = new PhpCsFixer\Config();

return $config->setRules([
    '@PSR12' => true,
    '@Symfony' => true,
    '@Symfony:risky' => true,
    '@PHP80Migration' => true,
    '@DoctrineAnnotation' => true,
    'array_syntax' => ['syntax' => 'short'],
    'declare_strict_types' => true,
])
    ->setFinder($finder)
    ->setRiskyAllowed(true);
