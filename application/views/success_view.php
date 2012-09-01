
<div id ="display_data">
	<h1>Thank you,  <span class="name"><?php echo $full_name; ?></span></h1>	
	<h3>Form was submitted successfully! </h3>	
	<h4>We have received following data:</h4>
	
<table>
	<tr class="odd">
		<td class="title">Your name: </td>
		<td class="info" ><?php echo $full_name; ?></td>
	</tr>

	<tr class="even">
		<td class="title">Email:</td>
		<td class="info"><?php echo $email; ?></td>
	</tr>
	
	<tr class="odd">
		<td class="title">Password:</td>
		<td class="info"><?php echo $password; ?></td>
	</tr>
	
	<tr class="even">
		<td class="title">Gender:</td>
		<td class="info"><?php echo $gender; ?></td>
	</tr>
        
        <tr class="odd">
		<td class="title">Apellido:</td>
		<td class="info"><?php echo $apelldio; ?></td>
	</tr>
       
	<tr class="even">
		<td class="title">Day:</td>
		<td class="info"><?php echo $day; ?></td>
	</tr>
        
        <tr class="odd">
		<td class="title">Month:</td>
		<td class="info"><?php echo $month; ?></td>
	</tr>

        <tr class="even">
		<td class="title">Year:</td>
		<td class="info"><?php echo $year; ?></td>
	</tr>
	
</table> 
</div>