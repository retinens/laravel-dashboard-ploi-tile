<?php

namespace Retinens\PloiTile;

use Spatie\Dashboard\Models\Tile;

class PloiStore
{
    private Tile $tile;

    public static function make()
    {
        return new static();
    }

    public function __construct()
    {
        $this->tile = Tile::firstOrCreateForName("ploi-tile");
    }

    public function setData(array $data): self
    {
        $this->tile->putData('key', $data);

        return $this;
    }

    public function getData(): array
    {
        return$this->tile->getData('key') ?? [];
    }

    public function setServers(array $servers): self
    {
        $this->tile->putData('servers', $servers);

        return $this;
    }

    public function servers()
    {
        return $this->tile->getData('servers') ?? [];
    }

}
