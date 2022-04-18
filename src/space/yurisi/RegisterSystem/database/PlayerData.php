<?php
declare(strict_types=1);

namespace space\yurisi\RegisterSystem\database;

use space\yurisi\RegisterSystem\Main;

class PlayerData extends \SQLite3 {

	public function __construct(Main $main) {
		parent::__construct($main->getDataFolder(). "PlayerData.db", SQLITE3_OPEN_READWRITE | SQLITE3_OPEN_CREATE);
	}
	//TODO

}