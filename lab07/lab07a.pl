#!/usr/bin/perl -wT
use CGI':standard';
use CGI::Carp qw(warningsToBrowser fatalsToBrowser);

print "Content-type: text/html\n\n";

print <<"HTML";
<head>
	<title> Task 1 </title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Rubik+Mono+One&display=swap" rel="stylesheet">
</head>
<div style="flex-direction:column;display:flex;justify-content: center;height:80vh;align-items:center;">
<h1 style="font-size: 60px; color:Red;font-family:Rubik Mono One"> Hi, </h1>
<h1 style="font-size: 60px; color:Red;font-family:Rubik Mono One"> 
    THIS IS MY FIRST PERL PROGRAM
</h1>
</div>
HTML
