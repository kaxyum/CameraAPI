<?php

namespace CameraAPI\Instructions;

use pocketmine\network\mcpe\protocol\types\camera\CameraFadeInstructionColor;
use pocketmine\network\mcpe\protocol\types\camera\CameraFadeInstructionTime;

class FadeCameraInstruction extends CameraInstruction
{
    private ?CameraFadeInstructionTime $cameraFadeInstructionTime = null;
    private ?CameraFadeInstructionColor $cameraFadeInstructionColor = null;

    public function setTime(float $fadeInTime, float $stayInTime, float $fadeOutTime): void
    {
        $this->cameraFadeInstructionTime = new CameraFadeInstructionTime($fadeInTime, $stayInTime, $fadeOutTime);
    }

    public function setColor(float $red, float $green, float $blue): void
    {
        $this->cameraFadeInstructionColor = new CameraFadeInstructionColor($red, $green, $blue);
    }

    public function getTime(): ?CameraFadeInstructionTime
    {
        return $this->cameraFadeInstructionTime;
    }

    public function getColor(): ?CameraFadeInstructionColor
    {
        return $this->cameraFadeInstructionColor;
    }
}