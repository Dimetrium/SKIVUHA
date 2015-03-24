#!/usr/bin/perl -w

use Data:Dumper;

print "Content-Type: text/plain\n\n";
#foreach $key (keys(%ENV)) {
#	$val = $ENV{$key};
#	print Dumper "$key=\"$val\"\n";
#}
print Dumper (%ENV);