<?php

namespace CameraAPI\Instructions;

use pocketmine\network\mcpe\protocol\CameraInstructionPacket;
use pocketmine\player\Player;

final class ClearCameraInstruction extends CameraInstruction
{
    private ?bool $clear = true;

    public function setClear(bool $clear): void
    {
        $this->clear = $clear;
    }

    public function send(Player $player): void
    {
        $player->getNetworkSession()->sendDataPacket(CameraInstructionPacket::create(null, $this->clear, null));
    }
}
