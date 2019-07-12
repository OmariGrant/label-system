<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Symfony\Component\Process\Process;

class TestRun extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'label:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run test for API';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        Process::fromShellCommandline('vendor/bin/phpunit');

        $client = new Client([
            'base_uri' => 'http://localhost:8000/api/'
        ]);


        //create heating label
        $response = $client->post('labels', [

            RequestOptions::JSON => [
                'Name' => 'Heating Engineer',
                'Slug' => 'Heating Engineer',
                'Path' => 'Heating Engineer',
                'TextColour' => 'black',
                'BGColour' => 'orange',
            ]
        ]);

        echo $response->getBody();

        //create electricians
        $response = $client->post('labels', [

            RequestOptions::JSON => [
                'Name' => 'Electricians',
                'Slug' => 'Electricians',
                'Path' => 'Electricians',
                'TextColour' => 'black',
                'BGColour' => 'green',
            ]
        ]);

        echo $response->getBody();

        //create boiler
        $response = $client->post('labels', [

            RequestOptions::JSON => [
                'Name' => 'Boiler',
                'Slug' => 'Boiler',
                'Path' => 'Heating Engineer/Boiler',
                'TextColour' => 'black',
                'BGColour' => 'green',
            ]
        ]);

        echo $response->getBody();

        //create Baxi
        $response = $client->post('labels', [

            RequestOptions::JSON => [
                'Name' => 'Baxi',
                'Slug' => 'Baxi',
                'Path' => 'Heating Engineer/Boiler/Baxi',
                'TextColour' => 'black',
                'BGColour' => 'green',
            ]
        ]);

        echo $response->getBody();

        //create ideal
        $response = $client->post('labels', [

            RequestOptions::JSON => [
                'Name' => 'Ideal',
                'Slug' => 'Ideal',
                'Path' => 'Heating Engineer/Boiler/Ideal',
                'TextColour' => 'black',
                'BGColour' => 'green',
            ]
        ]);

        echo $response->getBody();

        //create Cylinder
        $response = $client->post('labels', [

            RequestOptions::JSON => [
                'Name' => 'Cylinder',
                'Slug' => 'Cylinder',
                'Path' => 'Heating Engineer/Cylinder',
                'TextColour' => 'black',
                'BGColour' => 'green',
            ]
        ]);

        echo $response->getBody();

        //get Heating
        $response = $client->request('GET', 'labels/2');
        echo $response->getBody();

        //update Ideal
        $response = $client->put('labels/5', [
                RequestOptions::JSON => [
                    'Name' => 'Worcester',
                    'Slug' => 'Worcester',
                    'Path' => 'Heating Engineer/Boiler/Worcester',
                    'TextColour' => 'black',
                    'BGColour' => 'green',
                ]
        ]
        );
        echo $response->getBody();

        //delete baxi
        $response = $client->delete('labels/4');
        echo $response->getBody();

        //get Heating
        $response = $client->request('GET', 'labels/2');
        echo $response->getBody();

        //create Baxi
        $response = $client->post('labels', [

            RequestOptions::JSON => [
                'Name' => 'Baxi',
                'Slug' => 'Baxi',
                'Path' => 'Heating Engineer/Boiler/Baxi',
                'TextColour' => 'black',
                'BGColour' => 'green',
            ]
        ]);

        echo $response->getBody();

        //create ideal
        $response = $client->post('labels', [

            RequestOptions::JSON => [
                'Name' => 'Worcester',
                'Slug' => 'Worcester',
                'Path' => 'Heating Engineer/Boiler/Worcester',
                'TextColour' => 'black',
                'BGColour' => 'green',
            ]
        ]);

        echo $response->getBody();

        //get Heating
        $response = $client->request('GET', 'labels/2');
        echo $response->getBody();


    }

    public function create($client, $name)
    {
        $response = $client->post('labels', [

            RequestOptions::JSON => [
                'Name' => $name,
                'Slug' => $name,
                'Path' => $name,
                'TextColour' => 'black',
                'BGColour' => 'orange',
            ]
        ]);

        echo $response->getBody();
    }
}
