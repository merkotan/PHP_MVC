<?php
session_start();

use Weather\Libs\Bootstrap;

require 'config/config.php';
require 'autoloader.php';
$app = new Bootstrap();
