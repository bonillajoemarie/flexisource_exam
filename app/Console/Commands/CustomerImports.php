<?php

namespace App\Console\Commands;

use App\Repositories\CustomerImporterRepository;
use Illuminate\Console\Command;

class CustomerImports extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'customer:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import customer from 3rd party API';
    /**
     * @var CustomerImporterRepository
     */
    private $repo;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(CustomerImporterRepository $customerImporterRepository)
    {
        parent::__construct();
        $this->repo = $customerImporterRepository;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->repo->fetchCustomers();
    }
}
