<?php

namespace CameraAPI;

use pocketmine\math\Vector2;
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
 * @method static CameraPreset FOLLOW_ORBIT()
 */

final class CameraPresets
{
    use RegistryTrait;

    protected static function setup(): void
    {
        self::register("free", new CameraPreset("minecraft:free", "", null, null, null, null, null, null, null, CameraPreset::AUDIO_LISTENER_TYPE_CAMERA, false));
        self::register("first_person", new CameraPreset("minecraft:first_person", "",null, null, null, null, null, null, null, CameraPreset::AUDIO_LISTENER_TYPE_PLAYER, false));
        self::register("third_person", new CameraPreset("minecraft:third_person", "", null, null, null, null, null, null, null, CameraPreset::AUDIO_LISTENER_TYPE_PLAYER, false));
        self::register("third_person_front", new CameraPreset("minecraft:third_person_front", "", null, null, null, null, null, null, null, CameraPreset::AUDIO_LISTENER_TYPE_PLAYER, false));
        self::register("follow_orbit", new CameraPreset("minecraft:follow_orbit", "", null, null, null, null, null, null, null, CameraPreset::AUDIO_LISTENER_TYPE_CAMERA, false));
    }

    protected static function register(string $name, CameraPreset $member): void
    {
        self::_registryRegister($name, $member);
    }

    public static function getAll(): array
    {
        return [self::FREE(), self::FIRST_PERSON(), self::THIRD_PERSON(), self::THIRD_PERSON_FRONT(), self::FOLLOW_ORBIT()];
    }
}