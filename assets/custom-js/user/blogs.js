$('#blog-search-keywords-btn').on('click', function() {
	get_all_blogs();	
});

$('#blog-search-remove-keywords-btn').on('click', function() {
	$('#blog-search-keywords').val('');
	get_all_blogs();	
});

$('#post-type, #post-sort-by').on('change', function() {
	get_all_blogs();
});

get_all_blogs();
function get_all_blogs() {
	$.ajax({
		type: "POST",
	  	url: base_url+"user/get-all-blogs",
	  	data:{
	  		verify_user_request : 1,
	  		search_keywords : $('#blog-search-keywords').val(),
      		post_type : $('#post-type').val(),
      		post_sort_by : $('#post-sort-by').val()
	  	},
	  	dataType: 'json', 
	  	success: function(data) {
	  		if(data.status == 1) {
	  			var html = '<div class="col-md-12 text-center mt-5">No Blogs Found</div>';
	  			if (data.all_blogs.length > 0) {
	  				html = '';
	  				var all_blogs = data.all_blogs;
	  				for (var i = 0; i < all_blogs.length; i++) {
	  					html += '<div class="col-md-6">';
               			html += '<div class="blog-bx">';
                  		html += '<div class="blog-bx-img">';
                     	html += '<img src="'+img_base_url+'assets/uploads/blog-thumbnail/'+all_blogs[i].blog_thumbnail_image+'">';
                  		html += '</div>';
                  		html += '<div class="blog-bx-cnt">';
                     	html += '<div class="blog-bx-txt">';
                     	var blogs_created_date_time = all_blogs[i].blog_created_date.split(' '),
	              			blogs_created_date = blogs_created_date_time[0].split('-');
                        html += '<span>'+blogs_created_date[2]+'-'+blogs_created_date[1]+'-'+blogs_created_date[0]+' '+blogs_created_date_time[1]+'</span>';
                        html += '<h3>'+all_blogs[i].blog_title+'</h3>';
                        html += '<p>'+$(all_blogs[i].blog_content).text().slice(0,100)+'</p>';
                        if (all_blogs[i].blog_link != '') {
                        	html += '<a target="_blank" href="'+all_blogs[i].blog_link+'">Read More</a>';
                        } else {
                        	html += '<a href="'+my_base_url+'blog-details/'+all_blogs[i].id+'">Read More</a>';
                        }
                     	html += '</div>';
                  		html += '</div>';
               			html += '</div>';
            			html += '</div>';
	  				}
	  			}

	  			$('#all-posts').html(html); 			
	  		} else {
	  			toastr.error('Something went wrong while getting your details. Please try again.');
	  		}
		}
	});
}