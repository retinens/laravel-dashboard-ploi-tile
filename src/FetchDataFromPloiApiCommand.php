<?php

namespace Retinens\PloiTile;

use Illuminate\Console\Command;
use Ploi\Ploi;

class FetchDataFromPloiApiCommand extends Command
{
    protected $signature = 'dashboard:fetch-data-from-ploi-api';

    protected $description = 'Fetch data for ploi tile';

    public function handle(Ploi $ploi)
    {
        $ploi->setApiToken(env('PLOI_API_TOKEN'));

        $this->info('Fetching Ploi data...');

        $serversData = $ploi->servers()->get()->getData();
        PloiStore::make()->setServers($serversData);

        $this->info('All done!');
    }
}
