<?php
declare(strict_types=1);

namespace space\yurisi\RegisterSystem\form;

use pocketmine\form\Form;
use pocketmine\player\Player;

class RegisterForm implements Form {

	public function handleResponse(Player $player, $data): void {
		// TODO: Implement handleResponse() method.
	}

	public function jsonSerialize() {
		return[];
	}
}