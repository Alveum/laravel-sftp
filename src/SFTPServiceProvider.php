<?php

namespace Alveum\SFTP;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;
use League\Flysystem\Filesystem;
use League\Flysystem\Sftp\SftpAdapter;

class SFTPServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        Storage::extend('sftp', function ($app, $config) {

            $config = collect($config);

            return new Filesystem(new SftpAdapter([
                'host' => $config['host'],
                'port' => $config['port'],
                'username' => $config['username'],
                'password' => $config['password'],
                'privateKey' => $config->get('private_key'),
                'root' => $config->get('root'),
                'timeout' => $config->get('timeout', 30),
            ]));
          
        });
    }

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
