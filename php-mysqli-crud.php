<?php
/*connection starts*/
$mysqli = new mysqli('127.0.0.1','root','','weblearningblog');
/*connecting with mysql*/
if(!$mysqli->connect_errno){
echo "Connection Successful";
} else {
	echo $mysqli->connect_error;
}
/*connecting end*/

/*creating a table starts*/
$mysqli = new mysqli('127.0.0.1','root','','weblearningblog');
if($mysqli->connect_errno){
echo $mysqli->connect_error;
} else {
	$sql = 'CREATE TABLE students(
		id INT NOT NULL AUTO_INCREMENT ,
		name varchar(30) NOT NULL,
		study_program varchar(20) NOT NULL,
		department varchar(20),
		date_added TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
		PRIMARY KEY (id)
		)';
	$result = $mysqli->query($sql);
	if(!$result){
		echo "Query Failed. ".$mysqli->error;
	} else {
		echo "Query Successfull";
	}
$mysqli->close();//close the connection



}
/*creating a table ends*/


/*insert query starts*/
$mysqli = new mysqli('127.0.0.1','root','','weblearningblog');
if($mysqli->connect_errno){
echo $mysqli->connect_error;
} else {
	$sql = 'INSERT INTO students (name,study_program,department) VALUES("John","BS","Computer Science")';
	$result = $mysqli->query($sql);
	if(!$result){
		echo "Query Failed. ".$mysqli->error;
	} else {
		echo "Successfully Inserted. ".$mysqli->affected_rows." Records";
	}
}
/*insert query ends*/


/*multiple query inserts*/
$mysqli = new mysqli('127.0.0.1','root','','weblearningblog');
if($mysqli->connect_errno){
echo $mysqli->connect_errno;
} else {
	$sql = 'INSERT INTO students 
	(name,study_program,department) VALUES
	("John","BS","Computer Science"),
	("Kane","MS","Computer Science"),
	("Bob","PhD.","Physics"),
	("Stewart","MBA","Computer Science")
	';
	$result = $mysqli->query($sql);
	if(!$result){
		echo "Query Failed. ".$mysqli->error;
	} else {
		echo "Successfully Inserted. ".$mysqli->affected_rows." Records";
	}
}
/*multiple query ends*/


/*update starts*/
$mysqli = new mysqli('127.0.0.1','root','','weblearningblog');
if($mysqli->connect_errno){
echo $mysqli->connect_errno;
} else {
	$sql = 'UPDATE students SET name="Kane" WHERE id=1';
	$result = $mysqli->query($sql);
	if(!$result){
		echo "Query Failed. ".$mysqli->error;
	} else {
		echo "Successfully Updated. ".$mysqli->affected_rows." Records";
	}
}
/*update ends*/


/*fetch record as associated array*/
$mysqli = new mysqli('127.0.0.1','root','','weblearningblog');
if($mysqli->connect_errno){
echo $mysqli->connect_errno;
} else {
	$sql = 'SELECT * FROM students';
	$result = $mysqli->query($sql);
	if(!$result){
		echo "Query Failed. ".$mysqli->error;
	} else {
		if($result->num_rows > 0){
		$html = "<table>";
		$html .= "<tr><th>ID</th><th>Name</th><th>Study Program</th><th>Department</th></tr>";//header row	
		while($current_row = $result->fetch_assoc()){
			$html .= '<tr>';
			$html .= '<td>'.$current_row['id'].'</td>';
			$html .= '<td>'.$current_row['name'].'</td>';
			$html .= '<td>'.$current_row['study_program'].'</td>';
			$html .= '<td>'.$current_row['department'].'</td>';
			$html .= '</tr>';
			}

			$html .= "</table>";	
			$result->free();//free the resultset memory
			echo $html;
		} else {
			echo "No Record Exists";
		}
	}
}
/*fetch record as associated array ends*/


/*fetch table row as object*/
while($current_row = $result->fetch_object()){
			$html .= '<tr>';
			$html .= '<td>'.$current_row->id.'</td>';
			$html .= '<td>'.$current_row->name.'</td>';
			$html .= '<td>'.$current_row->study_program.'</td>';
			$html .= '<td>'.$current_row->department.'</td>';
			$html .= '</tr>';
			}
/*fetch table row as object ends*/
?>