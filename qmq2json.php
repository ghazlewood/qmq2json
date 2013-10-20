<?php

// Script to export qmail queue size to json

$qmhandle = '/usr/bin/qmhandle.pl';

$statistics = array(
	'total' => 'Total messages',
	'local' => 'Messages with local recipients',
	'remote' => 'Messages with remote recipients'
);


foreach($statistics as $stat => $stat_label) {
	$result[$stat] = $qmhandle . " -s | grep \"" . $stat_label . "\" | awk -F \":\" '{print $2}' | sed 's/ //g'";
}

//print json_encode(array( 'qmail_queue' =>$result) );
var_dump($result);