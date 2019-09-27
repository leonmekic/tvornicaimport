<?php

namespace Factory\InstallBundle\Command;

use DirectoryIterator;
use Pimcore\Console\AbstractCommand;
use Pimcore\Model\DataObject;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Pimcore\Model\DataObject\ClassDefinition\Service;

class ImportClassCommand extends AbstractCommand
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('factory:classes:import')
            ->setDescription('This is a script for classes import');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $directory = dirname(__DIR__, 1);

        $iterator = new DirectoryIterator($directory . "/export");

        $classNames = [];
        foreach ($iterator as $item) {
            if($item->isDot()) continue;
            $explodedValue = explode("_", $item->getFilename());
            $classNames[$directory . "/export/" .$item->getFilename()] = $explodedValue[1];
        }

        foreach ($classNames as $file => $className) {
            $handle = fopen($file,"r");
            $data = fread($handle,filesize($file));
            $class = new DataObject\ClassDefinition;
            $class->setName($className);

            $importClassDefinitionJson = Service::importClassDefinitionFromJson($class, $data);
        }

        $this->io->text('Class successfully exported');
    }
}
