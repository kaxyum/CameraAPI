<?php

namespace CameraAPI\Instructions;

use pocketmine\network\mcpe\protocol\CameraShakePacket;
use pocketmine\player\Player;

final class ShakeCameraInstruction extends CameraInstruction
{
    private float $intensity;
    private float $duration;
    private int $shakeType;
    private int $shakeAction;

    public function setIntensity(float $intensity): void
    {
        $this->intensity = $intensity;
    }

    public function setDuration(float $duration): void
    {
        $this->duration = $duration;
    }

    public function setShakeType(int $shakeType): void
    {
        $this->shakeType = $shakeType;
    }

    public function setShakeAction(int $shakeAction): void
    {
        $this->shakeAction = $shakeAction;
    }

    public function send(Player $player): void
    {
        $player->getNetworkSession()->sendDataPacket(CameraShakePacket::create($this->intensity, $this->duration, $this->shakeType, $this->shakeAction));
    }
}
