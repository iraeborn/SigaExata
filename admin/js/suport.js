
function carregacliente(a,b,c){
	
	if(c=='edit'){
		document.getElementById('submit').value = 'EDITAR';
		document.getElementById('modalform').action = 'user?id='+a;
		document.getElementById('registerbtn').value = 'editarcliente';
		document.getElementById('userMsg').innerHTML = 'Deseja editar o usuário <b>'+b+'?</b>';
		document.getElementById('userid').value = a;
		}else if(c=='del'){
		document.getElementById('submit').value = 'DELETAR';
		document.getElementById('modalform').action = 'code';
		document.getElementById('registerbtn').value = 'excluircliente';
		document.getElementById('userMsg').innerHTML = 'Deseja realmente excluir definitivamente o usuário <b>'+b+'?</b>';
		document.getElementById('userid').value = a;
		}
}

function enviaform(a){
	document.getElementById(a).submit();
}

$("input:checkbox:not(:checked)").each(function() {
    var column = "table ." + $(this).attr("name");
    $(column).hide();
});

$("input:checkbox").click(function(){
    var column = "table ." + $(this).attr("name");
    $(column).toggle();
});


$(document).ready(function(){
	
	$("#divsameadress").hide();
	$("#sameadress").click(function(){
		$("#divsameadress").toggle();
});
	
	$('#uploadImage').submit(function(event){
		if($('#uploadFile').val())
		{
			event.preventDefault();
			$('#loader-icon').show();
			$('#targetLayer').hide();
			$(this).ajaxSubmit({
				target: '#targetLayer',
				beforeSubmit:function(){
					$('.progress-bar').width('50%');
				},
				uploadProgress: function(event, position, total, percentageComplete)
				{
					$('.progress-bar').animate({
						width: percentageComplete + '%'
					}, {
						duration: 1000
					});
				},
				success:function(){
					
					$('#loader-icon').hide();
					$('#targetLayer').show();
					
					$('#targetold').hide();
					$('#upavatar').modal('hide');
				},
				resetForm: true
			});
		}
		return false;
	});
	
	var options = "<option value=''>escolha um estado</option>";	
	$("#uf").html(options);
	
	$.getJSON('includes/estados_cidades.json', function (data) {
		
				var items = [];
				
				$.each(data, function (key, val) {
					options += "<option value='" + val.nome + "'>" + val.nome + "</option>";
				});					
				
				//$("#uf").html(options);
				
				$("#uf").change(function () {				
				
					var options_cidades = "";
					var str = "";
					
					$("#uf option:selected").each(function () {
						str += $(this).text();
					});
					
					$.each(data, function (key, val) {
						if(val.nome == str) {							
							$.each(val.cidades, function (key_city, val_city) {
								options_cidades += '<option value="' + val_city + '">' + val_city + '</option>';
							});							
						}
					});
					$("#cidade").html(options_cidades);
					
				}).change();		
			
			});
		
	
});