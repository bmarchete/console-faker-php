<?php


namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Helper\Table;

use App\Database\Connection;
use App\Database\QueryBuilder;
use App\Database\FakeData;


class ShowTableData extends Command
{

   
    protected function configure()
    {
         $this
        // the name of the command (the part after "bin/console")
        ->setName('app:show')

        // the short description shown while running "php bin/console list"
        ->setDescription('Mostra dados da tabela.')

        // the full command description shown when running the command with
        // the "--help" option
        ->setHelp('Mostra todos os dados de uma determinada tabela.')

        // ->addArgument('FakeStrategy', InputArgument::REQUIRED, 'O total de linhas a serem inseridas.')
        ->addArgument('tabela', InputArgument::REQUIRED, 'O nome da tabela a consultar.')
        
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
     
    $query = new QueryBuilder(Connection::connect());
       
    $array = $query->select($input->getArgument('tabela'), \PDO::FETCH_ASSOC);

    $headers = array_keys($array[0]);

      $table = new Table($output);
        $table
            ->setHeaders($headers)
            ->setRows($array)
        ;
        $table->setStyle('borderless');
        $table->render();
        
    }
}
