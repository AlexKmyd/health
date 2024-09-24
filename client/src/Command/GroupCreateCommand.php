<?php


namespace App\Command;


use App\Services\ApiService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class GroupCreateCommand extends Command
{
    public function __construct(protected ApiService $service, ?string $name = null)
    {
        parent::__construct($name);
    }

    protected function configure()
    {
        $this->setName("group:create")
            ->addArgument('name')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $response = $this->service->createGroup($input->getArgument('name'));
        $output->write(print_r($response, true));
        exit(0);
    }
}