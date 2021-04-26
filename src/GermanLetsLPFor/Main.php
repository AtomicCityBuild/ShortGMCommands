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
		
		case "creative":
			if($sender->hasPermission("pocketmine.command.gamemode")) {
			if($sender instanceof Player) {
				$sender->sendMessage($this->getConfig()->get("prefix") . $this->getConfig()->get("gmcreative"));
				$sender->setGamemode(Player::CREATIVE);
				}else {
					$sender->sendMessage($this->getConfig()->get("noplayer"));
				}
			}else {
				$sender->sendMessage($this->getConfig()->get("prefix") . $this->getConfig()->get("nopermission"));
			}
		return true;

		case "survival":
			if($sender->hasPermission("pocketmine.command.gamemode")) {
			if($sender instanceof Player) {
				$sender->sendMessage($this->getConfig()->get("prefix") . $this->getConfig()->get("gmsurvival"));
				$sender->setGamemode(Player::SURVIVAL);
				}else {
					$sender->sendMessage($this->getConfig()->get("noplayer"));
				}
			}else {
				$sender->sendMessage($this->getConfig()->get("prefix") . $this->getConfig()->get("nopermission"));
			}
		return true;

		case "adventure":
			if($sender->hasPermission("pocketmine.command.gamemode")) {
			if($sender instanceof Player) {
				$sender->sendMessage($this->getConfig()->get("prefix") . $this->getConfig()->get("gmadventure"));
				$sender->setGamemode(Player::ADVENTURE);
				}else {
					$sender->sendMessage($this->getConfig()->get("noplayer"));
				}
			}else {
				$sender->sendMessage($this->getConfig()->get("prefix") . $this->getConfig()->get("nopermission"));
			}
		return true;

		case "spectator":
			if($sender->hasPermission("pocketmine.command.gamemode")) {
			if($sender instanceof Player) {
				$sender->sendMessage($this->getConfig()->get("prefix") . $this->getConfig()->get("gmspectator"));
				$sender->setGamemode(Player::SPECTATOR);
				}else {
					$sender->sendMessage($this->getConfig()->get("noplayer"));
				}
			}else {
				$sender->sendMessage($this->getConfig()->get("prefix") . $this->getConfig()->get("nopermission"));
			}
		return true;

		$playerchange = $this->getServer()->getPlayerExact($args[1]);
		
		case "gm":
		case "g":
		case "gmode":
		case "gamemode":
			if(isset($args[0])){
			if($sender->hasPermission("pocketmine.command.gamemode")) {
			if($sender instanceof Player) {
				switch(strtolower($args[0])){
					// Gamemode Creative Command
					case "1":
					case "c":
					case "creative":
						if(isset($args[1])){
						if($sender instanceof Player) {
							$playerchange = $this->getServer()->getPlayerExact($args[1]);
						if($playerchange instanceof Player) {
							$sender->sendMessage($this->getConfig()->get("prefix") . $this->getConfig()->get("changegm-creative-sender"));
							$playerchange->setGamemode(Player::CREATIVE);
							$playerchange->sendMessage($this->getConfig()->get("prefix") . $this->getConfig()->get("changegm-creative-player"));
				}else {
					$sender->sendMessage($this->getConfig()->get("prefix") . $this->getConfig()->get("noplayerfound"));
				}
			}
		}elseif(empty($args[1])) {
				$sender->sendMessage($this->getConfig()->get("prefix") . $this->getConfig()->get("gmcreative"));
			 	$sender->setGamemode(Player::CREATIVE);
			}
				break;
					// Gamemode Survival Command
					case "0":
					case "s":
					case "survival":
						if(isset($args[1])){
						if($sender instanceof Player) {
							$playerchange = $this->getServer()->getPlayerExact($args[1]);
						if($playerchange instanceof Player) {
							$sender->sendMessage($this->getConfig()->get("prefix") . $this->getConfig()->get("changegm-survival-sender"));
							$playerchange->setGamemode(Player::SURVIVAL);
							$playerchange->sendMessage($this->getConfig()->get("prefix") . $this->getConfig()->get("changegm-survival-player"));
				}else {
					$sender->sendMessage($this->getConfig()->get("prefix") . $this->getConfig()->get("noplayerfound"));
				}
			}
		}elseif(empty($args[1])) {
				$sender->sendMessage($this->getConfig()->get("prefix") . $this->getConfig()->get("gmsurvival"));
			 	$sender->setGamemode(Player::SURVIVAL);
			}
				break;
					// Gamemode Adventure Command
					case "2":
					case "a":
					case "adventure":
						if(isset($args[1])){
						if($sender instanceof Player) {
							$playerchange = $this->getServer()->getPlayerExact($args[1]);
						if($playerchange instanceof Player) {
							$sender->sendMessage($this->getConfig()->get("prefix") . $this->getConfig()->get("changegm-adventure-sender"));
							$playerchange->setGamemode(Player::ADVENTURE);
							$playerchange->sendMessage($this->getConfig()->get("prefix") . $this->getConfig()->get("changegm-adventure-player"));
				}else {
					$sender->sendMessage($this->getConfig()->get("prefix") . $this->getConfig()->get("noplayerfound"));
				}
			}
		}elseif(empty($args[1])) {
				$sender->sendMessage($this->getConfig()->get("prefix") . $this->getConfig()->get("gmadventure"));
			 	$sender->setGamemode(Player::ADVENTURE);
			}
				break;
					// Gamemode Spectator Command
					case "3":
					case "sp":
					case "spectator":
						if(isset($args[1])){
						if($sender instanceof Player) {
							$playerchange = $this->getServer()->getPlayerExact($args[1]);
						if($playerchange instanceof Player) {
							$sender->sendMessage($this->getConfig()->get("prefix") . $this->getConfig()->get("changegm-spectator-sender"));
							$playerchange->setGamemode(Player::SPECTATOR);
							$playerchange->sendMessage($this->getConfig()->get("prefix") . $this->getConfig()->get("changegm-spectator-player"));
				}else {
					$sender->sendMessage($this->getConfig()->get("prefix") . $this->getConfig()->get("noplayerfound"));
				}
			}
		}elseif(empty($args[1])) {
				$sender->sendMessage($this->getConfig()->get("prefix") . $this->getConfig()->get("gmspectator"));
			 	$sender->setGamemode(Player::SPECTATOR);
			}
				break;
				}
			}else {
			$sender->sendMessage($this->getConfig()->get("noplayer"));
			}
		}else {
		$sender->sendMessage($this->getConfig()->get("prefix") . $this->getConfig()->get("nopermission"));
		} 			
	}elseif ($sender instanceof Player) {	
		$api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
		if($api !== null) {
			if($sender->hasPermission("pocketmine.command.gamemode")) {
			$this->openSGMC($sender);
		}else {
			$sender->sendMessage($this->getConfig()->get("prefix") . $this->getConfig()->get("nopermission"));
		}
		}else {
			$sender->sendMessage($this->getConfig()->get("prefix") . "§cNo FormAPI installed yet!");
		}
	}
	return true;
	}
}
	
	public function openSGMC($player){
		$api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
		$form = $api->createSimpleForm(function (Player $player, int $data = null) {
			$result = $data;
			if($result === null){
				return true;
			}
			switch($result){
				case 0:
				//Close UI Button
				$player->sendMessage($this->getConfig()->get("prefix") . $this->getConfig()->get("ui-closemessage"));
				break;
				
				case 1:
				//Gamemode Survival Button
				$player->sendMessage($this->getConfig()->get("prefix") . $this->getConfig()->get("gmsurvival"));
					$player->setGamemode(Player::SURVIVAL);
				break;
				
				case 2:
				//Gamemode Creative Button
				$player->sendMessage($this->getConfig()->get("prefix") . $this->getConfig()->get("gmcreative"));
					$player->setGamemode(Player::CREATIVE);
				break;
				
				case 3:
				//Gamemode Adventure Button
				$player->sendMessage($this->getConfig()->get("prefix") . $this->getConfig()->get("gmadventure"));
					$player->setGamemode(Player::ADVENTURE);
				break;
				
				case 4:
				//Gamemode Spectator Button
				$player->sendMessage($this->getConfig()->get("prefix") . $this->getConfig()->get("gmspectator"));
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