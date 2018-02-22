<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Register Tournament</title>
        <link rel="stylesheet" type="text/css" href="/css/style.css">
    </head>
    <body>
        <div class="container">
        	<form class=''>
        		<fieldset class='content'>
        			<legend>Tournament register</legend>
        			<div class="separator">
        				<label for='tournament'>Select tournament: </label>
        				<select id='tournament'>
        					<option></option>
        					<option></option>
        					<option></option>
        				</select>
        			</div>
        			<div class="separator">
        				<label for=''>Number of participants: </label>
        				<input type='number' min='1' required>
        			</div>
        			<div class="separator">
        				<label for='category'>Category: </label>
        				<select id='category'>
        					<option>Beginner</option>
        					<option>Amateur</option>
        					<option>Professional</option>
        				</select>
        			</div>
        			<button>Submit</button>
        		</fieldset>
        	</form>
        </div>
    </body>
</html>