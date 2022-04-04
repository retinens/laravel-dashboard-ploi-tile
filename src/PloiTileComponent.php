<?php

namespace Retinens\PloiTile;

use Livewire\Component;

class PloiTileComponent extends Component
{
    public $position;

    public function mount(string $position)
    {
        $this->position = $position;
    }


    public function render()
    {
        return view('dashboard-ploi-tile::tile', [
            'servers' => PloiStore::make()->servers(),
            'refreshIntervalInSeconds' => config('dashboard.tiles.ploi.refresh_interval_in_seconds') ?? 60,
        ]);
    }
}
