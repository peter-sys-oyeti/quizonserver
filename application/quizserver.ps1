Dim objIE<br>
Set objIE = WScript.CreateObject ("InternetExplorer.Application")<br>
ObjIE.Toolbar = false<br>
objIE.Navigate "http://ojtquizapp01/quiz"<br>
objIE.Visible = true