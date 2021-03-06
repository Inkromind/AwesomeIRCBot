<?php
/**
 * Act Module
 * Messages the given user/channel with the given
 * message, formatted as an ACTION message
 *
 * Copyright © 2014, Jack P. Harley, jackpharley.com.
 * All Rights Reserved
 */
namespace modules\general;

use awesomeircbot\module\Module;
use awesomeircbot\server\Server;

class Act extends Module {
	
	public static $requiredUserLevel = 5;
	
	public function run() {
		$server = Server::getInstance();
		$server->act($this->parameters(1), $this->parameters(2, true));
		$server->notify($this->senderNick, '"' . $this->parameters(2, true) . '" sent to ' . $this->parameters(1) . " successfully");
	}
}
?>