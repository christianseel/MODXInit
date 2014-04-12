<?php
 
//$modxversion = '2.2.11-pl-advanced';
 
// download and unzip modx
if (!$modxversion) {
  // latest
    exec('wget -O latest.zip http://modx.com/download/latest;');
	exec('unzip latest.zip; rm latest.zip;');
	
} else if ($modxversion == 'develop') {
	// specifc version
	exec('wget -c https://github.com/modxcms/revolution/archive/develop.zip;');
	exec('unzip develop.zip; rm develop.zip;');
	
} else {
	// specifc version
	exec('wget -O modx.zip http://modx.com/download/direct/modx-'.$modxversion.'.zip;');
	exec('unzip modx.zip; rm modx.zip;');
}

if ($modxversion == 'develop') {
	exec('mkdir modx; cd revolution-develop; cp -r ./* ../modx/; cd ..; rm -R revolution-develop;');
} else {
	// create a html folder and move files in
	exec('mkdir modx; cd modx-*; cp -r ./* ../modx/; cd ..; rm -R modx-*;');
}
 
// create modx core config file
exec('touch modx/core/config/config.inc.php;');
?>