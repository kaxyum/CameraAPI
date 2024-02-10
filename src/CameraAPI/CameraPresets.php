<?php

namespace CameraAPI;

use pocketmine\network\mcpe\protocol\types\camera\CameraPreset;
use pocketmine\utils\RegistryTrait;

/**
 * This doc-block is generated automatically, do not modify it manually.
 * This must be regenerated whenever registry members are added, removed or changed.
 * @see build/generate-registry-annotations.php
 * @generate-registry-docblock
 *
 * @method static CameraPreset FREE()
 * @method static CameraPreset FIRST_PERSON()
 * @method static CameraPreset THIRD_PERSON()
 * @method static CameraPreset THIRD_PERSON_FRONT()
 */

final class CameraPresets
{
    use RegistryTrait;

    protected static function setup(): void
    {
        self::register("free", new CameraPreset("minecraft:free", "", 0, 0, 0, 0, 0, CameraPreset::AUDIO_LISTENER_TYPE_CAMERA, false));
        self::register("first_person", new CameraPreset("minecraft:first_person", "", 0, 0, 0, 0, 0, CameraPreset::AUDIO_LISTENER_TYPE_PLAYER, false));
        self::register("third_person", new CameraPreset("minecraft:third_person", "", 0, 0, 0, 0, 0, CameraPreset::AUDIO_LISTENER_TYPE_PLAYER, false));
        self::register("third_person_front", new CameraPreset("minecraft:third_person_front", "", 0, 0, 0, 0, 0, CameraPreset::AUDIO_LISTENER_TYPE_PLAYER, false));
    }

    protected static function register(string $name, CameraPreset $member): void
    {
        self::_registryRegister($name, $member);
    }

    public static function getAll(): array
    {
        return [self::FREE(), self::FIRST_PERSON(), self::THIRD_PERSON(), self::THIRD_PERSON_FRONT()];
    }
}