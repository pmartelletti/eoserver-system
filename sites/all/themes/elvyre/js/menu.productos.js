jQuery(function($) {
	/*
	 * $('#nav li:has(a[href="/productos"]) ul li.has-image').hover( function(){
	 * var $that = $(this); var img = $that.find('div.image-menu a'); $('#nav
	 * div.content-image').html(img); }, function(){ var $that = $(this);
	 * $('#nav div.content-image').html(''); } );
	 */
	// $($('#nav li:has(a[href="/productos"]) ul
	// li.has-image')[0]).find('div.image-menu').show();
	var div = $('<div>').addClass('content-image');
	$('#nav li:has(a[href="/productos"])').append(div);
	$('#nav li:has(a[href="/productos"]) ul li.has-image').each(
			function(index, element) {
				var img = $(element).find('div.image-menu');
				var _class = $(img).attr('class').split(' ');
				$(element).attr('data-id', _class[1]);
				$('#nav div.content-image').append(img);
			});
	$('#nav li:has(a[href="/productos"]) ul li.has-image').hover(function() {
		var $that = $(this);
		var _id = $that.attr('data-id');
		$('#nav div.content-image div.' + _id).show();
	}, function() {
		var $that = $(this);
		var _id = $that.attr('data-id');
		$('#nav div.content-image div.' + _id).hide();
	});
});