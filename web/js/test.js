$(function(){
	
	$('#modalButton2').click(function() {
		$('#modal_').modal('show')
		.find('#modalContent')
		.load($(this).attr('value'));	
		//alert('jjjjjj');
	});
	
});
