<?php 

// function simplefizzbuzz(){
// 	$i = 1;
// 	while ( $i <= 100 ) {
// 		if ( $i % 15 === 0 ) echo "FizzBuzz";
// 		else if ( $i % 3 === 0 ) echo "Fizz";
// 		else if ( $i % 5 === 0 ) echo "Buzz";
// 		else echo $i;
// 		echo "<br>";
// 		$i++;
// 	}
// }

// echo simplefizzbuzz();

/**
 * Make numbers fizz and buzz
 *
 * @author  Eric
 * 
 * @link http://en.wikipedia.org/wiki/Fizz_buzz
 * @link http://lmgtfy.com/?q=fizz+buzz
 *       
 * @todo Make good impression
 * 
 * @param  integer $min     The number at which to start
 * @param  integer $max     The number at which to stop
 * @param  array   $options Exciting options hitherto unknown!
 * 
 * @return Nothing to see here.
 * 
 */
function fizzbuzz( $options = array() ) {

	// Default options
	$defaults = array(
		'min' => 1,
		'max' => 100,
		'fizznumber' => 3,
		'buzznumber' => 5,
		'fizz' => 'Fizz',
		'buzz' => 'Buzz',
		'delimiter' => '<br>'
	);

	// Merge defaults with the options that were passed in
	$options = array_merge( $defaults, (array) $options );

	// Set up our loop
	$count = $options['min'];
	$results = array();

	// Loop through our series, fizzing and buzzing as necessary
	while ( $count <= $options['max'] ) {

		$output = "";

		if ( ($count % $options['fizznumber']) === 0 ) 
			$output .= $options['fizz'];

		if ( ($count % $options['buzznumber']) === 0 ) 
			$output .= $options['buzz'];

		// Add this item to our results array
		$results[] = $output ? $output : $count;

		$count++;	
	}

	// Create our final output 
	return implode( $options['delimiter'], $results );

}

// echo fizzbuzz();



// A FizzBuzz function that lets you specify any number of fizzy numbers
// Add before and after
function flexiblefizzbuzz( $options = array() ) {

	// Default options
	$defaults = array(
		'min' => 1,
		'max' => 100,
		'delimiter' => "\n",
		'template' => "{{item}}",
		'magicnumbers' => array(
			3 => "Fizz",
			5 => "Buzz",
		)
	);

	// Merge defaults with the options that were passed in
	$options = array_merge( $defaults, (array) $options );

	// Set up our loop
	$count = $options['min'];
	$results = array();

	// Loop through our series, fizzing and buzzing as necessary
	while ( $count <= $options['max'] ) {

		$output = "";

		foreach ( $options['magicnumbers'] as $number => $word ) {
			if ( 0 === ($count % $number) )
				$output .= $word;
		}

		// Add this item to our results array
		$item = $output ? $output : $count;

		$results[] = str_replace('{{item}}', $item, $options['template']);

		$count++;
		
	}

	// Create our final output 
	return implode( $options['delimiter'], $results );

}
