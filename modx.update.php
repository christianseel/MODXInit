<?php

// backups first
include_once('modx.backup.php');


// remove old versions
exec('rm -rf _html; rm -rf html-backup;');
 
// clone site
exec('cp -R html _html;');
 
// make it easier to merge
exec('mv _html/connectors _html/_connectors; mv _html/core _html/_core; mv _html/manager _html/_manager;');
 
// download and unzip latest modx
exec('wget -O latest.zip http://modx.com/download/latest;');
exec('unzip latest.zip; rm latest.zip;');
 
// create a "modx-new" folder and move files in
exec('mkdir html-new; cd modx-2*; cp -r ./* ../html-new/; cd ..; rm -R modx-2*;');
 
// move new modx files over
exec('mv html-new/connectors _html; mv html-new/core _html; mv html-new/manager _html;');
exec('rm -rf _html/setup; mv html-new/setup _html;');
exec('rm -rf html-new;');
 
// copy components over
exec('cp -Rf _html/_core/components _html/core');
 
// move packages over make sure not to bring old core files
exec('rm -rf _html/_core/packages/core; rm -rf _html/_core/packages/core.transport.zip; cp -Rf _html/_core/packages/* _html/core/packages/;');
 
// bring our config files over
exec('cp -f html/config.core.php _html; cp -f html/connectors/config.core.php _html/connectors; cp -f html/manager/config.core.php _html/manager; cp -f html/core/config/config.inc.php _html/core/config;');
 
// backup setup to make it easy to re-run
exec('cd _html; rm -rf setup.tar; tar -cvf setup.tar setup;');
 
// go to home directory
exec('cd ..;');
 
// swap old site with new site
exec('mv html html_backup && mv _html html;');
?>
