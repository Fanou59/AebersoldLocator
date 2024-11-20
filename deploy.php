<?php

namespace Deployer;

require 'recipe/symfony.php';

// Configuration Git
set('repository', 'git@github.com:Fanou59/AebersoldLocator.git');
set('branch', 'main'); // Remplacez par la branche que vous souhaitez déployer (par défaut, 'main').

// Configuration serveur
host('production')
    ->setHostname('ssh-aebersoldlocator.alwaysdata.net')
    ->set('remote_user', 'aebersoldlocator')
    ->set('deploy_path', '~/www');

set('http_user', 'aebersoldlocator');

// Fichiers et répertoires partagés
set('shared_files', ['.env']);
set('shared_dirs', ['var/log', 'var/sessions']);
set('writable_mode', 'chmod'); // Utiliser chmod au lieu de setfacl
set('writable_dirs', ['var', 'var/cache', 'var/log', 'var/sessions']);

// Nombre de releases à conserver
set('keep_releases', 3);

after('deploy:failed', 'deploy:unlock');
