<?php

namespace CameraAPI\Instructions;

use pocketmine\math\Vector3;
use pocketmine\network\mcpe\protocol\CameraInstructionPacket;
use pocketmine\network\mcpe\protocol\types\camera\CameraTargetInstruction;
use pocketmine\player\Player;

final class TargetCameraInstruction extends CameraInstruction
{
    private ?Vector3 $targetCenterOffset = null;
    private int $actorUniqueId;

    public function setTargetCenterOffset(Vector3 $targetCenterOffset): void
    {
        $this->targetCenterOffset = $targetCenterOffset;
    }

    public function setActorUniqueId(int $actorUniqueId): void
    {
        $this->actorUniqueId = $actorUniqueId;
    }

    public function send(Player $player): void
    {
        $player->getNetworkSession()->sendDataPacket(CameraInstructionPacket::create(null, null, null, new CameraTargetInstruction($this->targetCenterOffset, $this->actorUniqueId), null, null, null, null, null));
    }
}
