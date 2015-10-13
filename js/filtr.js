$('#btn-submit').click(function(event){
	var tagsCheckboxes = $('.chkbx-tags').toArray();
	var categoryCheckboxes = $('.chkbx-category').toArray();

	var formData = {
		ch_cats: [],
		ch_tags: [],
		query: $('#filtr_post').val()
	};

	categoryCheckboxes.forEach(function(item){
		if(item.checked) formData.ch_cats.push(item.id);
	});

	tagsCheckboxes.forEach(function(item){
		if(item.checked) formData.ch_tags.push(item.id);
	});

	$.ajax({
		url: window.location.href = "../News/search",
		type: 'POST',
		data: formData,
		contentType: 'application/x-www-form-urlencoded',
		success: onSuccess,
		error: onError
	});

	function onSuccess(result){
		$('#news-content').html(result);
	};
	function onError(result){
		$('#news-content').html(result);
	};
})