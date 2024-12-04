#!/usr/bin/ruby
require 'cgi'
cgi = CGI.new
print "Content-type: text/html\n\n"

city = cgi['city']
province = cgi['province']
country = cgi['country']
image_url = cgi['image_url']

result = ''
if !city.empty? && !country.empty?
    result = result + city
    if !province.empty?
        result = result + ", " + empty
    end
    result = result + ", " + country
else
    puts "<h1> No City and/or Country Given</h1>"
end
puts "<h1 style=\"background-color: rgb(252, 48, 191); \">"
puts result
puts "</h1>"