<?php
declare(strict_types=1);

namespace space\yurisi\RegisterSystem;

use pocketmine\plugin\PluginBase;
use space\yurisi\RegisterSystem\database\sqlite;
use space\yurisi\RegisterSystem\event\JoinEvent;
use space\yurisi\RegisterSystem\event\LoginEvent;

class Main extends PluginBase {

	private sqlite $data;

    protected function onEnable(): void {
		$this->loadEvents();
		$this->data = new sqlite($this);
    }

	private function loadEvents(){
		$this->getServer()->getPluginManager()->registerEvents(new JoinEvent($this), $this);
		$this->getServer()->getPluginManager()->registerEvents(new LoginEvent(), $this);
	}

	public function getPlayerData(): sqlite {
		return $this->data;
	}

    protected function onDisable(): void {

    }
}