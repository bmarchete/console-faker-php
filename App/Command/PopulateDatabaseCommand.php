<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

use App\Database\Connection;
use App\Database\QueryBuilder;
use App\Database\FakeData;

class PopulateDatabaseCommand extends Command
{

   
    protected function configure()
    {
         $this
        // the name of the command (the part after "bin/console")
        ->setName('app:seed')

        // the short description shown while running "php bin/console list"
        ->setDescription('Preenche tabela.')

        // the full command description shown when running the command with
        // the "--help" option
        ->setHelp('Gera dados aleatórios para uma tabela.')

        // ->addArgument('FakeStrategy', InputArgument::REQUIRED, 'O total de linhas a serem inseridas.')
        ->addArgument('total', InputArgument::REQUIRED, 'O total de linhas a serem inseridas.')
        
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
     
        $query = new QueryBuilder(Connection::connect());
       
        $query->seed(FakeData::getTable(), FakeData::getData($input->getArgument('total')));

        echo 'Dados inseridos!';
    }
}
