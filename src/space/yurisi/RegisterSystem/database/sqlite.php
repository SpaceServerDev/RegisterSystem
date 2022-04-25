<?php
declare(strict_types=1);

namespace space\yurisi\RegisterSystem\database;

use pocketmine\player\Player;
use space\yurisi\RegisterSystem\Main;

class sqlite extends \SQLite3 {

	public function __construct(Main $main) {
		parent::__construct($main->getDataFolder() . "sqlite.db", SQLITE3_OPEN_READWRITE | SQLITE3_OPEN_CREATE);
		$this->query("CREATE TABLE IF NOT EXISTS Users (id INTEGER PRIMARY KEY AUTOINCREMENT, name TEXT, password TEXT, created_at DATETIME, updated_at DATETIME)");
		$this->query("CREATE TABLE IF NOT EXISTS Shop (id INTEGER PRIMARY KEY AUTOINCREMENT, user_id INTEGER, shop_item_id INTEGER, amount INTEGER, received INTEGER, created_at DATETIME, updated_at DATETIME)");
	}

	public function existsPlayer(Player $player): bool {
		$result = $this->query("SELECT * FROM Users WHERE name = " . $player->getName());
		return isset($result);
	}

	public function registerPlayer(Player $player, string $password) {
		$name = $player->getName();
		$hash = $this->getHash($password);
		$date = new \DateTime('now');
		$this->query("INSERT INTO Users(name, password, created_at, updated_at) VALUES(\"$name\",\"$hash\",\"$date\", \"$date\")");
	}

	private function getHash(string $value): string {
		return hash('sha256', $value);
	}
}