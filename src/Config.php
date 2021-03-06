<?php

namespace Blog;

use Symfony\Component\Yaml\Parser;

/**
 * Class Config
 * @package Blog
 */
class Config
{
    /**
     * @var array $config
     */
    private static $config;

    /**
     * @var array $params
     */
    private $params;

    /**
     * @return array|Config
     */
    public static function init(){
        if (is_null(Config::$config)) {
            self::$config = new Config();
        }

        return self::$config;
    }

    /**
     * Config constructor.
     */
    public function __construct()
    {
        $yaml = new Parser();

        $value = $yaml->parse(file_get_contents('config/parameters.yml' ));

        $dbParams = array(
            'driver'   => 'pdo_mysql',
            'user'     => $value["parameters"]['user'],
            'password' => $value["parameters"]['password'],
            'dbname'   => $value["parameters"]['name'],
            'host'     => $value["parameters"]['host'],
            'port'     => $value["parameters"]['port'],
        );
        $this->params = $dbParams;
    }

    public function getParam($key)
    {
        return $this->params[$key];
    }
}
