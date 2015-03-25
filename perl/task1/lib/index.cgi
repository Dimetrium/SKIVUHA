#!/usr/bin/perl -w
use CGI qw/:standard :cgi-lib/;
$|=1;
print header(-type=>'text/html', -charset=>'utf-8');
#print "Content-type: text/html, encoding=utf-8\n\n";
#print "ok<br>";
print start_html(-title=>'OLX'),
h3('OLX'),
#start_form,
#"Имя: ",
#textfield(-name=>'nick', size=>8), p,
#"Э-почта: ",
#textfield(-name=>'email', size=>32), p,
#"Комментарий: ", p,  
#textarea(-name=>'comments', 
#-rows=>5, -columns=>50), p,
#submit('Отправить'), 
#end_form,
#hr, "\n";
#	if (param) {
#		print a({href=>"mailto:".param('email')},
#		param('nick')),
#			" пишет: ", p, param('comments'), p,
#			hr,"\n";	}
end_html();
# оформляем конец страницider(),
#print start_html(-title=>'Здорово!'),
#	h1('Здорово!'),
#	'fdgdrfgdfdf',
#	end_html();
