
var empresas = {
	url: "includes/empresas.json",
	//listLocation: "nome",
	getValue: "nome",
	list: {
		match: {
			enabled: true
		},
		onClickEvent: function() {
			//alert("JSON na fita !");
		},
		onSelectItemEvent: function() {
			var dataempresa = $("#nome").getSelectedItemData();

			$("#sobrenome").val( dataempresa.sobrenome ).trigger("change");
			$("#email1").val( dataempresa.email1 ).trigger("change");
			$("#cnpj").val( dataempresa.cnpj ).trigger("change");
			
			$("#nome_fantasia").val( dataempresa.nomefantasia ).trigger("change");
			$("#razaosocial").val( dataempresa.razaosocial ).trigger("change");
			$("#endereco").val( dataempresa.endereco ).trigger("change");
			$("#cidade").val( dataempresa.cidade ).trigger("change");
			$("#bairro").val( dataempresa.bairro ).trigger("change");
			
			$("#uf").val( dataempresa.uf ).trigger("change");
			$("#cep").val( dataempresa.cep ).trigger("change");
			$("#complemento").val( dataempresa.complemento ).trigger("change");
			$("#tel1").val( dataempresa.tel1 ).trigger("change");
			$("#tel2").val( dataempresa.tel2 ).trigger("change");
			$("#email1").val( dataempresa.email1 ).trigger("change");
			$("#email2").val( dataempresa.email2 ).trigger("change");
		}
	}
};

$("#nome").easyAutocomplete(empresas);