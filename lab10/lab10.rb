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
  result = result + city.capitalize
  if !province.empty?
    result = result + ", " + province.capitalize
  end
  result = result + ", " + country.capitalize
else
  puts "<h1 style=\"font-family: 'Times New Roman', serif; color: darkred;\">No City and/or Country Given</h1>"
end

puts <<-HTML
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Lab 10b Ruby</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Georgia';
      background-color: #d4c8b0; 
      color: #5a3921; 
      min-height: 100vh;
    }
    .header {
      text-align: center;
      padding: 20px;
      background-color: #d4c8b0;
      border-bottom: 5px solid #5a3921;
      font-size: 5rem;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    }
    img {
      display: block;
      width: 100%;
      height: auto;
      filter: sepia(0.7) brightness(0.9); 
    }
  </style>
</head>
<body>
  <div class="header">
    #{result}
  </div>
  <img src="#{image_url}">
  <p>IMAGE URL: </p>
  <a href="#{image_url}">#{image_url}</a>
</body>
</html>
HTML

