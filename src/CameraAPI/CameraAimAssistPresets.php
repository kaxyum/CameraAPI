<?php

namespace CameraAPI;

use pocketmine\network\mcpe\protocol\types\camera\CameraAimAssistPreset;
use pocketmine\network\mcpe\protocol\types\camera\CameraAimAssistPresetExclusionDefinition;
use pocketmine\utils\RegistryTrait;

/**
 * This doc-block is generated automatically, do not modify it manually.
 * This must be regenerated whenever registry members are added, removed or changed.
 * @see build/generate-registry-annotations.php
 * @generate-registry-docblock
 *
 * @method static CameraAimAssistPreset AIM_ASSIST_DEFAULT()
 */

final class CameraAimAssistPresets
{
    use RegistryTrait;

    private static array $customMember = [];

    protected static function setup(): void
    {
        self::register("aim_assist_default", new CameraAimAssistPreset("minecraft:aim_assist_default", new CameraAimAssistPresetExclusionDefinition([], [], [], []), [], [], null, null));
    }

    protected static function register(string $name, CameraAimAssistPreset $member): void
    {
        self::_registryRegister($name, $member);
    }

    public static function registerCustom(string $name, CameraAimAssistPreset $member): void
    {
        self::$customMember[$name] = $member;
    }

    public static function getAll(): array
    {
        return array_merge(
            [
                self::AIM_ASSIST_DEFAULT()
            ],
            array_values(self::$customMember)
        );
    }
}