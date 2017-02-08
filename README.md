# laravel-sftp
Integrate SFTP into Laravel's filesystem.

## Usage

 - Add `Alveum\SFTP\SFTPServiceProvider::class,` to your providers array in `app.php`
 - Add the following configuration to your storage config file:
 
```
'sftp' => [
    'driver' => 'sftp',
    'host' => env('SFTP_HOST'),
    'port' => env('SFTP_PORT', 22),
    'username' => env('SFTP_USERNAME'),
    'password' => env('SFTP_PASSWORD'),
    'private_key' => env('SFTP_PRIVATE_KEY'),
    'root' => env('SFTP_ROOT', '/'),
    'timeout' => 10,
],
```