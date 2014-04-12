<?php

// backups first
include_once('modx.backup.php');


// remove old versions
exec('rm -rf _modx; rm -rf modx-backup;');
 
// clone site
exec('cp -R modx _modx;');
 
// make it easier to merge
exec('mv _modx/connectors _modx/_connectors; mv _modx/core _modx/_core; mv _modx/manager _modx/_manager;');
 
// download and unzip latest modx
exec('wget -O latest.zip http://modx.com/download/latest;');
exec('unzip latest.zip; rm latest.zip;');
 
// create a "modx-new" folder and move files in
exec('mkdir modx-new; cd modx-2*; cp -r ./* ../modx-new/; cd ..; rm -R modx-2*;');
 
// move new modx files over
exec('mv modx-new/connectors _modx; mv modx-new/core _modx; mv modx-new/manager _modx;');
exec('rm -rf _modx/setup; mv modx-new/setup _modx;');
exec('rm -rf modx-new;');
 
// copy components over
exec('cp -Rf _modx/_core/components _modx/core');
exec('cp -Rf _modx/_manager/assets/components _modx/manager/assets');
 
// move packages over make sure not to bring old core files
exec('rm -rf _modx/_core/packages/core; rm -rf _modx/_core/packages/core.transport.zip; cp -Rf _modx/_core/packages/* _modx/core/packages/;');
 
// bring our config files over
exec('cp -f modx/config.core.php _modx; cp -f modx/connectors/config.core.php _modx/connectors; cp -f modx/manager/config.core.php _modx/manager; cp -f modx/core/config/config.inc.php _modx/core/config;');
 
// backup setup to make it easy to re-run
exec('cd _modx; rm -rf setup.tar; tar -cvf setup.tar setup;');
 
// go to home directory
exec('cd ..;');
 
// swap old site with new site
exec('mv modx modx_backup && mv _modx modx;');
?>