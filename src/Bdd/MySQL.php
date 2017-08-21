<?php

namespace Blog\Bdd;

use Blog\Config;

/**
 * Class MySQL
 * @package Blog\Bdd
 */
class MySQL
{
    /**
     * @var MySQL $bdd
     */
    private static $bdd;

    /**
     * @var \PDO $pdo
     */
    private $pdo;

    /**
     * @return MySQL
     */
    public static function init(){
        if (is_null(self::$bdd)) {
            self::$bdd = new Mysql();
        }

        return self::$bdd;
    }

    /**
     * MySQL constructor.
     */
    public function __construct()
    {
        $config = Config::init();

        try {
            $this->pdo = new \PDO('mysql:host=localhost;dbname='. $config->getParam("dbname") .';charset=utf8', $config->getParam("user"), $config->getParam("password"));
        } catch (\PDOException $e){
            throw $e;
        }
    }

    public function getPDO()
    {
        return $this->pdo;
    }
}
