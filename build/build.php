#!/usr/bin/env php
<?php

require __DIR__ . '/../vendor/autoload.php';

$app = new \Symfony\Component\Console\Application('Locale Build');
$app->add(new \Giggsey\Locale\Build\Commands\BuildCommand);

$app->run();
