<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Monolog\Formatter\LineFormatter;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Logger;

class LoggerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loggerInstance('logger_sql');
        $this->loggerInstance('logger_rest');
        $this->loggerInstance('logger_form');
    }
    
    /**
     * 
     * @param \Monolog\Logger $loggerName
     */
    protected function loggerInstance($loggerName){
        $this->app->bind($loggerName, function() use($loggerName) {

            $monolog = new Logger('debug');
            $log_level = Logger::DEBUG;

            $log_path = storage_path('logs') . '/'. str_replace('logger_', '', $loggerName).'.log';

            $handler = new RotatingFileHandler($log_path, 5, $log_level, true, 0777);
            //$handler->setFilenameFormat('{filename}-{date}-'.date('H'), 'Y-m-d');
            $monolog->pushHandler($handler);
            $formatter = new LineFormatter(null, null, true, true);
            $handler->setFormatter($formatter);

            return $monolog;
        });
    }


    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
