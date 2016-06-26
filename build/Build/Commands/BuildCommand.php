<?php

namespace Giggsey\Locale\Build\Commands;

use Giggsey\Locale\Build\DataBuilder;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class BuildCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('Build')
            ->setDescription('Build CLDR data files')
            ->setDefinition(
                array(
                    new InputArgument('Version', InputArgument::REQUIRED, 'Version of the CLDR data'),
                    new InputArgument(
                        'InputDirectory',
                        InputArgument::REQUIRED,
                        'The input directory containing the CLDR data'
                    ),
                    new InputArgument(
                        'OutputDirectory',
                        InputArgument::REQUIRED,
                        'The output directory where the generated data will be stored'
                    ),
                )
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $generateData = new DataBuilder();

        $generateData->generate(
            $input->getArgument('Version'),
            $input->getArgument('InputDirectory'),
            $input->getArgument('OutputDirectory'),
            $output
        );
    }
}
