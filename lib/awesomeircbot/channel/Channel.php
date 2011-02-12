<?php
/**
 * Channel Class
 * Class for an IRC channel
 *
 * Copyright (c) 2011, Jack Harley
 * All Rights Reserved
 */

namespace awesomeircbot\channel;

class Channel {
	
	/**
	 * Channel information including name,
	 * topic, modes, etc.
	 */
	public $channelName;
	public $topic;
	public $modes = array();
	
	/**
	 * Array of users that are
	 * connected to the channel
	 */
	public $connectedNicks = array();
	
	/**
	 * An associative array of nicknames
	 * and the privileges they hold in the
	 * channel
	 * nick => privilege character (~, &, @, %, +)
	 */
	public $privilegedNicks = array();
	
	/**
	 * Construction
	 *
	 * @param string channel name
	 */
	public function __construct($channel) {
		$this->channelName = $channel;
	}
	
	/**
	 * Adds a nickname to the array of connected
	 * nicknames, checking if it exists first
	 *
	 * @param string nickname to add
	 * @param string privilege character (~, &, @, %, +)
	 */
	public function addConnectedNick($nick, $privileges=false) {
		$this->connectedNicks[] = $nick;
		
		if ($privileges)
			$this->privilegedNicks[$nick] = $privileges;
	}
}
?>