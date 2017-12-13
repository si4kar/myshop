<?php
/**
 * Created by PhpStorm.
 * User: Sich
 * Date: 12/12/2017
 * Time: 7:06 PM
 */

class Migrations extends Migrate
{
       protected function create()
       {
           self:: $migrationName = parent:: getArrayValue($argv, 2);
           if (empty($migrationName)) {
               die('Migration name is required');
           }

           $migrationsDir = parent:: getFromConfig('migrations.dir');
           $prefix = 'm' . time() . '_';

           $content = <<<php
           <?php

            function {$prefix}up()
            {

            }   

            function {$prefix}down()
            {

            }
php;


           file_put_contents("{$migrationsDir}/{$prefix}_{self:: $migrationName}.php", $content);

           echo "Migration {$prefix}_{$migrationName} created successfully\r\n";
       }

       protected function up()
       {
           // TODO: Implement up() method.
       }
       protected function down()
       {
           // TODO: Implement down() method.
       }
}

