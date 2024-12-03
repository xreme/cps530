#!/usr/bin/ruby
require 'cgi'
cgi = CGI.new
print "Content-type: text/html\n\n"

puts cgi['city']
puts cgi['province']
puts cgi['country']
puts cgi['image_url']