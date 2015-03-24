#!/usr/bin/perl


use CGI qw/:standard/; 
print                              
 header(-charset=>'UTF-8'), 
 start_html('Гостевая книга'),             
 h3('Здесь Вы можете оставить свой отзыв'),
 start_form,                              
  p, "Имя: ",                                 
  textfield(-name=>'nick', size=>8), p,    
  p, "Э-почта: ",                             
  textfield(-name=>'email', size=>32), p,  
  "Комментарий: ", p,                      
  textarea(-name=>'comments',              
   -rows=>5, -columns=>50), p, 
  submit('Отправить'),                     
 end_form,                                 
 hr, "\n";                     

if (param) { 
   print  
    p, $ENV{'REQUEST_URI'}  , p,                               
    p, "Name: ",
    param('nick'), p,
    p, "Email: ", 
    param('email'), p,
    p, "Comments: ", 
    param('comments'), 
}
print end_html;                
