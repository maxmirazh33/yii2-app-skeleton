<?php
namespace console\controllers;

use yii\console\controllers\MigrateController;

/**
 * @inheritdoc
 */
class MigrateAllController extends MigrateController
{
    /**
     * @var array path for find migrations as alias => level
     */
    protected static $paths = [
        '@app' => 0,
        '@vendor' => 2,
    ];

    /**
     * @inheritdoc
     */
    protected function getNewMigrations()
    {
        $applied = $this->getApplied();

        $migrations = [];

        foreach (static::$paths as $alias => $level) {
            $this->handleDir($alias, $migrations, $applied, $level);
        }

        sort($migrations);

        return $migrations;
    }

    protected function handleDir($alias, &$migrations, $applied, $level = 0, $full = false, $new = true)
    {
        $dir = \Yii::getAlias($alias);
        if ($level == 0) {
            $alias .= '/migrations';
            $dir .= '/migrations';
        }
        if (!is_dir($dir)) {
            return;
        }

        $handle = opendir($dir);
        while (($file = readdir($handle)) !== false) {
            if ($file === '.' || $file === '..') {
                continue;
            }
            $path = $dir . '/' . $file;
            $fileAlias = $alias . '/' . $file;
            if ($level > 0 && is_dir($path)) {
                $this->handleDir($fileAlias, $migrations, $applied, $level - 1, $full, $new);
            } else {
                if (preg_match('/^(m(\d{6}_\d{6})_.*?)\.php$/', $file, $matches) && is_file($path)) {
                    if (!isset($applied[$matches[1]]) || !$new) {
                        if ($full) {
                            $migrations[] = $path;
                        } else {
                            $migrations[] = $matches[1];
                        }
                    }
                }
            }
        }
        closedir($handle);
    }

    /**
     * @inheritdoc
     */
    protected function createMigration($class)
    {
        $file = $this->findFile($class);
        if ($file === null) {
            $this->stderr('Migration file not found.');
            \Yii::$app->end(self::EXIT_CODE_ERROR);
        }
        if (preg_match('/(m(\d{6}_\d{6})_.*?)\.php$/i', $class, $matches)) {
            $class = $matches[1];
        }

        require_once($file);
        return new $class(['db' => $this->db]);
    }

    protected function findFile($class)
    {
        $migrations = [];
        $applied =  $this->getApplied();
        foreach (static::$paths as $alias => $level) {
            $this->handleDir($alias, $migrations, $applied, $level, true, false);
        }
        foreach ($migrations as $m) {
            if (strpos($m, $class) !== false) {
                return $m;
            }
        }
        return null;
    }

    protected function getApplied()
    {
        $applied = [];
        foreach ($this->getMigrationHistory(null) as $version => $time) {
            $applied[$version] = true;
        }

        return $applied;
    }
}
