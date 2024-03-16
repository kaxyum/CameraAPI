<?php

namespace CameraAPI\Instructions;

use CameraAPI\CameraPresets;
use pocketmine\math\Vector3;
use pocketmine\network\mcpe\protocol\CameraInstructionPacket;
use pocketmine\network\mcpe\protocol\types\camera\CameraPreset;
use pocketmine\network\mcpe\protocol\types\camera\CameraSetInstructionEase;
use pocketmine\network\mcpe\protocol\types\camera\CameraSetInstructionRotation;
use pocketmine\network\mcpe\protocol\types\camera\CameraSetInstruction;
use pocketmine\player\Player;

final class SetCameraInstruction extends CameraInstruction
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

    public function setCameraPosition(Vector3 $cameraPosition): void
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
        $player->getNetworkSession()->sendDataPacket(CameraInstructionPacket::create(new CameraSetInstruction(array_search($this->cameraPreset, CameraPresets::getAll(), true), $this->ease, $this->cameraPosition, $this->rotation, $this->facingPosition, null), null, null));
    }
}
