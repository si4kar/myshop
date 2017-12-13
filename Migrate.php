<?php

abstract class Migrate extends Arrays
{
    public function migration()
    {

        if (php_sapi_name() != 'cli'){
            die('Migrations allowed from CLI only');
        }

        $action = parent:: getArrayValue($argv, 1);
        $migrate = new Migrations();

        switch ($action) {
            case 'create':
                $result = $migrate->create();
                break;
            case 'up':
                $result = $migrate->up();
                break;
            case 'down':
                $result = $migrate->down();
                break;
        }
    }

    abstract protected function create();
    abstract protected function up();
    abstract protected function down();

}