$(function(){
		//back-to-topを消す
		$('#back-to-top').hide();

		//スクロールが十分されたback-to-topを表示 スクロールが戻ったらまた非表示。
		$(window).scroll(function(){
			$(this).scrollTop();
			if($(this).scrollTop() > 60){
				$('#back-to-top').fadeIn();
			} else {
				$('#back-to-top').fadeOut();
			}
		});
		//back-to-topがクリックしたら↑に戻る
		$('#back-to-top').on('click',function(){
			$('body').animate({
				scrollTop:0
			},800);
			return false;
		});
	});