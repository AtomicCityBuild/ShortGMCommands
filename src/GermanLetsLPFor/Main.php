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
	}
		return true;
		}
	}
	public function openSGMC($player){
		$api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
		$form = $api->createSimpleForm(function (Player $player, int $data = null) {
			$result = $data;
			if($result == null){
				return true;
			}
			switch($result){
				case 0:
				//Gamemode Survival Change button
				$player->sendMessage($this->getConfig()->get("gmsurvival"));
					$player->setGamemode(Player::SURVIVAL);
				break;
				
				case 1:
				//Gamemode Creative Change button
				$player->sendMessage($this->getConfig()->get("gmcreative"));
					$player->setGamemode(Player::CREATIVE);
				break;
				
				case 2:
				//Gamemode Adventure Change button
				$player->sendMessage($this->getConfig()->get("gmadventure"));
					$player->setGamemode(Player::ADVENTURE);
				break;
				
				case 3:
				//Gamemode Spectator Change button
				$player->sendMessage($this->getConfig()->get("gmspectator"));
					$player->setGamemode(Player::SPECTATOR);
				break;
				
				case 4:
				//Close UI Button
				$player->sendMessage("§cShortGMCommands UI closed!");
				break;
			}
			});
	$form->setTitle("§4ShortGMCommands §8- §5UI");
	$form->setContent("§4Change your Gamemode here:");
	$form->addButton("§5Gamemode Survival");
	$form->addButton("§5Gamemode Creative");
	$form->addButton("§5Gamemode Adventure");
	$form->addButton("§5Gamemode Spectator");
	$form->addButton("§4Close Menu");
	$form->sendToPlayer($player);
	return $form;
		}
	}