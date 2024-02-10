<?php

namespace CameraAPI;

use pocketmine\plugin\PluginBase;

class CameraAPI extends PluginBase
{
    public function onEnable(): void
    {
        if(!CameraHandler::isRegistered())
        {
            CameraHandler::register($this);
        }
    }
}