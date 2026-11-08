<?php

namespace CameraAPI\Instructions;

use CameraAPI\CameraAimAssistPresets;
use pocketmine\math\Vector2;
use pocketmine\network\mcpe\protocol\CameraAimAssistPacket;
use pocketmine\network\mcpe\protocol\types\camera\CameraAimAssistActionType;
use pocketmine\network\mcpe\protocol\types\camera\CameraAimAssistPreset;
use pocketmine\network\mcpe\protocol\types\camera\CameraAimAssistTargetMode;
use pocketmine\player\Player;

final class AimAssistCameraInstruction extends CameraInstruction
{
    private CameraAimAssistPreset $cameraAimAssistPreset;
    private Vector2 $viewAngle;
    private float $distance;
    private CameraAimAssistTargetMode $targetMode;
    private CameraAimAssistActionType $actionType;
    private bool $showDebugRender;

    public function setCameraAimAssistPreset(CameraAimAssistPreset $cameraAimAssistPreset): void
    {
        $this->cameraAimAssistPreset = $cameraAimAssistPreset;
    }

    public function setViewAngle(Vector2 $viewAngle): void
    {
        $this->viewAngle = $viewAngle;
    }

    public function setDistance(float $distance): void
    {
        $this->distance = $distance;
    }

    public function setTargetMode(CameraAimAssistTargetMode $targetMode): void
    {
        $this->targetMode = $targetMode;
    }

    public function setActionType(CameraAimAssistActionType $actionType): void
    {
        $this->actionType = $actionType;
    }

    public function setShowDebugRender(bool $showDebugRender): void
    {
        $this->showDebugRender = $showDebugRender;
    }

    public function send(Player $player): void
    {
        $player->getNetworkSession()->sendDataPacket(CameraAimAssistPacket::create(array_search($this->cameraAimAssistPreset, CameraAimAssistPresets::getAll(), true), $this->viewAngle, $this->distance, $this->targetMode, $this->actionType, $this->showDebugRender));
    }
}
