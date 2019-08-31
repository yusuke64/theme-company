jQuery(function(){
	var loader = jQuery('.loader-wrap');

	//ページの読み込みが完了したらアニメーションを非表示
	jQuery(window).on('load',function(){
		loader.fadeOut();
	});

	//ページの読み込みが完了してなくても3秒後にアニメーションを非表示にする
	setTimeout(function(){
		// loader.fadeOut();
	},3000);
});