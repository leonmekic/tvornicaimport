<?php

namespace Factory\InstallBundle\Command;

use Pimcore\Console\AbstractCommand;
use Pimcore\Model\DataObject;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Pimcore\Model\DataObject\ClassDefinition\Service;

class ExportClassCommand extends AbstractCommand
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('factory:classes:export')
            ->setDescription('This is a script for classes export');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $classes = ['City', 'Product'];

        $directory = dirname(__DIR__, 1);

        foreach ($classes as $class) {
            $classDefinition = DataObject\ClassDefinition::getByName($class);
            $classDefinitionJson = Service::generateClassDefinitionJson($classDefinition);

            $file = fopen($directory . "/export/class_" . $class . "_export.json","w");

            fwrite($file,
                $classDefinitionJson
            );

            fclose($file);
        }


        $this->io->text('Classes successfully exported');
        $this->io->text('Files location ' . $directory . '/export/');
    }
}
