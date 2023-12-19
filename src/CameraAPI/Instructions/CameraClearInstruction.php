<?php

namespace CameraAPI\Instructions;

use pocketmine\network\mcpe\protocol\CameraInstructionPacket;
use pocketmine\player\Player;

final class CameraClearInstruction extends CameraInstruction
{
    private ?bool $clear = null;

    public function setClear(bool $clear): void
    {
        $this->clear = $clear;
    }

    public function send(Player $player): void
    {
        $player->getNetworkSession()->sendDataPacket(CameraInstructionPacket::create(null, $this->clear, null));
    }
}