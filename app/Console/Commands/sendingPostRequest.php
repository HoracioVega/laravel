<?php

namespace App\Console\Commands;

use App\Repository\CurlRepository;
use Illuminate\Console\Command;

class sendingPostRequest extends Command
{

    private $_client;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sending:post {uri}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sending a post request to https://atomic.incfile.com/';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(CurlRepository $curl)
    {
        parent::__construct();
        $this->_client = $curl;

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
        $this->_client->closeCurl();

        $this->info('Using Curl and the uri response is  : '. $response);
    }
}
