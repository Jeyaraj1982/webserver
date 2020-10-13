  <html>
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
  <meta name="GENERATOR" content="Microsoft FrontPage 4.0">
  <meta name="ProgId" content="FrontPage.Editor.Document">
  <title>Submit</title>
  <STYLE TYPE="text/css">
a:link { color: blue; text-decoration: none }
a:active { color: red; text-decoration: none }
a:visited { color: blue; text-decoration: none }
a:hover { color: green; text-decoration: underline }

</STYLE>
  </head>
<BODY  text="#000066" BGCOLOR=#FFFFFF >
<%
name=trim(request.form("name"))
phone=trim(request.form("phone"))
email=trim(request.form("email"))
address=trim(request.form("address"))
country=trim(request.form("country"))
comments=trim(request.form("comments"))


message= " <div align='center'><center><table border='1'> "

     message=message + "<tr><td width='25%' align='left'>Name</td>"
     message=message + "<td width='40%' align='center'><p align='left'>"&name&"</td></tr>"
	 	
     message=message + "<tr><td width='25%' align='left'>Phone No.</td>"
     message=message + "<td width='40%' align='center'><p align='left'>"&phone&"</td></tr>"	
	 	
     message=message + "<tr><td width='25%' align='left'>E-mail</td>"
     message=message + "<td width='40%' align='center'><p align='left'>"&email&"</td></tr>"		
	 
     message=message + "<tr><td width='25%' align='left'>Address</td>"
     message=message + "<td width='40%' align='center'><p align='left'>"&address&"</td></tr>"
	 	
     message=message + "<tr><td width='25%' align='left'>Country</td>"
     message=message + "<td width='40%' align='center'><p align='left'>"&country&"</td></tr>"		
	 
     message=message + "<tr><td width='25%' align='left'>Comments</td>"
     message=message + "<td width='40%' align='center'><p align='left'>"&comments&"</td></tr>"

     message=message + "</td></tr>"

     message=message + "</table></center></div>"

    'response.Write(message)

      Set Mail = CreateObject("CDONTS.NewMail")
		  Mail.From =email		  
		  Mail.To = "leconsalbountifultrust@yahoo.com "
		  Mail.cc = ""
		  Mail.bcc = "info@horizon-solution.com"
		  Mail.Subject = "Enquiry from leconsalbountifultrust.org website"
		  Mail.Bodyformat=cdobodyformathtml 
	      Mail.mailformat = 0
           Mail.Body = message
    	   Mail.Send
	   Set Mail = Nothing 

		'response.Redirect("index.html")
	   response.write "<center><b text='#000066'>We have received your Enquiry !!!<b><center><br>"
   	   response.write "<center><b text='#000066'>We will contact you Soon !!!<b><center><br>"
	   response.write "<center><b text='#000066'>Thank You !!!<b><center><br>"

%>
<b><font color="#000080" size="4"><a href="http://www.leconsalbountifultrust.org">
Back to Homepage</a></font></b>
</body>
</html>
