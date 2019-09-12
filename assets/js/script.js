const slideCount = parseInt(post_counts['count']);

jQuery(document).ready(function(){
    let slideIntervals = {};
    let rhSlideContainers = jQuery('.rhSlideshowContainer');
    // console.log(rhSlideContainers);
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
        // console.log(rhSlideWidth);
        // rhSlideContainer.addClass('transition').css('transform', `translateX(-100%)`);

        slideIntervals[i] = setInterval(function(){
        // //     console.log('ere');
            rhSlideInner.addClass('transition').css('transform', `translateX(-${rhSlideWidth})`);
            setTimeout(function(){
               let firstSlide = rhSlideInner.find('.rhSlideItem').first();
               rhSlideInner.find('.rhSlideShowInner').append(firstSlide);
               rhSlideInner.removeClass('transition').css('transform', 'translateX(0)');
           }, 700);
        }, 3000);

        console.log(slideIntervals);
        rhSlideContainer.mouseenter(function(){
            const slideID = jQuery(this).data('slide_id');
            // slideIntervals[slideID].clearInterval();
            clearInterval(slideIntervals[slideID]);
        });

        rhSlideContainer.mouseleave(function(){
            const slideID = jQuery(this).data('slide_id');
            slideIntervals[slideID] = setInterval(function(){
            // //     console.log('ere');
                rhSlideInner.addClass('transition').css('transform', `translateX(-${rhSlideWidth})`);
                setTimeout(function(){
                   let firstSlide = rhSlideInner.find('.rhSlideItem').first();
                   rhSlideInner.find('.rhSlideShowInner').append(firstSlide);
                   rhSlideInner.removeClass('transition').css('transform', 'translateX(0)');
               }, 700);
            }, 3000);
        });

    });
});
//
