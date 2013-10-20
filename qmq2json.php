<?php

// Script to export qmail queue size to json

$qmhandle = 'sudo /usr/bin/qmhandle.pl';
exec($qmhandle, $output);

foreach($statistics as $stat => $stat_label) {
        foreach($output as $line) {
                if (stristr($line, $stat_label)) {
                        $result = explode(':', $line);
                        $results[$stat] = $result[1];
                }
        }
}

print json_encode(array( 'qmail_queue' => $result) );
