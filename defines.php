<?php

defined('_JEXEC') or die;

define('JPATH_BASE', __DIR__);

// Global definitions
$parts = explode(DIRECTORY_SEPARATOR, JPATH_BASE);

// New configuration defined by creating /config/example.com--example/configuration.php
$dir = new DirectoryIterator('./config');
foreach ($dir as $fileinfo) {
    if ($fileinfo->isDir() && !$fileinfo->isDot()) {
        $path = './config/' . $fileinfo->getFilename() . '/configuration.php';
        $site = explode('--', $fileinfo->getFilename());
        if ($_SERVER['HTTP_HOST'] == $site[0] && file_exists($path)) {
            // Check DB - If fail then $db->error set
            include('./config/db-check.php');
            $location = $fileinfo->getFilename();
            break;
        }
    }
}

// Check for errors include error pages before dying
if (!$location) {
    include './config/config-error.php';
    die();
} elseif ($db->error) {
    include './config/db-error.php';
    die();
}

// Defines.
define('_JDEFINES', true);
define('JPATH_ROOT',          implode(DIRECTORY_SEPARATOR, $parts));
define('JPATH_SITE',          JPATH_ROOT);
define('JPATH_CONFIGURATION', JPATH_ROOT . '/config/' . $location);
define('JPATH_ADMINISTRATOR', JPATH_ROOT . '/administrator');
define('JPATH_LIBRARIES',     JPATH_ROOT . '/libraries');
define('JPATH_PLUGINS',       JPATH_ROOT . '/plugins');
define('JPATH_INSTALLATION',  JPATH_ROOT . '/installation');
define('JPATH_THEMES',        JPATH_BASE . '/templates');
define('JPATH_CACHE',         JPATH_BASE . '/cache');
define('JPATH_MANIFESTS',     JPATH_ADMINISTRATOR . '/manifests');