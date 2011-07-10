<?php
/**
 * TopicResponseParser Module
 * Parses topic responses and adds them
 * to the Channel in ChannelManager
 *
 * NOTE- THIS IS A SYSTEM MODULE, REMOVING IT MAY
 * 	   REMOVE VITAL FUNCTIONALITY FROM THE BOT
 *
 * Copyright (c) 2011, Jack Harley
 * All Rights Reserved
 */
namespace modules\systemcommands;

use awesomeircbot\module\Module;
use awesomeircbot\server\Server;
use awesomeircbot\line\ReceivedLineTypes;
use awesomeircbot\channel\ChannelManager;

class TopicResponseParser extends Module {
	
	public static $requiredUserLevel = 0;
	
	public function run() {
		$workingLine = explode(" ", $this->runMessage, 5);
		
		$channel = $workingLine[3];
		$newTopic = $workingLine[4];
		
		$newTopic = explode(":", $newTopic, 1);
		$newTopic = $newTopic[0];
		
		$channelObject = ChannelManager::get($channel);
		$channelObject->topic = $newTopic;
		ChannelManager::store($channel, $channelObject);
	}
}
?>