<?php

namespace CameraAPI;

use pocketmine\network\mcpe\protocol\types\camera\CameraAimAssistCategory;
use pocketmine\network\mcpe\protocol\types\camera\CameraAimAssistCategoryPriorities;
use pocketmine\utils\RegistryTrait;

/**
 * This doc-block is generated automatically, do not modify it manually.
 * This must be regenerated whenever registry members are added, removed or changed.
 * @see build/generate-registry-annotations.php
 * @generate-registry-docblock
 *
 * @method static CameraAimAssistCategory DEFAULT()
 */

final class CameraAimAssistCategories
{
    use RegistryTrait;

    private static array $customMembers = [];

    protected static function setup(): void
    {
        self::register("default", new CameraAimAssistCategory("minecraft:default", new CameraAimAssistCategoryPriorities([], [], [], [], null, null)));
    }

    protected static function register(string $name, CameraAimAssistCategory $member): void
    {
        self::_registryRegister($name, $member);
    }

    public static function registerCustom(string $name, CameraAimAssistCategory $member): void
    {
        self::$customMembers[$name] = $member;
    }

    public static function getAll(): array
    {
        return array_merge(
            [
                self::DEFAULT()
            ],
            array_values(self::$customMembers)
        );
    }
}