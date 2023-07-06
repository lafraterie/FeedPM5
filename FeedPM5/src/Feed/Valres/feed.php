<?php

namespace Feed\Valres;

use pocketmine\player\Player;

use pocketmine\Server;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;



class feed extends Command{

    public function __construct()
    {
        parent::__construct("feed");
        $this->setPermission("feed.cmd");
        $this->setPermissionMessage("Tu n'as pas les perms !");
        $this->setDescription("Commande de feed");
        $this->setUsage("feed");
        $this->setAliases([""]);
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if ($sender instanceof Player){
            if ($sender->hasPermission("feed.cmd") or Server::getInstance()->isOp($sender->getName()))
            {
                if($sender->getHungerManager()->getFood() < 20)
                {
                    $sender->getHungerManager()->setFood($sender->getHungerManager()->getMaxFood());
                    return $sender->sendMessage("§l§2[Feed]§r > §aTu a bien été nourri !");
                } else {
                    return $sender->sendMessage("§l§4[Feed]§r > §cTa nourriture est pleine !");
                }

            } return $sender->sendMessage("§l§4[Liasses]§r > §cTu n'as pas la permission !");
        }
    }
}