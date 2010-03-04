YAHOO.example.Data = {

arrayStates: [
    "Alabama",
    "Alaska",
    "Arizona",
    "Arkansas",
    "California",
    "Colorado",
    "Connecticut",
    "Delaware",
    "Florida",
    "Georgia",
    "Hawaii",
    "Idaho",
    "Illinois",
    "Indiana",
    "Iowa",
    "Kansas",
    "Kentucky",
    "Louisiana",
    "Maine",
    "Maryland",
    "Massachusetts",
    "Michigan",
    "Minnesota",
    "Mississippi",
    "Missouri",
    "Montana",
    "Nebraska",
    "Nevada",
    "New Hampshire",
    "New Jersey",
    "New Mexico",
    "New York",
    "North Dakota",
    "North Carolina",
    "Ohio",
    "Oklahoma",
    "Oregon",
    "Pennsylvania",
    "Rhode Island",
    "South Carolina",
    "South Dakota",
    "Tennessee",
    "Texas",
    "Utah",
    "Vermont",
    "Virginia",
    "Washington",
    "West Virginia",
    "Wisconsin",
    "Wyoming"
]

<?php
	session_start();  
	if(!isset($_SESSION['user']))
		echo "<script>document.location='new_home.html'</script>";
		
	else{
	
		$link = mysql_connect('localhost', 'root', '');		
		mysql_select_db('spsis', $link);
		
		$result = mysql_query("SELECT * FROM item");
		
		
		while($rows = mysql_fetch_array($result)){
			echo $rows['desc'];
		}
		
		
	}
?>

};
