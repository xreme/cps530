#!/usr/bin/python
import cgi

form = cgi.FieldStorage()
city = form.getvalue('city')
province = form.getvalue('province')
country = form.getvalue('country')
image_url = form.getvalue('image_url')


print "Content-type:text/html\n\n"
result = ''
if city and country:
    result = city.upper()
    if province:
        result += ", {}".format(province.upper())
    result += ", {}".format(country.upper())
else:
    print('<h1 style="font-family: \'Times New Roman\', serif; color: darkred;">No City and/or Country Given</h1>')

print("""<!DOCTYPE html>
<html>
<head>
  <title>Lab 10b Python</title>
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
      width: 80%;
      height: auto;
      filter: sepia(0.7) brightness(0.9); 
      border: 40px solid #5a3921;
      margin: 10px;
      border-radius: 15px;
    }
  </style>
</head>
""")
print("""
<body>
  <div class="header">
    {0}
  </div>
  <center>
  <img src="{1}">
  <p>IMAGE URL: </p>
  <a href="{1}">{1}</a>
  </center>
</body>
</html>
""".format(result, image_url))



