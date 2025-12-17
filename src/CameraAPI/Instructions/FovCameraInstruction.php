<?php

namespace CameraAPI\Instructions;

use pocketmine\network\mcpe\protocol\CameraInstructionPacket;
use pocketmine\network\mcpe\protocol\types\camera\CameraFadeInstructionColor;
use pocketmine\network\mcpe\protocol\types\camera\CameraFadeInstructionTime;
use pocketmine\network\mcpe\protocol\types\camera\CameraFadeInstruction;
use pocketmine\network\mcpe\protocol\types\camera\CameraFovInstruction;
use pocketmine\player\Player;

final class FovCameraInstruction extends CameraInstruction
{
    private float $fieldOfView;
    private float $easeTime;
    private int $easeType;
    private bool $clear;

    public function setFieldOfView(float $fieldOfView): void
    {
        $this->fieldOfView = $fieldOfView;
    }

    public function setEaseTime(float $easeTime): void
    {
        $this->easeTime = $easeTime;
    }

    public function setEaseType(float $easeType): void
    {
        $this->easeType = $easeType;
    }

    public function setClear(bool $clear): void
    {
        $this->clear = $clear;
    }

    public function send(Player $player): void
    {
        $player->getNetworkSession()->sendDataPacket(CameraInstructionPacket::create(null, null, null, null, null, new CameraFovInstruction($this->fieldOfView, $this->easeTime, $this->easeType, $this->clear), null, null, null));
    }
}