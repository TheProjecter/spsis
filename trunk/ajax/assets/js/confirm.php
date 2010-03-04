<?php
	echo "function show_confirm(){";
	echo "var r=confirm('Are You Sure You want to Delete?');";
		echo "if (r==true){";
  
			if($rows['stock'] != 0){
				echo "document.location='new_delete_notice_fail.html'";
			}else{
				mysql_query("DELETE FROM item where mat_no='{$rows['mat_no']}'");
				echo "document.location='new_delete_notice.html'";
			}
			
		echo "}else{";
			echo "document.location='integrate_list_to_dialog.php'";
		echo "}";
	echo "}";
?>