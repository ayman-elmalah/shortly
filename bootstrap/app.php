<?php

use Phplite\Bootstrap\App;

class Application {
    /**
     * Run the application
     *
     * @return void
     */
    public static function run() {
        /**
         * Define root path
         */
        define('ROOT', realpath(__DIR__.'/..'));

        /**
         * Directory separator
         */
        define('DS', DIRECTORY_SEPARATOR);

        // Run the application
        App::run();
    }
}