CracklePop
========

### A flexible CracklePop function, which lets you customize everything.

- **The min and max for your count.** Default: Count from 1 to 100
	
- **Which numbers to Crackle and Pop at, and what text to output.** Default: "Crackle" at 3 and "Pop" at 5. You can specify any number of magic numbers, and output any string.
		
- **A delimiter to put in between each item.** Default: A line break (`"\n"`)

- **A template to output each item in.** Default: `"{{item}}"`. This is equivalent to no template—it just outputs the item.  Other examples:
 - `'Simon says {{item}}'` — Outputs 'Simon says 1', 'Simon says 2', 'Simon says Crackle', etc.
 - `'<img src="{{item}}.gif">'` — Outputs an image for each item (images sold separately)

## Options

The function takes a single, optional parameter, a multidimensional array of options. These options can be specified:

- **min** *(int)*: where to start counting. Default: `1`
- **max** *(int)*: where to stop counting. Default: `100`
- **delimiter** *(string)*: string to output between items. Default: `"\n"`
- **template** *(string)*: template for each item. Use "{{item}}" where the item goes. Default: `"{{item}}"`
- **magicnumbers** *(array)*: a dictionary of the numbers to crackle and pop at, and what to say. Default: `array( 3 => "Crackle", 5 => "Pop" )`


## Examples

### With default options

```php
echo flexibleCracklePop();
```

### Using custom options

```php
// These are in fact the default options
echo flexibleCracklePop( array(
		'min' => 1,
		'max' => 100,
		'delimiter' => "\n",
		'template' => "{{item}}",
		'magicnumbers' => array(
			3 => "Crackle",
			5 => "Pop",
		)
	) 
);
```
