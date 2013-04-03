<?php 
	define ('DB', 'ethiomirror');
	define ('HOST', 'localhost');
	define ('USER','root');
	define ('PASSWORD', '');
	mysql_connect(LOCALHOST,USER,PASSWORD);
	if (!mysql_select_db(DB))
		
			die("
		<html>
			<head>
				<title><--Database connection failure --></title>
			</head>
		<body>
<table width='600' border='0' cellpadding='0' cellspacing='0' bordercolor='#990000'>
  <tr>
    <td width='600' height='34' bgcolor='F4E7EA'>
      <table width='600' border='0' cellspacing='0' cellpadding='0'>
        <tr>
          <td width='39'><img src='images/icon_error.gif' width='32' height='32'></td>
          <td width='600'><div align='center'>Unable to connect to database. Please try again later.</div></td>
        </tr>
      </table>    </td>
  </tr>
</table>
</body>
</html>");

		
?>