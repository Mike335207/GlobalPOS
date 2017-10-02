$(function(){
	$('#modalButton').click(function() {
		$('#modal_').modal('show')
		.find('#modalContent')
		.load($(this).attr('value'));	
	});
	
	//$('#modalButton2').click(function() {
	//	alert('ghgtjyhjyh222');	
	//});
	
	$('#modalButtonAttach').click(function() {
		alert('hfrejffjkrkh');	
	});
	
	$('#modal_').on('hidden.bs.modal', function () {
			location.href='/index.php?r=talimat%2Findex';
			//location.href=$('#path');
			//alert('ttt');
	})
	
	
	
	$('td').dblclick(function (e) {
		var id = $(this).closest('tr').data('id');
		var path = $(this).closest('tr').data('value') + id;
		if(e.target == this)
		{
			$('#modal_').modal('show')
			.find('#modalContent')
			//.load('/web/index.php?r=talimat%2Fview&id=' + id);
			.load(path);
		} 
						
	});
	
	
	$('.custom_button').click(function(){
		$('#modal_').modal('show')
		.find('#modalContent')
		.load($(this).attr('value'));

	});
	
	
	
	
	
	//$('#body').dblclick(function() {
	//	alert($(this).attr('value'));
	//});
	
	/*$('#wizardButton').click(function() {
		$('#modal').modal('show')
		.find('#modalContent');
	});*/
	
});
