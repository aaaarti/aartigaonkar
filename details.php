<?php 
//inclued('library/tcpdf.php');
function fetch_data()
{
$conn=mysqli_connect("localhost","root","","logbook");

 $Output=''; 
$query="select * from register ";

$result=mysqli_query($conn,$query);

while($row=mysqli_fetch_array($result))
{
  $Output .='<tr>
<td>'.'<img src="'.base64_encode($row["photo"]).'" , width=100, height=100></td>
<td>'.$row["username"].'</td>
<td>'.$row["mobileno"].'</td>
<td>'.$row["email"].'</td>                            
<td>'.$row["pincode"].'</td>
<td>'.$row["address"].'</td>
<td>
      <input type="submit" name="generate_pdf" value="Download pdf now">
    </td>' ;

}
return $Output;
}
if(isset($_POST['generate_pdf']))
{ inclued('tcpdf/tcpdf.php');
  require_once('tcpdf/tcpdf.php');
  $obj_pdf=new TCPDF('P',PDF_UNIT,PDF_PAGE_FORMAT,true,'UTF-8',false);
  $obj_pdf->SetCretor(PDF_CREATOR);
  $obj_pdf->Set_Title("genarate table ");
  $obj_pdf->SetHeaderData('','',PDF_HEADER_TITLE,PDF_HEADER_STRING);
  $obj_pdf->SetHeaderFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));
  $obj_pdf->SetFooterFont(Array(PDF_FONT_NAME_DATA,'',PDF_FONT_SIZE_DATA));
  $obj_pdf->SetDefaultMonospaceFont('helvetica');
  $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
  $obj_pdf->SetMargins(PDF_MARGIN_LEFT,'10',PDF_MARGIN_RIGHT);
  $obj_pdf->SetPrintHeader(false);
  $obj_pdf->SetPrintFooter(false);
  $obj_pdf->SetAutoPageBreak(true,10);
 $obj_pdf->SetFont('helvetica','',11);
 $obj_pdf->AddPage();
 $content='';
 $content .='<h4 aling="center">Genarate HTML Table data To PDF from MySQL Database Using TCPDF In PHP</h4><br/>
 <table border="1" cellspacing="0" cellpadding="3">
 <tr>
 <th width="20%">Photo</th>
    <th width="10%">Username</th>
    <th width="10%">MobileNo</th>
     <th width="30%">Email</th>
     <th width="5%">Pincode</th>
     <th width="10%">Address</th>
    <th width="15%">Download</th>
    </tr>
    ';
    $content .=fetch_data();
    $content .='</table>';
    $obj_pdf->writeHTML($content);
    $obj_pdf->Output('file.pdf','I');
}
   ?>

<!DOCTYPE html>
<html lang="en">
  <head>
<title>details</title>


<style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #405f6c;
}

li {
  float: right;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover {
  background-color:#111 ;
}
footer {
  background-color: #405f6c;
  padding: 10px;
  text-align: center;
  color: white;
}
legend { background-color: #405f6c;

}
fieldset {  background-color: #405f6c ;

}

.div1 {
  color: black;
  margin-left:35% ;
}


.in {
  width: 300px;
  height: 25px;
  font-size: 16px;
  background-color: #b8c0c8;
  border-radius: 5px;
  border-color: #6e7478;
}
.bk {
  width: 300px;
  height: 30px;
  border-radius: 10px;
  background-color: green;
  color: white;
  font-size: 16px;
  margin-left: 35%;
}
input:hover{
  background-color: #8c9b96;

}

</style>
<script type="text/javascript">
  function functionv()
  {
 
   var mobile = document.getElementById('mobilenp');
   if (mobile.value =="") {
    alert("please enter Mobile Number");
    return false;
   }
   var pass = document.getElementById('password');
   if (pass.value =="") {
    alert("please enter password");
    return false;
   }
</script>   
  </head>
  <body>
    <ul>
  
  
  <li><a href="login.php">LogOut</a></li>
  <li><a class="active" href="details.php">Home</a></li>
</ul>

<br>
<br>
 <table style="width: 80%"  border=1 cellpadding="10px" cellspacing="2px">
  <tr>
    <th>Photo</th>
    <th>Username</th>
    <th>MobileNo</th>
     <th>Email</th>
     <th>Pincode</th>
     <th>Address</th>
    <th>Download</th>
  </tr>
  <!--<?php /*
  $conn=mysqli_connect("localhost","root","","logbook");  
  $query="select * from register ";

$result=mysqli_query($conn,$query);
          while($row=mysqli_fetch_array($result))
            {
          ?>

  <tr>
    <td width=""><?php 
                     // $query1="SELECT photo FROM register";
                     // $res=mysql_query($query1);
                      //while
                      echo '<img src="'.$row["photo"].'" , width=100, height=100>';
                      ?> </td>
    <td width=""><?php echo $row["username"];?></td>
              <td width=""><?php echo $row["mobileno"];?></td>
                  <td width=""><?php echo $row["email"];?></td>
                      <td width=""><?php echo $row["pincode"];?> </td>
                      <td width=""><?php echo $row["address"];?> </td>
                      <td>
      <input type="submit" name="generate_pdf" value="Download pdf now">
    </td>
                      
  </tr>
  
  
 <?php
         }
         
        */ ?>-->
         <?php
         echo fetch_data();
         ?>
</table>
  </body>
</html>