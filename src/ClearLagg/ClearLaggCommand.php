<?php

namespace ClearLagg;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\PluginIdentifiableCommand;

class ClearLaggCommand extends Command implements PluginIdentifiableCommand {

  public $plugin;

  public function __construct(Loader $plugin) {
    parent::__construct("clearlagg", "Clear the lag!", "/lagg <clearall>", ["lagg"]);
    $this->setPermission("clearlagg.command.clearlagg");
    $this->plugin = $plugin;
  }

  public function getPlugin() {
    return $this->plugin;
  }

  public function execute(CommandSender $sender, $alias, array $args) {
    if ($sender->hasPermission("clearlagg")){
      $sender->sendMessage("Removed " . ($d = $this->getPlugin()->removeMobs()) . " mob" . ($d == 1 ? "" : "s") . " and " . ($d = $this->getPlugin()->removeEntities()) . " entit" . ($d == 1 ? "y" : "ies") . ".");
      return true;
    }
  }
}
