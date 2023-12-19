<?php

namespace CameraAPI;

use pocketmine\network\mcpe\protocol\types\camera\CameraPreset;
use pocketmine\player\Player;

class CameraPresets
{
    public static function FREE(): CameraPreset
    {
        return new CameraPreset("minecraft:free", "", 0, 0, 0, 0, 0, CameraPreset::AUDIO_LISTENER_TYPE_CAMERA, false);
    }

    public static function FIRST_PERSON(): CameraPreset
    {
        return new CameraPreset("minecraft:first_person", "", 0, 0, 0, 0, 0, CameraPreset::AUDIO_LISTENER_TYPE_PLAYER, false);
    }

    public static function THIRD_PERSON(): CameraPreset
    {
        return new CameraPreset("minecraft:third_person", "", 0, 0, 0, 0, 0, CameraPreset::AUDIO_LISTENER_TYPE_PLAYER, false);
    }

    public static function THIRD_PERSON_FRONT(): CameraPreset
    {
        return new CameraPreset("minecraft:third_person_front", "", 0, 0, 0, 0, 0, CameraPreset::AUDIO_LISTENER_TYPE_PLAYER, false);
    }
}