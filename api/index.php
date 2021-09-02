<?php

use shockuccu\api\LINEBot\Setting;
use shockuccu\api\LINEBot\EchoBot;

require_once __DIR__ . '/../vendor/autoload.php';

require_once 'LINEBot/Setting.php';
require_once 'LINEBot/EchoBot.php';


$setting = Setting::getSetting();

$app = new EchoBot($setting);
$app->run();

