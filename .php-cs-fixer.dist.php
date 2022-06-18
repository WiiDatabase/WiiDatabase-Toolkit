<?php

$config = new PhpCsFixer\Config();

return $config->setRules([
    '@Symfony' => true,
    'phpdoc_summary' => false,
]);

