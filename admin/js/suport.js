// JavaScript Document
function carregacliente(a,b,c){
	
	if(c=='edit'){
		document.getElementById('submit').value = 'EDITAR';
		document.getElementById('modalform').action = "perfil";
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