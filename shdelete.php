<?php include 'session-check-profile.php';

require 'database.php';
$msg="";
$username=$_SESSION['username'];
if(!empty($_POST))
{
	$output="";
  	$id = $_POST['id3'];
  	$sql = "DELETE FROM shorttrain WHERE sh_id=" . $id;
   if(mysqli_query($database, $sql))
    {
		
	 $sno = 1;
     $output .= '<label class="text-success">Data Updated...</label>';
     $select_query = "select * from shorttrain WHERE username='$username' ORDER BY sh_id DESC ";
     $result = mysqli_query($database, $select_query);
     $output .= '
   <div id="sh_table">
        <table class="table table-bordered ">
                <tbody>
                  <tr>
                    <th>Sr.No</th>
                    <th width="20%">Academic Year</th>
                    <th width="20%">Course name</th>
                    <th width="20%">From</th>
                    <th width="20%">TO</th>
                    <th width="20%">Organising Institute/Agency</th>
                    <th >Action</th>
                   <!-- <th width="40%">Details</th>-->
                  </tr>
                  ';
                  while($row = mysqli_fetch_array($result))
     {
      $output .= '
                  <tr>
                    <td>' . $sno++ . ' </td>
                    <td>
                      ' . $row['sh_year'] . '
                    </td>
                    <td>
                      ' . $row['sh_name'] . '
                    </td>
                    <td>
                       ' . $row['sh_from'] . '
                    </td>
                    <td>
                      ' . $row['sh_to'] . '
                    </td>
                    <td>
                      ' . $row['sh_org'] . '
                    </td>
                  

            <td nowrap><button type="submit" class="btn btn-primary shbtn-edit" id="' . $row['sh_id'] . '" ><i class="fa fa-edit"></i></button>
      <button type="submit"   class="btn btn-primary shbtn-remove" id="' . $row['sh_id'] . '"><i class="fa fa-remove"></i></button>

                </td>
                  </tr>     
                   ';
     }
     $output .= '</table>';
    }
    echo $output;
}

   ?>