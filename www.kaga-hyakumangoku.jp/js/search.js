$(function(){

	//SEARCH - ypro_search01
	$("#ypro_search01 #datepicker_checkin01").datepicker({
		dateFormat: 'yy/mm/dd',
		monthNames : ['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月'],
		monthNamesShort : ['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月'],
		dayNames : ['日曜日','月曜日','火曜日','水曜日','木曜日','金曜日','土曜日'],
		dayNamesMin : ['日','月','火','水','木','金','土'],
		minDate: 'today',
		nextText : 'next',
		prevText : 'prev',
		numberOfMonths : 2,
		maxDate: '+1y'
	});
	$("#ypro_search01 #datepicker_checkin01").datepicker().datepicker('setDate','today');
	$("#ypro_search01 #datepicker_checkout01").datepicker({
		dateFormat: 'yy/mm/dd',
		monthNames : ['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月'],
		monthNamesShort : ['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月'],
		dayNames : ['日曜日','月曜日','火曜日','水曜日','木曜日','金曜日','土曜日'],
		dayNamesMin : ['日','月','火','水','木','金','土'],
		minDate: 'today',
		nextText : 'next',
		prevText : 'prev',
		numberOfMonths : 2,
		maxDate: '+1y'
	});
	$("#ypro_search01 #datepicker_checkout01").datepicker().datepicker('setDate','today + 1');

	//dateString = dateString.replace(/\-/, "/");

	$("#ypro_search01").submit(function() {
		//チェックイン日付をGET
		var checkinDate = $('#ypro_search01 #datepicker_checkin01').val();
		//チェックアウト日付をGET
		var checkoutDate = $('#ypro_search01 #datepicker_checkout01').val();
		var newCheckinDate = new Date($('#ypro_search01 #datepicker_checkin01').val());
		var newCheckoutDate = new Date($('#ypro_search01 #datepicker_checkout01').val());

		if(checkinDate > checkoutDate){
			alert("チェックイン日はチェックアウト日より前に設定して下さい。");
			return false;
		}else{
			//チェックイン日を分解してhiddenタグにセット
			var arrCheckinDate = checkinDate.split("/");
			$("#ypro_search01 input[name='obj_year']").val( arrCheckinDate[0] );
			$("#ypro_search01 input[name='obj_month']").val( arrCheckinDate[1] );
			$("#ypro_search01 input[name='obj_day']").val( arrCheckinDate[2] );

			//日付の差分を取得
			var msDiff = newCheckoutDate.getTime() - newCheckinDate.getTime();
			var daysDiff = Math.floor(msDiff / (1000 * 60 * 60 *24));
			$("#ypro_search01 input[name='obj_stay_num']").val( daysDiff );

			return true;
		}
	});

	$('#ypro_search01 #datepicker_checkin01').change(function() {

		$('#ypro_search01 .label_checkin').hide();
		$('#ypro_search01 .label_checkout').hide();

		var checkinDate = $('#ypro_search01 #datepicker_checkin01').val();		//チェックイン日付をGET
		var checkoutDate = $('#ypro_search01 #datepicker_checkout01').val();		//チェックアウト日付をGET

		 //チェックイン日がチェックアウト日より後ろに設定された場合、1日後の日付をチェックアウト日として再設定
		if(checkinDate > checkoutDate){
			var newCheckuotDate = new Date(checkinDate);
			newCheckuotDate.setDate( newCheckuotDate.getDate() + 1 );
			newDate = [newCheckuotDate.getFullYear(), ("0" + (newCheckuotDate.getMonth() + 1)).slice(-2), ("0" + newCheckuotDate.getDate()).slice(-2)].join('/');
			$('#ypro_search01 #datepicker_checkout01').val(newDate);
		}
	});
	$('#ypro_search01 #datepicker_checkout01').change(function() {
		$('#ypro_search01 .label_checkout').hide();
	});

	$("#ypro_search01").submit(function(){
		var target = this;
		ga(function(tracker) {
			var linker = new window.gaplugins.Linker(tracker);
			target.action = linker.decorate(target.action);
		});
	});

});


//検索
function submitForm(el) {
	$(el).submit();
	return false;
}

//選択
function choiceForm(el,target) {
	return $(el).parents('.obj_search').find($(target));
}
