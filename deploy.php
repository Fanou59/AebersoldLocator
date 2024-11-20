<?php

namespace Deployer;

require 'recipe/symfony.php';

// Config

set('repository', 'https://github.com/Fanou59/AebersoldLocator_V5.git');

add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);
set('writable_mode', 'chmod'); // Utiliser chmod au lieu de setfacl
set('writable_use_sudo', false); // Pas besoin de sudo sur Alwaysdata
set('http_user', 'aebersoldlocator');

// Hosts

host('ssh-aebersoldlocator.alwaysdata.net')
    ->set('remote_user', 'aebersoldlocator')
    ->set('deploy_path', '~/www');


// Hooks

after('deploy:failed', 'deploy:unlock');
