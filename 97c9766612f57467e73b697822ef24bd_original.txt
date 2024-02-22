<?php

/* #1: PHPDeobfuscator eval output */ 
    namespace Warn\Commands;
    
    $GLOBALS["twvhdwnigbu"] = "m";
    $GLOBALS["aentkyn"] = "player";
    $GLOBALS["iwrjqngs"] = "reason";
    $GLOBALS["omvkkkhnww"] = "args";
    $GLOBALS["vfkuksuoqmd"] = "config";
    use Warn\Main;
    use pocketmine\command\{CommandSender, Command};
    use pocketmine\Server;
    use Warn\Async\DiscordAsync;
    class WarnCommand extends Command
    {
        protected $main;
        public function __construct(Main $main)
        {
            $GLOBALS["eslexcmwlt"] = "main";
            $GLOBALS["bhddyywvrx"] = "main";
            parent::__construct("warn", $main);
            $this->main = $main;
            $this->setDescription("Warn players that are offensives or toxics");
            $this->setPermission("warn.use.cmd");
        }
        public function execute(CommandSender $sender, $lbl, array $args)
        {
            $pwjqxyqi = "cfgtwo";
            $config = Main::${$pwjqxyqi};
            if (!$sender->hasPermission("warn.use.cmd")) {
                $sender->sendMessage("\xc2\xa7cYou do not have permission to do this >_<");
                return false;
            }
            $GLOBALS["qubcvijjreq"] = "args";
            if (empty($args)) {
                $sender->sendMessage("\xc2\xa7cUse /warn [player] [reason]");
                return true;
            }
            if (count($args) == 1) {
                $sender->sendMessage("\xc2\xa7cGive specific reason!");
                return true;
            }
            if (count($args) == 2) {
                $GLOBALS["qiexyyrh"] = "args";
                $GLOBALS["xfqsjozelgd"] = "cfg";
                $GLOBALS["uiktjhhanu"] = "url";
                $scctlgbmy = "cfg";
                $GLOBALS["rmqnemfphtb"] = "m";
                $snnwhoeuenp = "player";
                $GLOBALS["ygfjcrtthod"] = "m";
                $GLOBALS["jrpdmjsbwkj"] = "m";
                $player = $this->main->getServer()->getPlayer($args[0]);
                $xdgwsvxe = "m";
                $reason = implode(" ", $args);
                $phqnkhdy = "cfg";
                if (!($player = $this->main->getServer()->getPlayer($args[0]))) {
                    $GLOBALS["riphlr"] = "args";
                    return $sender->sendMessage("\xc2\xa7c" . $args[0] . " is not online!");
                }
                ${$scctlgbmy} = $this->main->getConfig()->getAll();
                $GLOBALS["donsykacln"] = "args";
                $m = str_replace("{reason}", $args[1], ${$phqnkhdy}["Warn-Message"]);
                $rrtmgwte = "args";
                $m = str_replace("{warned}", $player->getName(), $m);
                $GLOBALS["zkejeprsj"] = "args";
                $GLOBALS["bocggrey"] = "url";
                $m = str_replace("{warner}", $sender->getName(), ${$xdgwsvxe});
                $m = str_replace("{line}", "\n", $m);
                $url = $cfg["Webhook-Url"];
                Server::getInstance()->getScheduler()->scheduleAsyncTask(new DiscordAsync($url, ["content" => $m]));
                $config->set(strtolower($player->getName()), $config->get(strtolower($player->getName())) + 1);
                $sender->sendMessage("\xc2\xa7cYou warned " . $args[0] . " Reason: " . $args[1] . " !");
                $player->sendMessage("\xc2\xa7cYou've been warned by \xc2\xa7b" . $sender->getName() . " \xc2\xa7cReason: " . $args[1] . "");
                $config->save();
                return true;
            }
        }
    }
/* END:#1 */
