jQuery(function($){


	/**
	 * Set up our playlist
	 */

	// Find all the mp3 links
	var $playlistItems = $("a[href$='.mp3']");

	// Give each playlist item a number for convenience
	$playlistItems.each(function(i){
		$(this).data({itemID: i});
	});


	/**
	 * Bonus/shim/hack! Cycle through multiple audio files if we have more than one for a given word.
	 * Because I couldn't stop making crackle and pop audio clips...
	 *
	 * @todo It is hacky and tacky to have this hard-coded. A better way to do it would be to 
	 *       use PHP to look in the relevant directory and find all files automatically.
	 */

	// Extra filenames to cycle through
	var alternateFiles = {
		CracklePop: ['',2,3,4,5], // uses CracklePop.mp3, CracklePop2.mp3, CracklePop3.mp3, etc.
		Crackle: ['',1,2,3,4,5,6,7,8],
		Pop: ['',1,2,3,4,5,6,7]
	};

	// Modify the playlist to use the alternate filenames 
	$.each( alternateFiles, function( key, alternates ){
		$playlistItems.filter( '.item-'+key ).each(function(i){				
			var $this = $(this);
			var src = $this.attr('href').replace(/(\.[^.]+)$/i, alternates[ i % alternates.length ] + "$1" );
			$this.attr({href: src});
		});
	});


	/**
	 * Audio control functions
	 */

	// Play an item from the playlist
	function playFromPlaylist( $playlistItem, $audioPlayer ) {
		$audioPlayer
			.attr({ src: $playlistItem.attr('href') })
			.data({ itemID: $playlistItem.data('itemID') })[0]
			.play();
		$playlistItems.removeClass('playing');
		$playlistItem.addClass('playing');
	}

	// Play the next item from the playlist
	function playNextInPlaylist( $playlistItems, $audioPlayer ) {

		// Find out what song is currently playing
		var currentlyPlayedItemIndex = $audioPlayer.data('itemID');

		// Grab the next song in the playlist
		var $nextSong = $playlistItems.eq( currentlyPlayedItemIndex + 1 );

		// Stop (don't loop) if we're at the end of the playlist
		if ( currentlyPlayedItemIndex >= $playlistItems.length - 1 ) return;

		// Play the song
		playFromPlaylist( $nextSong, $audioPlayer );
	}


	/**
	 * The audioplayer
	 * 
	 * - Add the interface to the page
	 * - Set up event handlers
	 * - Add an autoplay option
	 */

	// Create the audio player and add it to the page
	var $audioPlayerContainer = $('<div id="audioplayer">');
	var $audioPlayer = $('<audio controls="controls" type="audio/mpeg">').appendTo($audioPlayerContainer);
	var $autoplayButton = $('<a class="autoplay">Autoplay</a>').appendTo($audioPlayerContainer);
	$audioPlayerContainer.appendTo('body');

	// Play a track when you click on a playlist item
	$playlistItems.on('click', function(event){
		playFromPlaylist( $(this), $audioPlayer );
		event.preventDefault();
	});

	// Autoplay control
	$autoplayButton.on('click', function(event){
		$(this).toggleClass('enabled');
	});

	// When a track finishes playing, play the next one
	$audioPlayer.on('ended', function(event){
		$playlistItems.removeClass('playing')
		if ( $('.autoplay.enabled').length ) {
			playNextInPlaylist( $playlistItems, $audioPlayer );
		}
	});

});