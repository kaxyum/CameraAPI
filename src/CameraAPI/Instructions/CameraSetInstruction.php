<?php

namespace CameraAPI\Instructions;

use pocketmine\math\Vector3;
use pocketmine\network\mcpe\protocol\CameraInstructionPacket;
use pocketmine\network\mcpe\protocol\CameraPresetsPacket;
use pocketmine\network\mcpe\protocol\types\camera\CameraPreset;
use pocketmine\network\mcpe\protocol\types\camera\CameraSetInstructionEase;
use pocketmine\network\mcpe\protocol\types\camera\CameraSetInstructionRotation;
use pocketmine\network\mcpe\protocol\types\camera\CameraSetInstruction as CameraSetInstructionPM;
use pocketmine\player\Player;

final class CameraSetInstruction extends CameraInstruction
{
    private ?CameraPreset $cameraPreset = null;
    private ?CameraSetInstructionEase $ease = null;
    private ?Vector3 $cameraPosition = null;
    private ?CameraSetInstructionRotation $rotation = null;
    private ?Vector3 $facingPosition = null;

    public function setPreset(CameraPreset $cameraPreset): void
    {
        $this->cameraPreset = $cameraPreset;
    }

    public function setEase(int $type, float $duration): void
    {
        $this->ease = new CameraSetInstructionEase($type, $duration);
    }

    public function setCameraPostion(Vector3 $cameraPosition): void
    {
        $this->cameraPosition = $cameraPosition;
    }

    public function setRotation(float $pitch, float $yaw): void
    {
        $this->rotation = new CameraSetInstructionRotation($pitch, $yaw);
    }

    public function setFacingPosition(Vector3 $facingPosition): void
    {
        $this->facingPosition = $facingPosition;
    }

    public function send(Player $player): void
    {
        $player->getNetworkSession()->sendDataPacket(CameraPresetsPacket::create(array($this->cameraPreset)));
        $player->getNetworkSession()->sendDataPacket(CameraInstructionPacket::create(new CameraSetInstructionPM(0, $this->ease, $this->cameraPosition, $this->rotation, $this->facingPosition, null), null, null));
    }
}