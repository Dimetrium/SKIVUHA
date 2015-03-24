#!/usr/bin/perl

use CGI qw/:standard/;

print header(-charset=>'utf-8'),
start_html(),
start_form,
p('name'),
textfield(-name=>'nick', size=>8),
p('password'),
textfield(-name=>'e-mail', size=>8),
submit('send'),
end_form;
hr,'\n';
if(param){
  p,
print param('nick'), p,

print p, param('e-mail'), p,
}
end_html();
