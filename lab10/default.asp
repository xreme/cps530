<!DOCTYPE html>
<html>
    <head>
        <title>
            Lab 10 Task 1
        </title>
    </head>
    <%
        bgColor = Request.QueryString("color")
        If Len(bgColor) = 6 And IsNumeric("&H" & bgColor) Then
        bgColor = "#" & bgColor
        End If
        If bgColor = "" Then bgColor = "#FFFFFF"
    %>
    <%
        Response.Write("<body  style='background-color:" & bgColor & "; height:70vh;'>")
    %>


       <div style="display:flex; flex-direction:column; align-items:center; justify-content:center; height:100%;">
        <h1>
            Lab 10: Task 1
        </h1>
<%
    Response.Write("<center>")
    Response.Write("The Color is: " & bgColor)
    Response.Write("<h3> The Current (server) Date & Time is </h3>")
    Response.Write(date & "<br>" & time)
 
    response.write("<h3>Previous Visit: </h3>")

    LastVisitDate = Request.Cookies("last_visit_date")
    LastVisitTime = Request.Cookies("last_visit_time")


    if LastVisitDate <> "" then
        response.write(LastVisitDate)
        response.write("<br>")
        response.write(LastVisitTime)
    else
        response.write("First Visit (or cookie not set)")
    
    end if

    Response.Write("</center>")

    response.cookies("last_visit_date") = Date()
    response.cookies("last_visit_date").Expires = Date() + 100
    response.cookies("last_visit_time") = Time()
    response.cookies("last_visit_time").Expires = Date() + 100 
%>
</div>

</body>
</html>