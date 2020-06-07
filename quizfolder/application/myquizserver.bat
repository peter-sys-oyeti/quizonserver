$ie = New-Object -ComObject 'InternetExplorer.Application'
$ie.MenuBar = $false
$ie.ToolBar = 0
$ie.Visible = $true
$url = 'http://ojtquizapp01/quiz'
$ie.Navigate($url)