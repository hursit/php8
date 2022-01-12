<?php

namespace App\Command;

use App\Service\AttributeTest\AttributeTest;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'attribute:test:command',
    description: 'Add a short description for your command',
)]
class AttributeTestCommand extends Command
{
    protected function execute (InputInterface $input, OutputInterface $output): int
    {
        $reflection = new \ReflectionClassConstant(AttributeTest::class, 'GILDAS');

        foreach ($reflection->getAttributes() as $attribute) {
            $output->writeln($attribute->getName() . " ");

            print_r($attribute->newInstance());
        }
        die;


        $reflection = new \ReflectionClass(AttributeTest::class);

        print_r($reflection->getAttributes());

        return Command::SUCCESS;
    }
}
