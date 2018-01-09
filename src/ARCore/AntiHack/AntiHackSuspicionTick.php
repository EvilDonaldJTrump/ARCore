<?php
namespace ARCore\AntiHack;

use ARCore\AntiHack\AntiHack;
use pocketmine\scheduler\Task;
use pocketmine\scheduler\PluginTask;

/**
 * Make permanent checks for cheaters
 */
class AntiHackSuspicionTick extends PluginTask {
	/**@var AntiHack*/
	private $plugin;

	
	public function __construct() {
		$this->plugin = AntiHack::getInstance();
	}

	/**
	 * @param $currentTick
	 */
	public function onRun($currentTick) {
		foreach ($this->plugin->hackScore as $playerId => $data){			
			if($data["suspicion"] > 0){
				$this->plugin->hackScore[$playerId]["suspicion"] --;
			}
		}
	}
	
}