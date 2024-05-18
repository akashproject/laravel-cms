$(function() {
    "use strict";
    $('#searchMedia').on('keyup',function(){
        let keyword = $(this).val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: `${globalUrl}administrator/search-media`,
            type: "post",
            data: {
                keyword: keyword,
            },
            success: function(result) {
                $(".image-thumbnail-container").html(result); 
            }
        });
    });

});