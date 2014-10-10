(function(){

	// 未登录
	$('#login').click(function(){
		$('#login-frame').show();
	});

	// 已登录
	$('#user').click(function(){
		location.href = '/user';
	});

	// 图表选择
	$('#chart-list').delegate('li', 'click', function(){
		location.href = '/chart?type=' + $(this).attr('data-type');
	});

})();