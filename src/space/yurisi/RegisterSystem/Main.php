<?php
declare(strict_types=1);

namespace space\yurisi\RegisterSystem;

use pocketmine\plugin\PluginBase;
use space\yurisi\RegisterSystem\database\PlayerData;
use space\yurisi\RegisterSystem\event\JoinEvent;
use space\yurisi\RegisterSystem\event\LoginEvent;

class Main extends PluginBase {

	private PlayerData $data;

    protected function onEnable(): void {
		$this->loadEvents();
		$this->data = new PlayerData($this);
    }

	private function loadEvents(){
		$this->getServer()->getPluginManager()->registerEvents(new JoinEvent(), $this);
		$this->getServer()->getPluginManager()->registerEvents(new LoginEvent(), $this);
	}

	public function getPlayerData(): PlayerData {
		return $this->data;
	}

    protected function onDisable(): void {

    }
}