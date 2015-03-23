#!/usr/bin/perl -w

#use strict;
use CGI qw(:cgi-lib :escapeHTML :unescapeHTML);
use CGI::Carp qw(fatalsToBrowser); 
use CGI::Cookie; 
use Data::Dumper;
use File::Basename qw(dirname);
use lib dirname(__FILE__) . '/lib';
use Switch;
use controller::myDef;
use view::View;



#use CGI::Session;

$|=1; 
ReadParse(); 

print "Content-type: text/html; charset=utf-8\n\n";

my $val;

#makes query common for all pages
my $defIndex = myDef->new();
my $selQuery2 = 'SELECT * FROM genre';
my $selQuery3 = 'SELECT * FROM authors';
my @genreResult = @{$defIndex->mySelect($selQuery2)};
my @authorsResult = @{$defIndex->mySelect($selQuery3)};

# get the values from url
my $q = CGI->new();
my $a = $q->param('page');
my $b = $q->param('id');



#compare page value with the case
if ($a eq "book"){$val = "book";}
if ($a eq "genre"){$val = "genre";}
if ($a eq "author"){$val = "author";}


#select case based on the page value
switch ($val)
{
	case "book"	
	{ 
		my $selQuery = 'SELECT * FROM books INNER JOIN book_genre ON books.bk_id=book_genre.bk_id_bookGenre INNER JOIN genre ON book_genre.gr_id_bookGenre=genre.gr_id WHERE gr_id='.$b.'';
		my @bookResult = @{$defIndex->mySelect($selQuery)};
		my $viewIndex = View->new();
		$result = $viewIndex->htmlReplace(\@bookResult, \@genreResult, \@authorsResult);
        print $result;
	}
	case "genre"	
	{ 
		my $selQuery = 'SELECT * FROM books INNER JOIN book_genre ON books.bk_id=book_genre.bk_id_bookGenre INNER JOIN genre ON book_genre.gr_id_bookGenre=genre.gr_id WHERE gr_id='.$b.'';
		my @bookResult = @{$defIndex->mySelect($selQuery)};
		my $viewIndex = View->new();
		$result = $viewIndex->htmlReplace(\@bookResult, \@genreResult, \@authorsResult);
        print $result;
	}
	case "author"	
	{ 
		my $selQuery = 'SELECT * FROM books INNER JOIN book_author ON books.bk_id=book_author.bk_id_bookAuthor INNER JOIN authors ON book_author.atr_id_bookAuthor=authors.atr_id WHERE atr_id='.$b.'';
		my @bookResult = @{$defIndex->mySelect($selQuery)};
		my $viewIndex = View->new();
		$result = $viewIndex->htmlReplace(\@bookResult, \@genreResult, \@authorsResult);
        print $result;
	}
	else 
	{ 
		my $selQuery = 'select b.nazvanie, g.genre, a.author, b.bk_id
						from books b, genre g, authors a,
						book_genre bg, book_author ba
						where
						bg.bk_id_bookGenre = b.bk_id
						and ba.bk_id_bookAuthor = b.bk_id
						and g.gr_id = bg.gr_id_bookGenre
						and a.atr_id = ba.atr_id_bookAuthor;';
        my @bookResult = @{$defIndex->mySelectAll($selQuery)};
		my $viewIndex = View->new();
		$result = $viewIndex->htmlReplace(\@bookResult, \@genreResult, \@authorsResult);
        print $result;

		#print "<pre>" . Dumper(@bookResult). "</pre>";		
	}
}

