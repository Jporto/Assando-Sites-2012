var blink = {
	delay: function() {
		return Math.random() * 8000 + 2000;
		// return 5000 + ((Math.random() - 0.5) * 2000);
	},
	duration: function() {
		return 100 + Math.floor(Math.random() * 100);
	},
	blinkAgain: function() {
		return (Math.random() < .2);
	},
	betweenBliks: function() {
		return blink.duration() / 2;
	}
};

$.fn.blink = function(continueBlinking) {
	var $element = $(this);

	// Star the blink
	$element.addClass('blink');

	// Finish the blink
	setTimeout(function() {
		$element.removeClass('blink');

		// Change of blinking again
		if (continueBlinking && blink.blinkAgain()) {
			setTimeout(function() {
				$element.blink(false);
			}, blink.betweenBliks());
		}
	}, blink.duration());

	// Continue blinking?
	if (continueBlinking) {
		setTimeout(function() {
			$element.blink(true);
		}, blink.delay());
	}
};

// Ativa o blink pra todos os gnomos (visíveis) que piscam
$('*[data-blink]:visible').each(function() {
	var $element = $(this);

	setTimeout(function() {
		$element.blink(true);
	}, blink.delay());
});