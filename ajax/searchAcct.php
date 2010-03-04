<html>
	<head>
		<script type = "text/javascript">
			function validate(){
				if(document.formBit.keyword.value == ""){
					alert("You must fill in all the required fields!");
					return false;
				}
				else
					return true;
			}
		</script>
	</head>
	<span id="bitPageTitle">Search Account</span>
	<form name = "formBit" id="formBit"  method="post" action="process/searchAcct.php" onsubmit = "return validate()">
		<p>	
			<table width="50%">
				<tr>
					<td>Search By</td>
					<td>
						<select name="criteria" id="search_by" class="required">
							<option value="username">Username</option>
							<option value="first">First Name</option>
							<option value="last">Last Name</option>
							<option value="empno">Employee Number</option>
							<option value="position">Position</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>&nbsp</td>
				</tr>
				<tr>
					<td>Keyword:</td>
					<td><input type="text" id = "keyword" name="keyword" class="required"></td>
				</tr>			
			</table>
		</p>
		
		<p>
			<table width="50%">
				<tr>
					<td><input type="submit" value="Search"></td>
				</tr>
			</table>
		</p>
	</form>
</html>