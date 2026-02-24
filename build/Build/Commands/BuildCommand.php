<?php

declare(strict_types=1);

namespace Giggsey\Locale\Build\Commands;

use Giggsey\Locale\Build\DataBuilder;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Process\Process;
use RuntimeException;

class BuildCommand extends Command
{
    private const GIT_URL = 'https://github.com/unicode-org/cldr-json.git';
    private const GIT_PATH = 'cldr-json';

    protected function configure()
    {
        $this
            ->setName('Build')
            ->setDescription('Build CLDR data files');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);
        $fs = new Filesystem();

        $versionContent = (string) file_get_contents(__DIR__ . '/../../../CLDR-VERSION.txt');
        $lines = explode("\n", $versionContent);
        $version = '';
        foreach ($lines as $line) {
            $line = trim($line);
            if ($line !== '' && !str_starts_with($line, '#')) {
                $version = $line;
                break;
            }
        }
        if ($version === '') {
            throw new RuntimeException('Could not determine CLDR version from CLDR-VERSION.txt');
        }
        $io->info(sprintf('Building CLDR data for version: %s', $version));

        // Cleanup data directory
        $io->section('Cleaning up data directory');
        $outputDir = 'data/';
        if ($fs->exists($outputDir)) {
            $fs->remove($outputDir);
        }
        $fs->mkdir($outputDir);
        $io->success('Data directory cleaned.');

        // Git pull
        $io->section('Updating CLDR repository');
        if (!$fs->exists(self::GIT_PATH)) {
            $io->writeln(sprintf('Cloning repository: %s', self::GIT_URL));
            $process = new Process(['git', 'clone', self::GIT_URL, self::GIT_PATH]);
            $process->mustRun(function ($type, $buffer) use ($io) {
                $io->write($buffer);
            });
        }

        $io->writeln('Fetching all branches');
        $process = new Process(['git', 'fetch', '--all'], self::GIT_PATH);
        $process->mustRun(function ($type, $buffer) use ($io) {
            $io->write($buffer);
        });

        $io->writeln(sprintf('Checking out version: %s', $version));
        $process = new Process(['git', 'checkout', $version], self::GIT_PATH);
        $process->mustRun(function ($type, $buffer) use ($io) {
            $io->write($buffer);
        });
        $io->success('CLDR repository updated.');

        $io->section('Generating CLDR data');
        $inputDir = self::GIT_PATH . '/cldr-json/cldr-localenames-full/main/';
        $generateData = new DataBuilder();
        $generateData->generate(
            $version,
            $inputDir,
            $outputDir,
            $output
        );
        $io->success('CLDR data generated successfully.');

        return Command::SUCCESS;
    }
}
