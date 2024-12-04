#!/user/bin/python
import cgi


form = cgi.FieldStorage()
city = form.getvalue('city')
province = form.getvalue('province')
country = form.getvalue('country')
image_url = form.getvalue('image_url')

print("Content-Type: text/html\n")

result = ''
if city and country:
    result = city.upper()
    if province:
        result += f", {province.upper()}"
    result += f", {country.upper()}"
else:
    print('<h1 style="font-family: \'Times New Roman\', serif; color: darkred;">No City and/or Country Given</h1>')

print(f"""<!DOCTYPE html>
<html>
<head>
  <title>Lab 10b Python</title>
  <style>
    body {{
      margin: 0;
      padding: 0;
      font-family: 'Georgia';
      background-color: #d4c8b0; 
      color: #5a3921; 
      min-height: 100vh;
    }}
    .header {{
      text-align: center;
      padding: 20px;
      background-color: #d4c8b0;
      border-bottom: 5px solid #5a3921;
      font-size: 5rem;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    }}
    img {{
      display: block;
      width: 100%;
      height: auto;
      filter: sepia(0.7) brightness(0.9); 
      border: 10 px solid #5a3921;
    }}
  </style>
</head>
<body>
  <div class="header">
    {result}
  </div>
  <img src="{image_url}">
  <p>IMAGE URL: </p>
  <a href="{image_url}">{image_url}</a>
</body>
</html>
""")