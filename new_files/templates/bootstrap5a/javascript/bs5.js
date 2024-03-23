$(window).on('load',function() {
	$('.show_rating input').change(function () {
		var $radio = $(this);
		$('.show_rating .selected').removeClass('selected');
		$radio.closest('label').addClass('selected');
	});
});
/* Modalbox */
function loadGallery(){
	var selector = 0;
	function updateModal(selector,type) {
		var $sel = selector;
		if (type == 'image'){
			$('.modal-title').text($sel.attr('data-title'));
			if ($('.modal-body img').length){
				$('.modal-body img').attr("src", $sel.attr('data-image'));
			} else {
				$('.modal-body').append('<img class="img-fluid d-block mx-auto" src="'+$sel.attr('data-image')+'">');
			}
		} else {
			var src = $sel.data('src');
			$('.modal-title').text($sel.attr('title'));
			if (src.indexOf('print') != -1 || src.indexOf('bs5_') != -1) {
				var windowheight = $(window).height()-225;
				$('.modal-body').html('<iframe id="frame" src="'+src+'" width="100%" height="'+windowheight+'" frameborder="0"></iframe>');
			} else if (src.indexOf('vimeo') != -1 || src.indexOf('youtube') != -1) {
				var windowheight = $(window).height()-225;
				$('.modal-body').html('<iframe id="frame" src="'+src+'" width="100%" height="'+windowheight+'" frameborder="0" allowfullscreen=""></iframe>');
			} else {
				$('.modal-body').load(src);
			}
			if (type == 'layer'){
				$('#modal').modal('show');
			}
		}
	}
	$('a.cbimages').on('click',function(){
		updateModal($(this),'image');
	});
	$('a.iframe').on('click',function(){
		updateModal($(this),'iframe');
	});
	$("#print_order_layer").on('submit', function(event) {
		$(this).attr('data-src',$(this).attr("action") + '&' + $(this).serialize());
		updateModal($("#print_order_layer"),'layer');
		return false;
	});
}
/* Modalbox */
$(document).ready(function(){
	$('.search.dropdown').on('shown.bs.dropdown', function(e) {
		$('#inputString').focus();
	});
	/* Attribut Price Updater */
	if (typeof PriceUpdaterReady !== 'undefined' && $.isFunction(PriceUpdaterReady)) {PriceUpdaterReady();}
	/* Go to top */
	$(window).scroll(function() {if ($(this).scrollTop()) {$('.go2top').fadeIn();} else {$('.go2top').fadeOut();}});$(".go2top").click(function() {$("html, body").animate({scrollTop: 0}, 1000);});
	/* Modalbox */
	$("#modal").on('hidden.bs.modal', function () {
		$('.modal-title').empty();
		$('.modal-body').empty();
		$('.modal-footer .counter').empty();
	});
	$('a.iframe').each(function() {
		$(this).attr("data-src", $(this).attr("href"));
		$(this).attr("data-bs-toggle", "modal");
		$(this).attr("data-bs-target", "#modal");
		$(this).attr("href", "#");
	});
	loadGallery();
	/* Modalbox */
	/* aktiviere Tabs */
	$('#bs_tabs button:first').tab('show');
	/* Accordion */
	$('#infoaccordion button:first').trigger("click");
	if ($('#accordion').length > 0){
		$('.payment, .shipping').each(function(){
			if ($(this).find('input').is(':checked')) {
				$(this).find('.accordion-button').removeClass('collapsed');
				$(this).children('.accordion-collapse').addClass('show');
			}
		});
		$('#accordion').has('[id^="acc"]').on('shown.bs.collapse', function(e) {
			$(this).find('span[data-bs-target="#'+e.target.id+'"] input').prop('checked', true).focus();
		});
	}
});