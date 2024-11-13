#!/user/bin/perl -wT
use CGI

use CGI':standard';
use CGI::Carp qw(warningsToBrowser fatalsToBrowser);

print "Content-type: text/html\n\n";

print <<"HTML";
<h1 style="font-size:10vw; color:Red;"> 
    THIS IS MY FIRST PERL PROGRAM
</h1>
HTML