<?php

namespace CameraAPI;

use muqsit\simplepackethandler\SimplePacketHandler;
use pocketmine\event\EventPriority;
use pocketmine\network\mcpe\NetworkSession;
use pocketmine\network\mcpe\protocol\CameraPresetsPacket;
use pocketmine\network\mcpe\protocol\SetLocalPlayerAsInitializedPacket;
use pocketmine\plugin\Plugin;
use pocketmine\utils\SingletonTrait;

class CameraHandler
{
    use SingletonTrait;

    protected ?Plugin $plugin = null;

    public function __construct()
    {
        self::setInstance($this);
    }

    public static function register(Plugin $plugin): void
    {
        if(!is_null(($pl = self::getInstance()->plugin)))
        {
            throw new \Error("Already registered with {$pl->getName()}");
        }

        self::getInstance()->plugin = $plugin;
        $interceptor = SimplePacketHandler::createInterceptor($plugin, EventPriority::HIGHEST, false);
        $interceptor->interceptIncoming(function (SetLocalPlayerAsInitializedPacket $pk, NetworkSession $target): bool
        {
            $target->sendDataPacket(CameraPresetsPacket::create(CameraPresets::getAll()));
            return true;
        });
    }

    public static function isRegistered(): bool
    {
        return !is_null(self::getInstance()->plugin);
    }

    public function getPlugin(): Plugin
    {
        return $this->plugin;
    }
}
