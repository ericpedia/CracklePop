<?php 

/**
 * A very basic CracklePop.
 * Everything is hard-coded.
 */

function simpleCracklePop(){
	$i = 1;
	while ( $i <= 100 ) {
		if ( $i % 15 === 0 ) echo "CracklePop";
		else if ( $i % 3 === 0 ) echo "Crackle";
		else if ( $i % 5 === 0 ) echo "Pop";
		else echo $i;
		echo "<br>";
		$i++;
	}
}


/**
 * A better CracklePop function, which lets you customize everything!
 * 
 * - the min and max for your count!
 * 		Default: Count from 1 to 100
 * 	
 * - which numbers to Crackle and Pop at, and what text to output!
 * 		Default: "Crackle" at 3 and "Pop" at 5
 * 		You can specify any number of magic numbers, and output any string.
 * 		
 * - a delimiter to put in between each item!
 * 		Default: A line break ("\n")
 * 		Other examples: "<br>", ", "
 *
 * - a template to output each item in!
 * 		Default: No template. Just outputs the item: "{{item}}"
 * 		Other examples:
 * 			'Simon says {{item}}'
 * 				Outputs 'Simon says 1', 'Simon says 2', 'Simon says Crackle', etc.
 * 			'<img src="{{item}}.gif">'
 * 				Outputs an image for each item (images sold separately)
 * 				
 * @param array $options An array specifying any of these options
 * 	    - min (int): where to start counting
 * 	    	Default: 1
 * 		- max (int): where to stop counting
 * 			Default: 100
 * 		- delimiter (string): string to output between items
 * 			Default: "\n"
 * 		- template (string): template for each item
 * 			Use "{{item}}" where the item goes
 * 			Default: "{{item}}"
 * 		- magicnumbers (array): a dictionary of the numbers to crackle and pop at, and what to say
 * 			Default: array( 3 => "Crackle", 5 => "Pop" )
 * 			
 * @return string The output of your count
 */

function flexibleCracklePop( $options = array() ) {

	// Default options
	$defaults = array(
		'min' => 1,
		'max' => 100,
		'delimiter' => "\n",
		'template' => "{{item}}",
		'magicnumbers' => array(
			3 => "Crackle",
			5 => "Pop",
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
