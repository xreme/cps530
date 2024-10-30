$(document).ready(function(){
    var expandable = true
    var expandedImage = null
    var originalWidth = 0
    var originalHeight = 0

    $(".preview").click(function(){
        if (expandable){
            expandable = false
            expandedImage = $(this)
            $(this).css({
                "z-index": "3",
                "position": "absolute",
                "left": "50%",
                "top": "50%",
                "transform": "translate(-50%, -50%)"
            });
            originalWidth = $(this).width();
            originalHeight = $(this).height();
            if (originalWidth > originalHeight){
                var newWidth = $(window).width() * 0.9;
                var aspectRatio = originalHeight / originalWidth;
                var newHeight = newWidth * aspectRatio;
            }
            else{
                var newHeight = $(window).height() * 0.9;
                var aspectRatio = originalHeight / originalWidth;
                var newWidth = newHeight * aspectRatio;
            }
            $(this).animate({
                width: newWidth + 'px',
                height: newHeight + 'px'
            },'slow');

            $(".cover").css("visibility","visible")
            $(".close").css({
                "visibility": "visible"
            })
        }
    });
    $(".close").click(function(){
        expandedImage.animate({
            width: originalWidth,
            height: originalHeight
        },{
            complete: function(){
                expandedImage.css({
                    "z-index": "0",
                    "position": "static",
                    "left": "0",
                    "top": "0",
                    "transform": "none"
                });
                expandedImage = null
            }
        })
        $(".cover").css("visibility","hidden")
        $(".close").css({
            "visibility": "hidden"
        })
        expandable = true
    })
});