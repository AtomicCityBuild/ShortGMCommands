<?php


namespace GermanLetsLPFor;


use pocketmine\plugin\PluginBase;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\Player;
use pocketmine\event\Listener;
use pocketmine\utils\Config;


class Main extends PluginBase {

    public function onEnable() {
        @mkdir($this->getDataFolder());
		$this->saveDefaultConfig();
        $this->getResource("config.yml");
    }
	
	public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool
	{
		
	switch ($command->getName()){
		
		case "gm":
			if($sender instanceof Player) {
			if($sender->hasPermission("pocketmine.command.gamemode")) {
			if(isset($args[0])){
				switch(strtolower($args[0])){
					case "1":
					$sender->sendMessage($this->getConfig()->get("gmcreative"));
					$sender->setGamemode(Player::CREATIVE);
				break;
					case "0":
					$sender->sendMessage($this->getConfig()->get("gmsurvival"));
					$sender->setGamemode(Player::SURVIVAL);
				break;
					case "2":
					$sender->sendMessage($this->getConfig()->get("gmadventure"));
					$sender->setGamemode(Player::ADVENTURE);
				break;
					case "3":
					$sender->sendMessage($this->getConfig()->get("gmspectator"));
					$sender->setGamemode(Player::SPECTATOR);
				break;
				}
			}else {
			$sender->sendMessage($this->getConfig()->get("nosubcommand"));
			}
		}else {
		$sender->sendMessage($this->getConfig()->get("nopermission"));
		} 			
	}else {
	$sender->sendMessage($this->getConfig()->get("noplayer"));
	}
		return true;
		}
	}
}