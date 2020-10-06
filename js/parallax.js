$(window).scroll(function()
{
	var scrollTop = $(this).scrollTop();
	$('.slide').css('top', -(scrollTop * 0.1) + 'px');
});