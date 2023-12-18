<?php

namespace CameraAPI\Instructions;

class ClearCameraInstruction extends CameraInstruction
{
    private ?bool $clear = null;

    public function setClear(bool $clear): void
    {
        $this->clear = $clear;
    }

    public function getClear(): bool
    {
        return $this->clear;
    }
}