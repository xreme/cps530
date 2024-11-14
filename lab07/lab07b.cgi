#!/usr/bin/perl -wT
use CGI':standard';
use CGI::Carp qw(warningsToBrowser fatalsToBrowser);
use File::Basename;

$CGI::POST_MAX = 1024 * 5000;

my $safe_filename_characters = "a-zA-Z0-9_.-";
my $upload_dir = "./images";

my $query = CGI->new;

print "Content-type: text/html\n\n";

$firstName= param ('firstName');
$lastName = param ('lastName');

$email = param('email');
$phoneNumber = param('phoneNumber');

$addrLine1 = param('addr1');
$addrLine2 = param('addr2');

$postalCode = param('postalCode');

$city = param('city');
$province = param('province');

my $filename = $query->param('picture'); 

if ($phoneNumber =~ m/^((\d){10})$/) {
    $phoneNumberError= "";
} else {
    $phoneNumberError = "error";
}

if ($email=~ m/^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,63}$/) {
    $emailError = "";
} else {
    $emailError = "error";
}
if ($postalCode =~ m/^(\b[A-Z](\d)[A-Z] (\d)[A-Z](\d)\b)$/) {
    $postalCodeError = "";
} else {
    $postalCodeError = "error";
}

if (!$filename) {
    print "Please Upload an Image";
    exit;
}
my ($name, $path, $extension) = fileparse($filename, '\..*');
$filename = $name . $extension;
$filename =~ tr/ /_/;
$filename =~ s/[^$safe_filename_characters]//g;

if ($filename =~ /^([$safe_filename_characters]+)$/) {
    $filename = $1;
} else {
    die "Filename contains invalid characters";
}

my $upload_filehandle = $query->upload("picture");

open(UPLOADFILE, ">$upload_dir/$filename") or die "$!";
binmode UPLOADFILE;
while (<$upload_filehandle>) {
    print UPLOADFILE;
}
close UPLOADFILE;

# Print the HTML response
print $query->header();

print <<"HTML";
<head>
	<title> Task 2 </title>
	<style>
		body{
		    display: flex;
		    height: 80%;
		    flex-direction: column;
		    align-items: center;
		    justify-content: center;
		    background-image: url("https://i.postimg.cc/CxBVSnzq/Night-Sky-Stars.webp");
		}
		main{
			display: flex;
			flex-direction: column;
			align-items:center;
			outline: 1px solid cyan;
			width: 400px;
			background-color: black;
			padding: 10px;
		}
		div{
			display:flex;
			gap: 20px;
		}
		p{
			color: cyan;
			font-size: 15px;
		}
		h1{
			color: cyan;
			font-size: 25px;
		}
		.errorText{
			color: red
		}
		.error{
			background-color: red;
		}
		span{
			color: white
		}
		a{
			color:orange;
		}
		img{
			width: 200px;
			padding: 10px;
			outline: 1px solid cyan;
		}
	</style>
</head>
<main>
	<center><h1> DATA RECIEVED. </h1></center>
		<div>
			<img src = "$upload_dir/$filename">
		</div>
	<div style="display: block;outline:width: 70%;">
		<div> 
				<p>NAME:<span> $firstName $lastName </span></p>
		</div>
		<div> 
				<p>PHONE: <span class='$phoneNumberError'>$phoneNumber </span></p><p class="errorText">$phoneNumberError</p>
		</div>
		<div> 
				<p>EMAIL: <span class='$emailError'>$email </span></p><p class="errorText">$emailError</p>
		</div>
		<div> 
				<p>ADDRESS:<span>$addrLine1 $addrLine2</span></p>
		</div>
		<div> 
				<p>POSTAL CODE: <span class='$postalCodeError'>$postalCode </span></p><p class="errorText">$postalCodeError</p>
		</div>
		<div> 
				<p>CITY: <span>$city</span></p>
		</div>
		<div> 
				<p>PROVINCE: <span>$province</span></p>
		</div>
		<a href="https://cs.torontomu.ca/~osibazeb/cps530/lab07/lab07b.html"> take me back. </a>
	</div>
</main>
HTML
