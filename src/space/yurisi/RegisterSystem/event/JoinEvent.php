<?php
declare(strict_types=1);

namespace space\yurisi\RegisterSystem\event;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use space\yurisi\RegisterSystem\form\RegisterForm;
use space\yurisi\RegisterSystem\Main;

class JoinEvent implements Listener {

	public function __construct(
		private Main $main
	) {}

	public function onJoin(PlayerJoinEvent $event){
		$player = $event->getPlayer();
		if($this->main->getPlayerData()->existsPlayer($player)) return;
		$player->setImmobile();
		$player->sendForm(new RegisterForm());
	}

}