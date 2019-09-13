const slideCount = parseInt(post_counts['count']);
const slideDuration = post_counts['duration'];

jQuery(document).ready(function(){
    let slideIntervals = {};
    let rhSlideContainers = jQuery('.rhSlideshowContainer');


    rhSlideContainers.each(function(i){
        let rhSlideContainer = jQuery(this);
        rhSlideContainer.attr('data-slide_id',i);
        let rhSlideContainerSlides = rhSlideContainer.find('.rhSlideItem');
        let rhSlideCount = rhSlideContainerSlides.length;
        let rhSlideInner = rhSlideContainer.find('.rhSlideShowInner');
        rhSlideInner.css({
            width: 100 * rhSlideCount + '%'
        });
        rhSlideContainerSlides.each(function(x){
            jQuery(this).css({
                width: (100 / rhSlideCount) + '%'
            });
        });
        let rhSlideWidth = (100 / rhSlideCount) + '%';

        startInterval(i, rhSlideInner, rhSlideWidth);

        rhSlideContainer.mouseenter(function(){
            const slideID = jQuery(this).data('slide_id');
            clearInterval(slideIntervals[slideID]);
        });

        rhSlideContainer.mouseleave(function(){
            const slideID = jQuery(this).data('slide_id');
            startInterval(slideID, rhSlideInner, rhSlideWidth);
        });

    });

    function startInterval(slideNum, slideInner, slideWidth){
        slideIntervals[slideNum] = setInterval(function(){
            slideInner.addClass('transition').css('transform', `translateX(-${slideWidth})`);
            setTimeout(function(){
               let firstSlide = slideInner.find('.rhSlideItem').first();
               slideInner.find('.rhSlideShowInner').append(firstSlide);
               slideInner.removeClass('transition').css('transform', 'translateX(0)');
           }, 700);
       }, slideDuration * 1000);
    }


});
