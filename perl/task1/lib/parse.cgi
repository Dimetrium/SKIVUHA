#!/usr/bin/perl -w
use CGI qw(:cgi-lib :escapeHTML :unescapeHTML);
use CGI::Carp qw(fatalsToBrowser);
$|=1;
ReadParse();
my $templatefile = 'dir/index.html';
my $htmlString = loadTemplate($templatefile);
print "Content-type: text/html, encoding=utf-8\n\n";
print substringer($htmlString);

sub loadTemplate
{
	my($fileName) = @_;
	local $/ = undef;
	open my $fh, "< $fileName";
	my $html = <$fh>;
	close $fh;
	return $html;
}

sub substringer
{
	my %hash = ('TEST'=>'replaced','TEST2'=>'replaced','TEST3'=>'replaced');
	$_[0] =~ s/###(\w+)###/$hash{$1}/ge;
	return $_[0];
}