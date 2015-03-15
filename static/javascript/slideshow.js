function slideshow(){
  var active = $('.slideshow img.active');
  var next = $('.slideshow img.active + img');

  if(active.attr('src') == $('.slideshow img:last-of-type').attr('src')) { next = $('.slideshow img:first-of-type'); }

  $(active).removeClass('active');
  $(next).fadeIn(600,function() { $(next).addClass('active'); });
  $(active).hide();
}

jQuery(document).ready(function(){
  $('.slideshow img:first-of-type').addClass('active');
  setInterval(slideshow, 6000);
})