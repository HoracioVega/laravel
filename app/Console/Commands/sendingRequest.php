<?php

namespace App\Console\Commands;

use App\Repository\GuzzleRepository;
use Illuminate\Console\Command;

class sendingRequest extends Command
{
    private $_client;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sendingRequest:post {uri}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sending Request Using Guzzle';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(GuzzleRepository $client)
    {
        parent::__construct();
        $this->_client = $client;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //

        $this->_client->setUri($this->argument('uri'));
        $response = $this->_client->sendRequest();
        $this->info('Using Guzzle and the uri response is  : '. $response);

    }
}
