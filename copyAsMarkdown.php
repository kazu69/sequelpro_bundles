#!/usr/bin/php
<?php
$in = fopen('php://stdin', 'r');
$result=array();
$num=false;
while($line=fgetcsv($in, 0, "\t")) {
	$result[]='| '.implode(' | ', $line).' | ';
	if(!$num) {
	    $str='';
	    foreach($line as $val){ $str=$str.'| --- '; }
	    $result[]=$str.'|';
	    $num=true;
	}
}
fclose($in);
$cmd='echo '.escapeshellarg(implode("\n", $result)).' | __CF_USER_TEXT_ENCODING='.posix_getuid().':0x8000100:0x8000100 pbcopy';
shell_exec($cmd);
