<?php

namespace CameraAPI\Instructions;

use pocketmine\network\mcpe\protocol\CameraSplinePacket;
use pocketmine\player\Player;

final class SplineCameraInstruction extends CameraInstruction
{
    private array $splines = [];

    public function setSplines(array $splines): void
    {
        $this->splines = $splines;
    }

    public function send(Player $player): void
    {
        $player->getNetworkSession()->sendDataPacket(CameraSplinePacket::create($this->splines));
    }
}
