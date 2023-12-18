<?php

namespace CameraAPI\Instructions;

use pocketmine\math\Vector3;
use pocketmine\network\mcpe\protocol\types\camera\CameraPreset;
use pocketmine\network\mcpe\protocol\types\camera\CameraSetInstructionEase;
use pocketmine\network\mcpe\protocol\types\camera\CameraSetInstructionRotation;

class SetCameraInstruction extends CameraInstruction
{
    private ?CameraPreset $cameraPreset = null;
    private ?CameraSetInstructionEase $cameraSetInstructionEase = null;
    private ?Vector3 $cameraPosition = null;
    private ?CameraSetInstructionRotation $cameraSetInstructionRotation = null;
    private ?Vector3 $facingPosition = null;

    public function setPreset(CameraPreset $cameraPreset): void
    {
        $this->cameraPreset = $cameraPreset;
    }

    public function setEase(int $type, float $duration): void
    {
        $this->cameraSetInstructionEase = new CameraSetInstructionEase($type, $duration);
    }

    public function setCameraPostion(Vector3 $cameraPosition): void
    {
        $this->cameraPosition = $cameraPosition;
    }

    public function setRotation(float $pitch, float $yaw): void
    {
        $this->cameraSetInstructionRotation = new CameraSetInstructionRotation($pitch, $yaw);
    }

    public function setFacingPosition(Vector3 $facingPosition): void
    {
        $this->facingPosition = $facingPosition;
    }

    public function getPreset(): CameraPreset
    {
        return $this->cameraPreset;
    }

    public function getEase(): ?CameraSetInstructionEase
    {
        return $this->cameraSetInstructionEase;
    }

    public function getCameraPostion(): ?Vector3
    {
        return $this->cameraPosition;
    }

    public function getRotation(): ?CameraSetInstructionRotation
    {
        return $this->cameraSetInstructionRotation;
    }

    public function getFacingPosition(): ?Vector3
    {
        return $this->facingPosition;
    }
}