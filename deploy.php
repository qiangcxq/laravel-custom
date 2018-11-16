<?php
namespace Deployer;

use function foo\func;

require 'recipe/common.php';

// Project name
set('application', 'book');

// Project repository
set('repository', 'https://github.com/YWNA/laravel-custom.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', false);

// Shared files/dirs between deploys 
set('shared_files', []);
set('shared_dirs', ['deploy', 'storage', 'test']);

// Writable dirs by web server 
set('writable_dirs', ['storage']);
set('allow_anonymous_stats', false);

// Hosts

host('114.115.138.227')
    ->hostname('114.115.138.227')
    ->user('root')
    ->set('branch', 'book')
    ->set('http_user', 'www-data')
    ->set('deploy_path', '/var/www/html/{{application}}');

// Tasks
//ask('adsfa', 'chenbo');
//if (commandExist('composer')) {
//    parse('不存在composer');
//}
desc('Deploy your project');
task('deploy', [
    'deploy:info',
    'deploy:prepare',
    'deploy:lock',
    'deploy:release',
    'deploy:update_code',
    'deploy:shared',
    'deploy:writable',
    'deploy:vendors',
    'deploy:clear_paths',
    'deploy:symlink',
    'deploy:unlock',
    'cleanup',
    'success'
]);

task('deploy:info', function (){
    writeln('部署Book');
});


after('success', 'deploy:nginx');
task('deploy:nginx', function () {
    $result = askChoice('reload nginx with new config ?', ['yes'=>'y', 'no'=>'n'], 'no', true)[0];
    if ($result === 'yes') {
        run('cp {{deploy_path}}/shared/deploy/book /etc/nginx/sites-available/book');
        run('rm /etc/nginx/sites-enabled/book');
        run('ln -s /etc/nginx/sites-available/book /etc/nginx/sites-enabled/book');
        run('service nginx reload');
    }
});

// [Optional] If deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');
