<?php


namespace GermanLetsLPFor;


use pocketmine\plugin\PluginBase;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\Player;
use pocketmine\event\Listener;
use pocketmine\utils\Config;
use pocketmine\Server;


class Main extends PluginBase implements Listener {

    public function onEnable() {
        @mkdir($this->getDataFolder());
		$this->saveDefaultConfig();
        $this->getResource("config.yml");
    }
	
	public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool
	{
		
	switch ($command->getName()){
		
		case "gm":
			if(isset($args[0])){
			if($sender->hasPermission("pocketmine.command.gamemode")) {
			if($sender instanceof Player) {
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
					case "c":
					$sender->sendMessage($this->getConfig()->get("gmcreative"));
					$sender->setGamemode(Player::CREATIVE);
				break;
					case "s":
					$sender->sendMessage($this->getConfig()->get("gmsurvival"));
					$sender->setGamemode(Player::SURVIVAL);
				break;
					case "a":
					$sender->sendMessage($this->getConfig()->get("gmadventure"));
					$sender->setGamemode(Player::ADVENTURE);
				break;
					case "sp":
					$sender->sendMessage($this->getConfig()->get("gmspectator"));
					$sender->setGamemode(Player::SPECTATOR);
				break;
					case "creative":
					$sender->sendMessage($this->getConfig()->get("gmcreative"));
					$sender->setGamemode(Player::CREATIVE);
				break;
					case "survival":
					$sender->sendMessage($this->getConfig()->get("gmsurvival"));
					$sender->setGamemode(Player::SURVIVAL);
				break;
					case "adventure":
					$sender->sendMessage($this->getConfig()->get("gmadventure"));
					$sender->setGamemode(Player::ADVENTURE);
				break;
					case "spectator":
					$sender->sendMessage($this->getConfig()->get("gmspectator"));
					$sender->setGamemode(Player::SPECTATOR);
				break;
				}
			}else {
			$sender->sendMessage($this->getConfig()->get("noplayer"));
			}
		}else {
		$sender->sendMessage($this->getConfig()->get("nopermission"));
		} 			
	}elseif ($sender instanceof Player) {
		$this->openSGMC($sender);
	}else{
		$sender->sendMessage($this->getConfig()->get("nosubcommand"));	
		}
	}
	return true;
}
	
	public function openSGMC($player){
		$api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
		$form = $api->createSimpleForm(function (Player $player, int $data = null) {
			$result = $data;
			if($result === null){
				$player->sendMessage($this->getConfig()->get("noformapi"));
				return true;
			}
			switch($result){
				case 0:
				//Close UI Button
				$player->sendMessage($this->getConfig()->get("ui-closemessage"));
				break;
				
				case 1:
				//Gamemode Survival Button
				$player->sendMessage($this->getConfig()->get("gmsurvival"));
					$player->setGamemode(Player::SURVIVAL);
				break;
				
				case 2:
				//Gamemode Creative Button
				$player->sendMessage($this->getConfig()->get("gmcreative"));
					$player->setGamemode(Player::CREATIVE);
				break;
				
				case 3:
				//Gamemode Adventure Button
				$player->sendMessage($this->getConfig()->get("gmadventure"));
					$player->setGamemode(Player::ADVENTURE);
				break;
				
				case 4:
				//Gamemode Spectator Button
				$player->sendMessage($this->getConfig()->get("gmspectator"));
					$player->setGamemode(Player::SPECTATOR);
				break;
			}
			});
	$form->setTitle($this->getConfig()->get("ui-title"));
	$form->setContent($this->getConfig()->get("ui-text"));
	$form->addButton($this->getConfig()->get("ui-close"));
	$form->addButton($this->getConfig()->get("ui-survival"));
	$form->addButton($this->getConfig()->get("ui-creative"));
	$form->addButton($this->getConfig()->get("ui-adventure"));
	$form->addButton($this->getConfig()->get("ui-spectator"));
	$form->sendToPlayer($player);
	return $form;
	}
}