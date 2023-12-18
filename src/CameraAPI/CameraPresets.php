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

    public static function FIRST_PERSON(Player $player): CameraPreset
    {
        return new CameraPreset("minecraft:first_person", "", $player->getPosition()->getX(), $player->getPosition()->getY(), $player->getPosition()->getZ(), $player->getLocation()->getPitch(), $player->getLocation()->getYaw(), CameraPreset::AUDIO_LISTENER_TYPE_PLAYER, false);
    }

    public static function THIRD_PERSON(Player $player): CameraPreset
    {
        if ($player->getLocation()->getYaw() >= -45 && $player->getLocation()->getYaw() < 45)
        {
            return new CameraPreset("minecraft:third_person", "", $player->getPosition()->getX(), $player->getPosition()->getY(), $player->getPosition()->getZ() + 1, $player->getLocation()->getPitch(), $player->getLocation()->getYaw(), CameraPreset::AUDIO_LISTENER_TYPE_PLAYER, false);
        }elseif ($player->getLocation()->getYaw() >= 45 && $player->getLocation()->getYaw() < 135)
        {
            return new CameraPreset("minecraft:third_person", "", $player->getPosition()->getX() + 1, $player->getPosition()->getY(), $player->getPosition()->getZ(), $player->getLocation()->getPitch(), $player->getLocation()->getYaw(), CameraPreset::AUDIO_LISTENER_TYPE_PLAYER, false);
        }elseif ($player->getLocation()->getYaw() >= -135 && $player->getLocation()->getYaw() < -45)
        {
            return new CameraPreset("minecraft:third_person", "", $player->getPosition()->getX() - 1, $player->getPosition()->getY(), $player->getPosition()->getZ(), $player->getLocation()->getPitch(), $player->getLocation()->getYaw(), CameraPreset::AUDIO_LISTENER_TYPE_PLAYER, false);
        }else{
            return new CameraPreset("minecraft:third_person", "", $player->getPosition()->getX(), $player->getPosition()->getY(), $player->getPosition()->getZ() - 1, $player->getLocation()->getPitch(), $player->getLocation()->getYaw(), CameraPreset::AUDIO_LISTENER_TYPE_PLAYER, false);
        }
    }

    public static function THIRD_PERSON_FRONT(Player $player): CameraPreset
    {
        if ($player->getLocation()->getYaw() >= -45 && $player->getLocation()->getYaw() < 45)
        {
            return new CameraPreset("minecraft:third_person_front", "", $player->getPosition()->getX(), $player->getPosition()->getY(), $player->getPosition()->getZ() + 1, $player->getLocation()->getPitch(), $player->getLocation()->getYaw() + 180, CameraPreset::AUDIO_LISTENER_TYPE_PLAYER, false);
        }elseif ($player->getLocation()->getYaw() >= 45 && $player->getLocation()->getYaw() < 135)
        {
            return new CameraPreset("minecraft:third_person_front", "", $player->getPosition()->getX() + 1, $player->getPosition()->getY(), $player->getPosition()->getZ(), $player->getLocation()->getPitch(), $player->getLocation()->getYaw() + 180, CameraPreset::AUDIO_LISTENER_TYPE_PLAYER, false);
        }elseif ($player->getLocation()->getYaw() >= -135 && $player->getLocation()->getYaw() < -45)
        {
            return new CameraPreset("minecraft:third_person_front", "", $player->getPosition()->getX() - 1, $player->getPosition()->getY(), $player->getPosition()->getZ(), $player->getLocation()->getPitch(), $player->getLocation()->getYaw() + 180, CameraPreset::AUDIO_LISTENER_TYPE_PLAYER, false);
        }else{
            return new CameraPreset("minecraft:third_person_front", "", $player->getPosition()->getX(), $player->getPosition()->getY(), $player->getPosition()->getZ() - 1, $player->getLocation()->getPitch(), $player->getLocation()->getYaw() + 180, CameraPreset::AUDIO_LISTENER_TYPE_PLAYER, false);
        }
    }
}