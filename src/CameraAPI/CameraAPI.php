<?php

namespace CameraAPI;

use CameraAPI\Instructions\CameraInstruction;
use CameraAPI\Instructions\ClearCameraInstruction;
use CameraAPI\Instructions\FadeCameraInstruction;
use CameraAPI\Instructions\SetCameraInstruction;
use pocketmine\network\mcpe\protocol\CameraInstructionPacket;
use pocketmine\network\mcpe\protocol\CameraPresetsPacket;
use pocketmine\network\mcpe\protocol\types\camera\CameraFadeInstruction;
use pocketmine\network\mcpe\protocol\types\camera\CameraSetInstruction;
use pocketmine\player\Player;
use pocketmine\plugin\PluginBase;

class CameraAPI extends PluginBase
{
    public static function sendCameraInstructions(CameraInstruction  $cameraInstruction, Player $player): void
    {
        if ($cameraInstruction instanceof SetCameraInstruction)
        {
            $player->getNetworkSession()->sendDataPacket(CameraPresetsPacket::create(array($cameraInstruction->getPreset())));
            $player->getNetworkSession()->sendDataPacket(CameraInstructionPacket::create(new CameraSetInstruction(0, $cameraInstruction->getEase(), $cameraInstruction->getCameraPostion(), $cameraInstruction->getRotation(), $cameraInstruction->getFacingPosition(), null), null, null));
        }elseif ($cameraInstruction instanceof FadeCameraInstruction)
        {
            $player->getNetworkSession()->sendDataPacket(CameraInstructionPacket::create(null, null, new CameraFadeInstruction($cameraInstruction->getTime(), $cameraInstruction->getColor())));
        }elseif ($cameraInstruction instanceof ClearCameraInstruction)
        {
            $player->getNetworkSession()->sendDataPacket(CameraInstructionPacket::create(null, $cameraInstruction->getClear(), null));
        }
    }
}