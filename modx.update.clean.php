<?php
// clean up updated site
exec('rm -rf modx/_core && rm -rf modx/_connectors && rm -rf modx/_manager;');
 
// zip html_backup folder
exec('zip -r modx_backup.zip modx_backup && rm -rf modx_backup;');
?>