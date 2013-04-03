<?php
	session_start();
	include('class/includes/dbconnect.php');
	
	if (isset($_SESSION['valid_user']) && $_SESSION['isadmin']==0)
	{
		$fullname = $HTTP_SESSION_VARS['fullname'];
	}
	else
	  	echo "<script>window.location.href='login.php?ermsg=You do not have permission to access this page'</script>";

?>
<style type="text/css">
<!--
a {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
}
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: underline;
}
a:active {
	text-decoration: none;
}
.style2 {font-family: Verdana, Arial, Helvetica, sans-serif}
-->
</style> 
<TABLE width='100%' 
                  border=1 align='left' cellPadding=0 cellSpacing=0 
                  borderColor=cccccc bgcolor='#FFFFFF' class='style14' id=AutoNumber57 style='BORDER-COLLAPSE: collapse'>
<TR>
                          <TD width="100%" align="left" bgcolor='#EFEBEF'><span class='style23'><span class="abbox2 style2"><b>GOTO</b></span></span></TD>
  </TR>
                        <TR onmouseover=this.style.backgroundColor='#CCFFCC'; onmouseout=this.style.backgroundColor='#ffffff';>
                          <TD align="left" class='style14'>&nbsp; <a href="../ethiomirror/index.php" target="_blank">Home</a></TD>
  </TR>                        
                        <TR onmouseover=this.style.backgroundColor='#CCFFCC'; onmouseout=this.style.backgroundColor='#ffffff';>
<TD align="left" class='style14'>&nbsp; <a href='../titleone.htm'></a><a href='../titleone.htm'></a><a href='user_controlpannel.php'>Control panel</a></TD>
  </TR>                        
                        <TR onmouseover=this.style.backgroundColor='#CCFFCC'; onmouseout=this.style.backgroundColor='#ffffff';>
                          <TD align="left" class='style14'>&nbsp; <a href='newsdesk.php?currentdate=<?php echo date('Y-m-d');?>'>Add news </a></TD>
                        </TR>
  <TR onmouseover=this.style.backgroundColor='#CCFFCC'; onmouseout=this.style.backgroundColor='#ffffff';>
<TD align="left" class='style14'>&nbsp; <a href='news.php'>Published news </a></TD>
                        </TR>                        
  <TR onmouseover=this.style.backgroundColor='#CCFFCC'; onmouseout=this.style.backgroundColor='#ffffff';>
    <TD align="left" class='style14'>&nbsp; <a href='draftnews.php'>Draft news </a></TD>
  </TR>
  <TR onmouseover=this.style.backgroundColor='#CCFFCC'; onmouseout=this.style.backgroundColor='#ffffff';>
<TD align="left" class='style14'>&nbsp; <a href='archive.php'>Archived news</a></TD>
  </TR>                        
  
                        <TR onmouseover=this.style.backgroundColor='#CCFFCC'; onmouseout=this.style.backgroundColor='#ffffff';>
                          <TD align="left" class='style14'>&nbsp; <a href='../semesterreg.php'></a><a href='blogs.php'>Blogs</a></TD>
                        </TR>
                        <TR onmouseover=this.style.backgroundColor='#CCFFCC'; onmouseout=this.style.backgroundColor='#ffffff';>
                          <TD align="left" class='style14'>&nbsp; <a href='../semesterreg.php'></a><a href='othermedialinks.php'>Other media Links</a></TD>
                        </TR>
                        
                        <TBODY>                        <TR onmouseover=this.style.backgroundColor='#CCFFCC'; onmouseout=this.style.backgroundColor='#ffffff';>
<TD align="left" bgcolor='#EFEBEF' class='style14'><span class='style23 style2'><strong>TOOLS</strong></span></TD>
                          </TR>                        <TR onmouseover=this.style.backgroundColor='#CCFFCC'; onmouseout=this.style.backgroundColor='#ffffff';>
<TD align="left" class='style14'>&nbsp; <a href='settings.php'>Settings</a></TD>
                          </TR>                        <TR onmouseover=this.style.backgroundColor='#CCFFCC'; onmouseout=this.style.backgroundColor='#ffffff';>
<TD align="left" class='style14'>&nbsp; <a href='logout.php'>Logout</a></TD>
                          </TR>
                        </TBODY>
                      </TABLE>
