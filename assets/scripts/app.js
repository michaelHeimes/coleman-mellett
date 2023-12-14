/**
 * Required
 */
 
 //@prepros-prepend vendor/foundation/js/plugins/foundation.core.js

/**
 * Optional Plugins
 * Remove * to enable any plugins you want to use
 */
 
 // What Input
 //@*prepros-prepend vendor/whatinput.js
 
 // Foundation Utilities
 // https://get.foundation/sites/docs/javascript-utilities.html
 //@prepros-prepend vendor/foundation/js/plugins/foundation.util.box.min.js
 //@*prepros-prepend vendor/foundation/js/plugins/foundation.util.imageLoader.min.js
 //@prepros-prepend vendor/foundation/js/plugins/foundation.util.keyboard.min.js
 //@prepros-prepend vendor/foundation/js/plugins/foundation.util.mediaQuery.min.js
 //@prepros-prepend vendor/foundation/js/plugins/foundation.util.motion.min.js
 //@prepros-prepend vendor/foundation/js/plugins/foundation.util.nest.min.js
 //@*prepros-prepend vendor/foundation/js/plugins/foundation.util.timer.min.js
 //@prepros-prepend vendor/foundation/js/plugins/foundation.util.touch.min.js
 //@prepros-prepend vendor/foundation/js/plugins/foundation.util.triggers.min.js


// JS Form Validation
//@*prepros-prepend vendor/foundation/js/plugins/foundation.abide.js

// Accordian
//@*prepros-prepend vendor/foundation/js/plugins/foundation.accordion.js
//@*prepros-prepend vendor/foundation/js/plugins/foundation.accordionMenu.js
//@*prepros-prepend vendor/foundation/js/plugins/foundation.responsiveAccordionTabs.js

// Menu enhancements
//@*prepros-prepend vendor/foundation/js/plugins/foundation.drilldown.js
//@*prepros-prepend vendor/foundation/js/plugins/foundation.dropdown.js
//@*prepros-prepend vendor/foundation/js/plugins/foundation.dropdownMenu.js
//@*prepros-prepend vendor/foundation/js/plugins/foundation.responsiveMenu.js
//@*prepros-prepend vendor/foundation/js/plugins/foundation.responsiveToggle.js

// Equalize heights
//@*prepros-prepend vendor/foundation/js/plugins/foundation.equalizer.js

// Responsive Images
//@prepros-prepend vendor/foundation/js/plugins/foundation.interchange.js

// Navigation Widget
//@*prepros-prepend vendor/foundation/js/plugins/foundation.magellan.js

// Offcanvas Naviagtion Option
//@*prepros-prepend vendor/foundation/js/plugins/foundation.offcanvas.js

// Carousel (don't ever use)
//@*prepros-prepend vendor/foundation/js/plugins/foundation.orbit.js

// Modals
//@prepros-prepend vendor/foundation/js/plugins/foundation.reveal.js

// Form UI element
//@*prepros-prepend vendor/foundation/js/plugins/foundation.slider.js

// Anchor Link Scrolling
//@prepros-prepend vendor/foundation/js/plugins/foundation.smoothScroll.js

// Sticky Elements
//@*prepros-prepend vendor/foundation/js/plugins/foundation.sticky.js

// Tabs UI
//@*prepros-prepend vendor/foundation/js/plugins/foundation.tabs.js

// On/Off UI Switching
//@*prepros-prepend vendor/foundation/js/plugins/foundation.toggler.js

// Tooltips
//@*prepros-prepend vendor/foundation/js/plugins/foundation.tooltip.js

// What Input
//@prepros-prepend vendor/what-input.js

// Swiper
//@prepros-prepend vendor/swiper-bundle.js

// Isotope
//* @prepros-prepend vendor/isotope.pkgd.js

// DOM Ready
(function($) {
	'use strict';
    
    var _app = window._app || {};
    
    _app.foundation_init = function() {
        $(document).foundation();
    }
        
    _app.emptyParentLinks = function() {
            
        $('.menu li a[href="#"]').click(function(e) {
            e.preventDefault ? e.preventDefault() : e.returnValue = false;
        });	
        
    };
    
    _app.fixed_nav_hack = function() {
        $('.off-canvas').on('opened.zf.offCanvas', function() {
            $('header.site-header').addClass('off-canvas-content is-open-right has-transition-push');		
            $('header.site-header #top-bar-menu .menu-toggle-wrap a#menu-toggle').addClass('clicked');	
        });
        
        $('.off-canvas').on('close.zf.offCanvas', function() {
            $('header.site-header').removeClass('off-canvas-content is-open-right has-transition-push');
            $('header.site-header #top-bar-menu .menu-toggle-wrap a#menu-toggle').removeClass('clicked');
        });
        
        $(window).on('resize', function() {
            if ($(window).width() > 1023) {
                $('.off-canvas').foundation('close');
                $('header.site-header').removeClass('off-canvas-content has-transition-push');
                $('header.site-header #top-bar-menu .menu-toggle-wrap a#menu-toggle').removeClass('clicked');
            }
        });    
    }
    
    _app.display_on_load = function() {
        $('.display-on-load').css('visibility', 'visible');
    }
    
    // Custom Functions
    
    _app.mobile_takover_nav = function() {
        $(document).on('click', 'a#menu-toggle', function(){
            
            if ( $(this).hasClass('clicked') ) {
                $(this).removeClass('clicked');
                $('#off-canvas').fadeOut(200);
            
            } else {
            
                $(this).addClass('clicked');
                $('#off-canvas').fadeIn(200);
            
            }
            
        });
    }
    
        
    _app.media_image_slider = function() {
            
        const mediaSliders = document.querySelectorAll('.media-slider');
                
        if(mediaSliders) {
        
            mediaSliders.forEach(function (mediaSlider, index) {
            
                const prevBtn = mediaSlider.querySelector('.swiper-button-prev');
                const nextBtn = mediaSlider.querySelector('.swiper-button-next');    
                const imageSlider = mediaSlider.querySelector('.image-slider');   
                                
                if(imageSlider) {
    
                    const swiper = new Swiper(imageSlider, {
                        slidesPerView: 1,
                        spaceBetween: 15,
                        breakpoints: {
                            640: {
                                slidesPerView: 2,
                            },
                        },
                        navigation: {
                            nextEl: nextBtn,
                            prevEl: prevBtn,
                        },
                    });  
                    
                }
                
                const videoSlider = mediaSlider.querySelector('.video-slider');   
                
                if(videoSlider) {
                    
                    const masks = mediaSlider.querySelectorAll('.video-wrap.has-mask .video-mask');
                    
                    masks.forEach(function (mask) {
                        
                        //Fade Function
                        function fadeIn(element, duration) {
                            let opacity = 0;
                            element.style.display = 'block';
                        
                            const interval = 10;
                            const step = 1 / (duration / interval);
                        
                            function updateOpacity() {
                                if (opacity < 1) {
                                    opacity += step;
                                    element.style.opacity = opacity;
                                    setTimeout(updateOpacity, interval);
                                }
                            }
                        
                            updateOpacity();
                        }
                        
                        function fadeOut(element, duration) {
                            let opacity = 1;
                        
                            const interval = 10;
                            const step = 1 / (duration / interval);
                        
                            function updateOpacity() {
                                if (opacity > 0) {
                                    opacity -= step;
                                    element.style.opacity = opacity;
                                    setTimeout(function () {
                                        updateOpacity();
                                        if (opacity <= 0) {
                                            element.style.display = 'none';
                                        }
                                    }, interval);
                                }
                            }
                            updateOpacity();
                        }
                        
                        const video = mask.parentElement.querySelector('iframe');   
                    
                        // Define a variable to hold the YouTube player
                        let player;
                        
                        // Create the YouTube player when the iframe is ready
                        video.onload = function() {
                          player = new YT.Player(video, {
                            events: {
                              'onReady': onPlayerReady,
                            }
                          });
                        };
                        
                        function onPlayerReady(event) {
                            mask.addEventListener('click', function(event) {
                                event.preventDefault();
                                // Check if the player is valid before playing
                                    player.playVideo();
                            });   
                            
                            swiper.on('slideChange', function () {
                                // Check if the player is valid before playing
                                player.stopVideo();
                            });   
                                     
                        }
                        
                        mask.addEventListener('click', function(event) {
                            event.preventDefault();
                            fadeOut( mask, 250);
                        });
                        
                    });
                
                    const swiper = new Swiper(videoSlider, {
                        slidesPerView: 1,
                        spaceBetween: 15,
                        navigation: {
                            nextEl: nextBtn,
                            prevEl: prevBtn,
                        }
                    });  

                }
            });
        
        }
            
    }
    
    _app.video_masks = function() {
        const masks = document.querySelectorAll('.single-video-wrap.video-wrap.has-mask .video-mask');
        
        if(masks) {
            masks.forEach(function (mask) {
                //Fade Function
                function fadeIn(element, duration) {
                    let opacity = 0;
                    element.style.display = 'block';
                
                    const interval = 10;
                    const step = 1 / (duration / interval);
                
                    function updateOpacity() {
                        if (opacity < 1) {
                            opacity += step;
                            element.style.opacity = opacity;
                            setTimeout(updateOpacity, interval);
                        }
                    }
                
                    updateOpacity();
                }
                
                function fadeOut(element, duration) {
                    let opacity = 1;
                
                    const interval = 10;
                    const step = 1 / (duration / interval);
                
                    function updateOpacity() {
                        if (opacity > 0) {
                            opacity -= step;
                            element.style.opacity = opacity;
                            setTimeout(function () {
                                updateOpacity();
                                if (opacity <= 0) {
                                    element.style.display = 'none';
                                }
                            }, interval);
                        }
                    }
                    updateOpacity();
                }
                
                const video = mask.parentElement.querySelector('iframe');   
            
                // Define a variable to hold the YouTube player
                let player;
                
                // Create the YouTube player when the iframe is ready
                video.onload = function() {
                  player = new YT.Player(video, {
                    events: {
                      'onReady': onPlayerReady,
                    }
                  });
                };
                
                function onPlayerReady(event) {
                    mask.addEventListener('click', function(event) {
                        event.preventDefault();
                        // Check if the player is valid before playing
                            player.playVideo();
                    });    
                }
                
                mask.addEventListener('click', function(event) {
                    event.preventDefault();
                    fadeOut( mask, 250);
                });
            });
            
        }
        
    }
    
    _app.gallery_load_more = function() {
        
        function fadeIn(element, duration) {
            let opacity = 0;
            element.style.display = 'block';
        
            const interval = 10;
            const step = 1 / (duration / interval);
        
            function updateOpacity() {
                if (opacity < 1) {
                    opacity += step;
                    element.style.opacity = opacity;
                    setTimeout(updateOpacity, interval);
                }
            }
        
            updateOpacity();
        }
        
        const loadMoreGalleryContainers = document.querySelectorAll('.load-more-gallery');
        
        loadMoreGalleryContainers.forEach(function (lmg) {
            const loadMoreButton = lmg.querySelector('.load-more-button');
            
            const batchSize = 17;
            const increment = 17;
            
            if(loadMoreButton) {
                loadMoreButton.addEventListener('click', function () {
                    showNextBatch();
                });
            }
                        
            const showNextBatch = function() {
                const hiddenImages = lmg.querySelectorAll('.cell.hidden');
            
                if (hiddenImages.length > 0) {
                    for (let i = 0; i < increment && i < hiddenImages.length; i++) {
                        hiddenImages[i].classList.remove('hidden');
                        fadeIn(hiddenImages[i], 300);
                    }
            
                    hiddenImages[0].scrollIntoView({ behavior: 'smooth' });
                }
            
                // Check if there are still hidden images
                if (lmg.querySelectorAll('.cell.hidden').length === 0) {
                    loadMoreButton.style.display = 'none';
                }
            }    
            
            const modalTriggers = lmg.querySelectorAll('.images-wrap a');
            
            modalTriggers.forEach(function (trigger) {
                trigger.addEventListener('click', function (event) {
                    event.preventDefault();
                    
                    const modalTrigger = trigger.getAttribute('data-modal');
                    const targetModal = document.getElementById(modalTrigger);
                    const targetSlider = targetModal.querySelector('.swiper-initialized');
                    const targetSlide = trigger.id;
                    const goToSlide = targetSlider.querySelector('.swiper-slide[data-image="' + targetSlide + '"]');

                    const slideIndex = goToSlide.getAttribute('data-swiper-slide-index');
                    
                    const swiper = targetSlider.swiper;
                    
                    //const slideIndex = swiper.slides.indexOf(goToSlide);
                    
                    if (swiper) {
                        swiper.slideTo(slideIndex, 0, false);
                    }

                    const targetIframe = goToSlide.querySelector('iframe');
                    
                    if(targetIframe) {
                    
                        // const iframeSrc = targetIframe.getAttribute('data-src');
                        // 
                        // if (!targetIframe.classList.contains('youtube-loaded')) {
                        //     targetIframe.setAttribute('src', iframeSrc);
                        //     targetIframe.classList.add('youtube-loaded');
                        // }
                    
                    }

                    $(targetModal).foundation('open');

                });
            });
            
            const gallerySliders = document.querySelectorAll('.gallery-slider');
            
            let swiper = '';
            
            gallerySliders.forEach(function (slider) {
                const prevBtn = slider.querySelector('.swiper-button-prev');
                const nextBtn = slider.querySelector('.swiper-button-next');  
                
                const closeBtn = slider.parentElement.parentElement.querySelector('.close-button');
                
                console.log(closeBtn);
                                    
                const videos = slider.querySelectorAll('iframe'); 
                
                videos.forEach(function (video) {

                    const iframeSrc = video.getAttribute('data-src'); 
                    video.setAttribute('src', iframeSrc);
                    video.classList.add('source-loaded');
    
                    if( video.getAttribute('src') != '' ) {

                        
                        // Define a variable to hold the YouTube player
                        let player;
                        
                        // Create the YouTube player when the iframe is ready
                        video.onload = function() {
                          player = new YT.Player(video, {
                            events: {
                              'onReady': onPlayerReady,
                            }
                          });
                        };
                        
                        function onPlayerReady(event) {
                             
                            swiper.on('slideChange', function () {
                                if (player && typeof player.stopVideo === 'function') {
                                    player.stopVideo();
                                }
                            });   
                           
                            closeBtn.addEventListener('click', function (event) {
                                if (player && typeof player.stopVideo === 'function') {
                                    player.stopVideo();
                                }
                            });  
                            
                        }    
                        
                    }
                    
                });
                
               
               
                swiper = new Swiper(slider.querySelector('.swiper-container'), {
                    slidesPerView: 1,
                    spaceBetween: 50,
                    initialSlide: 0,
                    loop: true,
                    lazy: {
                        loadPrevNext: true,
                    },
                    navigation: {
                        nextEl: nextBtn,
                        prevEl: prevBtn,
                    },
                }); 
                
                // function pauseYouTubeVideos() {
                //     const currentSlide = swiper.activeIndex;
                //     const previousSlide = swiper.previousIndex;
                //   
                //     // Pause YouTube video in the previous slide
                //     const prevSlideYouTube = swiper.slides[previousSlide].querySelector('iframe');
                //     if (prevSlideYouTube) {
                //         //console.log(prevSlideYouTube);
                //         var player = new YT.Player(prevSlideYouTube);
                //         if (player && typeof player.pauseVideo === 'function') {
                //             player.pauseVideo();
                //         }
                //     }
                //   
                // }
               
//                 swiper.on('transitionStart', function () {
//                     
//                     const slides = swiper.slides;
//                     
//                     slides.forEach(function (slide) {
// 
//                         if(slide.classList.contains('swiper-slide-active')) {
//                             
//                             const targetIframe = slide.querySelector('iframe');
//                             
//                             if(targetIframe) {
//                                 const iframeSrc = targetIframe.getAttribute('data-src'); 
//                                 // targetIframe.setAttribute('src', iframeSrc);
//                                 // targetIframe.classList.add('source-loaded');
//                                 if( !targetIframe.classList.contains('source-loaded') ) {
//                                     const iframeSrc = targetIframe.getAttribute('data-src'); 
//                                     targetIframe.setAttribute('src', iframeSrc);
//                                     targetIframe.classList.add('source-loaded');
//                                 }
// 
//                             }
//                         }
//                         
// 
//                     });
// 
//                 });

                // const modalCloseBtns = document.querySelectorAll('.gallery-modal .close-button');
                // 
                // modalCloseBtns.forEach(function (btn) {
                //     btn.addEventListener('click', function (event) {
                //         event.preventDefault();
                //         const iframes = btn.closest('.gallery-modal').querySelectorAll('iframe'); 
                //                                 
                //         iframes.forEach(function (video) {
                //             // Define a variable to hold the YouTube player
                //             let player2;
                //             const video2 = video;
                //             console.log(video2)
                //             // Create the YouTube player when the iframe is ready
                //             video.onload = function() {
                //               player2 = new YT.Player(video2);
                //             };
                //         });
                //     });
                // });

                    
                
                
            });
            
        });
            
    }
            
    _app.init = function() {
        
        // Standard Functions
        _app.foundation_init();
        _app.emptyParentLinks();
        //_app.fixed_nav_hack();
        _app.display_on_load();
        
        // Custom Functions
        //_app.mobile_takover_nav();
        _app.video_masks();
        _app.media_image_slider();
        _app.gallery_load_more();
        
    }
    
    
    // initialize functions on load
    $(function() {
        _app.init();
    });
	
	
})(jQuery);