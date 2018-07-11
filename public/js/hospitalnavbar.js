$(document).ready(function(){

    /**
     * This object controls the nav bar. Implement the add and remove
     * action over the elements of the nav bar that we want to change.
     *
     * @type {{flagAdd: boolean, elements: string[], add: Function, remove: Function}}
     */
    var myNavBar = {
    
        flagAdd: true,
    
        elements: [],
    
        init: function (elements) {
            this.elements = elements;
        },
    
        add : function() {
            if(this.flagAdd) {
                for(var i=0; i < this.elements.length; i++) {
                    document.getElementById(this.elements[i]).className += " fixed-theme";
                }
                this.flagAdd = false;
            }
        },
    
        remove: function() {
            for(var i=0; i < this.elements.length; i++) {
                document.getElementById(this.elements[i]).className =
                        document.getElementById(this.elements[i]).className.replace( /(?:^|\s)fixed-theme(?!\S)/g , '' );
            }
            this.flagAdd = true;
        }
    
    };
    
    /**
     * Init the object. Pass the object the array of elements
     * that we want to change when the scroll goes down
     */
    myNavBar.init(  [
        "header",
        "header-container",
        "brand"
    ]);
    
    /**
     * Function that manage the direction
     * of the scroll
     */
    function offSetManager(){
    
        var yOffset = 0;
        var currYOffSet = window.pageYOffset;
    
        if(yOffset < currYOffSet) {
            myNavBar.add();
        }
        else if(currYOffSet == yOffset){
            myNavBar.remove();
        }
    
    }
    
    /**
     * bind to the document scroll detection
     */
    window.onscroll = function(e) {
        offSetManager();
    }
    
    /**
     * We have to do a first detectation of offset because the page
     * could be load with scroll down set.
     */
    offSetManager();
    });


    //carousel
    /*! Copyright (c) 2010 Brandon Aaron (http://brandonaaron.net)
* Licensed under the MIT License (LICENSE.txt).
*/
(function($) {
    // backgroundPosition[X,Y] get hooks
    var $div = $('<div style="background-position: 3px 5px">');
    $.support.backgroundPosition = $div.css('backgroundPosition') === "3px 5px" ? true : false;
    $.support.backgroundPositionXY = $div.css('backgroundPositionX') === "3px" ? true : false;
    $div = null;
    var xy = ["X","Y"];
    // helper function to parse out the X and Y values from backgroundPosition
    function parseBgPos(bgPos) {
    var parts = bgPos.split(/\s/),
    values = {
    "X": parts[0],
    "Y": parts[1]
    };
    return values;
    }
    if (!$.support.backgroundPosition && $.support.backgroundPositionXY) {
    $.cssHooks.backgroundPosition = {
    get: function( elem, computed, extra ) {
    return $.map(xy, function( l, i ) {
    return $.css(elem, "backgroundPosition" + l);
    }).join(" ");
    },
    set: function( elem, value ) {
    $.each(xy, function( i, l ) {
    var values = parseBgPos(value);
    elem.style[ "backgroundPosition" + l ] = values[ l ];
    });
    }
    };
    }
    if ($.support.backgroundPosition && !$.support.backgroundPositionXY) {
    $.each(xy, function( i, l ) {
    $.cssHooks[ "backgroundPosition" + l ] = {
    get: function( elem, computed, extra ) {
    var values = parseBgPos( $.css(elem, "backgroundPosition") );
    return values[ l ];
    },
    set: function( elem, value ) {
    var values = parseBgPos( $.css(elem, "backgroundPosition") ),
    isX = l === "X";
    elem.style.backgroundPosition = (isX ? value : values[ "X" ]) + " " +
    (isX ? values[ "Y" ] : value);
    }
    };
    $.fx.step[ "backgroundPosition" + l ] = function( fx ) {
    $.cssHooks[ "backgroundPosition" + l ].set( fx.elem, fx.now + fx.unit );
    };
    });
    }
    })(jQuery);
    $(document).ready(function () {
                var x = $('.carousel');
    
                var y = 0;
                var save = '';
                $('.item1').animate({left:'12%', opacity:"show"}, 600);
                $('.cimg1').css('left', '25%').animate({left:'50%', opacity:'show'}, 600, function() {
                    save = $('#img-container').html();
                });
    
                var int = self.setInterval(function () {
                    if( !x.is(':animated') ){
                        x.animate({backgroundPositionX: '+=50%' }, 2200);
                        if(y == 2){
                            y = 0;
                        }else{
                            y++;
                        }
                        switch(y){
                            case 0:
                                $('.ind3').removeClass('active');
                                $('.ind1').addClass('active');
                                $('.cimg3').animate({left:'54%'}, 100).animate({left:'38%', opacity:"hide"}, 600);
                                $('.item3').delay(600).animate({left:'16%'}, 100).animate({left:0, opacity:"hide"}, 600, function () {
                                    $('.cimg1').css('left', '62%').animate({left:'50%', opacity:"show"}, 800);
                                    $('.item1').css('left', '24%').delay(300).animate({left: '12%', opacity:"show"}, 800);
                                });
                                break;
                            case 1:
                                $('.ind1').removeClass('active');
                                $('.ind2').addClass('active');
                                $('.cimg1').animate({left:'64%'}, 100).animate({left:'48%', opacity:"hide"}, 600);
                                $('.item1').delay(600).animate({left:'16%'}, 100).animate({left:0, opacity:"hide"}, 600, function () {
                                    $('.cimg2').css('left', '62%').animate({left:'50%', opacity:"show"}, 800);
                                    $('.item2').css('left', '24%').delay(300).animate({left: '12%', opacity:"show"}, 800);
                                });
                                break;
                            case 2:
                                $('.ind2').removeClass('active');
                                $('.ind3').addClass('active');
                                $('.cimg2').animate({left:'64%'}, 100).animate({left:'48%', opacity:"hide"}, 600);
                                $('.item2').delay(600).animate({left:'16%'}, 100).animate({left:0, opacity:"hide"}, 600, function () {
                                    $('.cimg3').css('left', '62%').animate({left:'50%', opacity:"show"}, 800);
                                    $('.item3').css('left', '24%').delay(300).animate({left: '12%', opacity:"show"}, 800);
                                });
                                break;
                        }
                    }
                }, 9000);
    
                $('.carousel').hover(function () {
                    window.clearInterval(int);
                }, function() {
                    int = self.setInterval(function () {
                    if( !x.is(':animated') ){
                        x.animate({backgroundPositionX: '+=50%' }, 2200);
                        if(y == 2){
                            y = 0;
                        }else{
                            y++;
                        }
                        switch(y){
                            case 0:
                                $('.ind3').removeClass('active');
                                $('.ind1').addClass('active');
                                $('.cimg3').animate({left:'54%'}, 100).animate({left:'38%', opacity:"hide"}, 600);
                                $('.item3').delay(600).animate({left:'16%'}, 100).animate({left:0, opacity:"hide"}, 600, function () {
                                    $('.cimg1').css('left', '62%').animate({left:'50%', opacity:"show"}, 800);
                                    $('.item1').css('left', '24%').delay(300).animate({left: '12%', opacity:"show"}, 800);
                                });
                                break;
                            case 1:
                                $('.ind1').removeClass('active');
                                $('.ind2').addClass('active');
                                $('.cimg1').animate({left:'64%'}, 100).animate({left:'48%', opacity:"hide"}, 600);
                                $('.item1').delay(600).animate({left:'16%'}, 100).animate({left:0, opacity:"hide"}, 600, function () {
                                    $('.cimg2').css('left', '62%').animate({left:'50%', opacity:"show"}, 800);
                                    $('.item2').css('left', '24%').delay(300).animate({left: '12%', opacity:"show"}, 800);
                                });
                                break;
                            case 2:
                                $('.ind2').removeClass('active');
                                $('.ind3').addClass('active');
                                $('.cimg2').animate({left:'54%'}, 100).animate({left:'38%', opacity:"hide"}, 600);
                                $('.item2').delay(600).animate({left:'16%'}, 100).animate({left:0, opacity:"hide"}, 600, function () {
                                    $('.cimg3').css('left', '62%').animate({left:'50%', opacity:"show"}, 800);
                                    $('.item3').css('left', '24%').delay(300).animate({left: '12%', opacity:"show"}, 800);
                                });
                                break;
                        }
                    }
                }, 9000);
                });
    
    
                $('.left').click(function () {
                    if( !x.is(':animated') ){
                        x.animate({backgroundPositionX: '-=50%' }, 2200);
    
                        if(y == 0){
                            y = 2;
                        }else{
                            y--;
                        }
                        switch(y){
                            case 0:
                                $('.ind2').removeClass('active');
                                $('.ind1').addClass('active');
                                $('.cimg2').animate({left:'46%'}, 100).animate({left:'70%', opacity:"hide"}, 600);
                                $('.item2').delay(600).animate({left:'8%'}, 100).animate({left:'24%', opacity:"hide"}, 600, function () {
                                    $('.cimg1').css('left', '38%').animate({left:'50%', opacity:"show"}, 800);
                                    $('.item1').css('left', 0).delay(300).animate({left:'12%', opacity:"show"}, 800);
                                });
                                break;
                            case 1:
                                $('.ind3').removeClass('active');
                                $('.ind2').addClass('active');
                                $('.cimg3').animate({left:'46%'}, 100).animate({left:'70%', opacity:"hide"}, 600);
                                $('.item3').delay(600).animate({left:'8%'}, 100).animate({left:'24%', opacity:"hide"}, 600, function () {
                                    $('.cimg2').css('left', '38%').animate({left:'50%', opacity:"show"}, 800);
                                    $('.item2').css('left', 0).delay(300).animate({left:'12%', opacity:"show"}, 800);
                                });
                                break;
                            case 2:
                                $('.ind1').removeClass('active');
                                $('.ind3').addClass('active');
                                $('.cimg1').animate({left:'46%'}, 100).animate({left:'70%', opacity:"hide"}, 600);
                                $('.item1').delay(600).animate({left:'8%'}, 100).animate({left:'24%', opacity:"hide"}, 600, function () {
                                    $('.cimg3').css('left', '38%').animate({left:'50%', opacity:"show"}, 800);
                                    $('.item3').css('left', 0).delay(300).animate({left:'12%', opacity:"show"}, 800);
                                });
                                break;
                        }
                    }
                });
    
                $('.right').click(function () {
                    if( !x.is(':animated') ){
                        x.animate({backgroundPositionX: '+=50%' }, 2200);
                        if(y == 2){
                            y = 0;
                        }else{
                            y++;
                        }
                        switch(y){
                            case 0:
                                $('.ind3').removeClass('active');
                                $('.ind1').addClass('active');
                                $('.cimg3').animate({left:'54%'}, 100).animate({left:'38%', opacity:"hide"}, 600);
                                $('.item3').delay(600).animate({left:'16%'}, 100).animate({left:0, opacity:"hide"}, 600, function () {
                                    $('.cimg1').css('left', '62%').animate({left:'50%', opacity:"show"}, 800);
                                    $('.item1').css('left', '24%').delay(300).animate({left: '12%', opacity:"show"}, 800);
                                });
                                break;
                            case 1:
                                $('.ind1').removeClass('active');
                                $('.ind2').addClass('active');
                                $('.cimg1').animate({left:'54%'}, 100).animate({left:'38%', opacity:"hide"}, 600);
                                $('.item1').delay(600).animate({left:'16%'}, 100).animate({left:0, opacity:"hide"}, 600, function () {
                                    $('.cimg2').css('left', '62%').animate({left:'50%', opacity:"show"}, 800);
                                    $('.item2').css('left', '24%').delay(300).animate({left: '12%', opacity:"show"}, 800);
                                });
                                break;
                            case 2:
                                $('.ind2').removeClass('active');
                                $('.ind3').addClass('active');
                                $('.cimg2').animate({left:'54%'}, 100).animate({left:'38%', opacity:"hide"}, 600);
                                $('.item2').delay(600).animate({left:'16%'}, 100).animate({left:0, opacity:"hide"}, 600, function () {
                                    $('.cimg3').css('left', '62%').animate({left:'50%', opacity:"show"}, 800);
                                    $('.item3').css('left', '24%').delay(300).animate({left: '12%', opacity:"show"}, 800);
                                });
                                break;
                        }
                    }
                });
    
                $('.ind1').click(function() {
                    if( !x.is(':animated') ){
                        switch(y){
                            case 1:
                                x.animate({backgroundPositionX: '-=50%' }, 2200);
                                $('.ind2').removeClass('active');
                                $('.ind1').addClass('active');
                                $('.cimg2').animate({left:'46%'}, 100).animate({left:'62%', opacity:"hide"}, 600);
                                $('.item2').delay(600).animate({left:'8%'}, 100).animate({left:'24%', opacity:"hide"}, 600, function () {
                                    $('.cimg1').css('left', '38%').animate({left:'50%', opacity:"show"}, 800);
                                    $('.item1').css('left', '0%').delay(300).animate({left: '12%', opacity:"show"}, 800);
                                });
                                break;
                            case 2:
                                x.animate({backgroundPositionX: '-=100%' }, 2200);
                                $('.ind3').removeClass('active');
                                $('.ind1').addClass('active');
                                $('.cimg3').animate({left:'46%'}, 100).animate({left:'62%', opacity:"hide"}, 600);
                                $('.item3').delay(600).animate({left:'8%'}, 100).animate({left:'24%', opacity:"hide"}, 600, function () {
                                    $('.cimg1').css('left', '38%').animate({left:'50%', opacity:"show"}, 800);
                                    $('.item1').css('left', '0%').delay(300).animate({left: '12%', opacity:"show"}, 800);
                                });
                                break;
                        }
                        y = 0;
                    }
                });
    
                $('.ind2').click(function() {
                    if( !x.is(':animated') ){
                        switch(y){
                            case 0:
                                x.animate({backgroundPositionX: '+=50%' }, 2200);
                                $('.ind1').removeClass('active');
                                $('.ind2').addClass('active');
                                $('.cimg1').animate({left:'54%'}, 100).animate({left:'38%', opacity:"hide"}, 600);
                                $('.item1').delay(600).animate({left:'16%'}, 100).animate({left:0, opacity:"hide"}, 600, function () {
                                    $('.cimg2').css('left', '62%').animate({left:'50%', opacity:"show"}, 800);
                                    $('.item2').css('left', '24%').delay(300).animate({left: '12%', opacity:"show"}, 800);
                                });
                                break;
                            case 2:
                                x.animate({backgroundPositionX: '-=50%' }, 2200);
                                $('.ind3').removeClass('active');
                                $('.ind2').addClass('active');
                                $('.cimg3').animate({left:'46%'}, 100).animate({left:'66%', opacity:"hide"}, 600);
                                $('.item3').delay(600).animate({left:'16%'}, 100).animate({left:0, opacity:"hide"}, 600, function () {
                                    $('.cimg2').css('left', '62%').animate({left:'50%', opacity:"show"}, 800);
                                    $('.item2').css('left', '24%').delay(300).animate({left: '12%', opacity:"show"}, 800);
                                });
                                break;
                        }
                        y = 1;
                    }
                });
    
                $('.ind3').click(function() {
                    if( !x.is(':animated') ){
                        switch(y){
                            case 0:
                                x.animate({backgroundPositionX: '+=100%' }, 2200);
                                $('.ind1').removeClass('active');
                                $('.ind3').addClass('active');
                                $('.cimg1').animate({left:'54%'}, 100).animate({left:'38%', opacity:"hide"}, 600);
                                $('.item1').delay(600).animate({left:'16%'}, 100).animate({left:0, opacity:"hide"}, 600, function () {
                                    $('.cimg3').css('left', '62%').animate({left:'50%', opacity:"show"}, 800);
                                    $('.item3').css('left', '24%').delay(300).animate({left: '12%', opacity:"show"}, 800);
                                });
                                break;
                            case 1:
                                x.animate({backgroundPositionX: '+=50%' }, 2200);
                                $('.ind2').removeClass('active');
                                $('.ind3').addClass('active');
                                $('.cimg2').animate({left:'54%'}, 100).animate({left:'38%', opacity:"hide"}, 600);
                                $('.item2').delay(600).animate({left:'16%'}, 100).animate({left:0, opacity:"hide"}, 600, function () {
                                    $('.cimg3').css('left', '62%').animate({left:'50%', opacity:"show"}, 800);
                                    $('.item3').css('left', '24%').delay(300).animate({left: '12%', opacity:"show"}, 800);
                                });
                                break;
                        }
                        y = 2;
                    }
                });	
            
    });