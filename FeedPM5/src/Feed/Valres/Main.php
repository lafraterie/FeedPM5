<?php

namespace Feed\Valres;


use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase implements Listener {
    public function onEnable(): void {

        $this->getLogger()->info("[FeedPM5] by Valres lancé !");

        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getServer()->getCommandMap()->register("feed", new feed());

    }
}
