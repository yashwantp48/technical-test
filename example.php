<?php

const SPACING_X = 1;

const SPACING_Y = 0;

const JOINT_CHAR = '+';

const LINE_X_CHAR = '-';

const LINE_Y_CHAR = '|';



 

$table = array(

	array(

		'Name' => 'Trixie',

		'Color' => 'Green',

		'Element' => 'Earth',

		'Likes' => 'Flowers'

	),

	array(

		'Name' => 'Tinkerbell',

		'Element' => 'Air',

		'Likes' => 'Singing',

		'Color' => 'Blue'

	),

	array(

		'Element' => 'Water',

		'Likes' => 'Dancing',

		'Name' => 'Blum',

		'Color' => 'Pink'

	),

);

 

function draw_table($table){

	$columns_headers = columns_headers($table);

	$columns_lengths = columns_lengths($table, $columns_headers);	

	$row_headers = row_headers($columns_headers, $columns_lengths);

 

	echo '<table cellpadding="2" cellspacing="2" border="1">'; 

		echo "<tr>".$row_headers . "</tr>";		

		foreach($table as $row_cells)

		{

			$row_cells = row_cells($row_cells, $columns_headers, $columns_lengths);

			echo "<tr>".$row_cells  . "</tr>";

		} 

	echo '</table>'; 

}

 

function columns_headers($table){

	return array_keys(reset($table));

}

 

function columns_lengths($table, $columns_headers){

	$lengths = [];

	foreach($columns_headers as $header)

	{

		$header_length = strlen($header);

		$max = $header_length;

		foreach($table as $row)

		{

			$length = strlen($row[$header]);

			if($length > $max)

				$max = $length;

		}

 

		if(($max % 2) != ($header_length % 2))

			$max += 1;

 

		$lengths[$header] = $max;

	}

 

	return $lengths;

}

 



 

function row_headers($columns_headers, $columns_lengths){

	$row = '';

	$i = 0;

	foreach($columns_headers as $header)

	{		

		$row .= "<td bgcolor='#CC".$i."'>" . str_pad($header, (SPACING_X * 2) + $columns_lengths[$header], ' ', STR_PAD_BOTH)."</td>";

		$i = $i +30;

	} 

	return $row;

}

 

function row_cells($row_cells, $columns_headers, $columns_lengths){

	$row = '';

	$i = 0;

	foreach($columns_headers as $header)

	{

		$row .= "<td bgcolor='#CC".$i."'>" . str_repeat(' ', SPACING_X) . str_pad($row_cells[$header], SPACING_X + $columns_lengths[$header], ' ', STR_PAD_RIGHT)."</td>";

		$i = $i +30;

	} 

	return $row;

}

 

draw_table($table);

		



?>
