function editar(idprod, nome, preco, cor) {
	console.log(cor)
	//criar um form de edição
	let form = document.createElement('form')
	form.action = 'index.php?pag=index&acao=update'
	form.method = 'post'
	form.className = 'row'

	//criar um input para entrada do texto
	let inputNomeProduto = document.createElement('input')
	inputNomeProduto.type = 'text'
	inputNomeProduto.name = 'nome'
	inputNomeProduto.style = 'margin-right:10px'
	inputNomeProduto.className = 'col-4 form-control'
	inputNomeProduto.value = nome

	let inputPrecoProduto = document.createElement('input')
	inputPrecoProduto.type = 'text'
	inputPrecoProduto.name = 'preco'
	inputPrecoProduto.style = 'margin-right:10px'
	inputPrecoProduto.className = 'col-4 form-control '
	inputPrecoProduto.value = preco

	//criar um input hidden para guardar a cor produto
	let inputCor = document.createElement('input')
	inputCor.type = 'hidden'
	inputCor.name = 'cor'
	inputCor.value = cor

	//criar um input hidden para guardar o id da produto
	let inputId = document.createElement('input')
	inputId.type = 'hidden'
	inputId.name = 'idprod'
	inputId.value = idprod

	//criar um button para envio do form
	let button = document.createElement('button')
	button.type = 'submit'
	button.className = 'col-3 btn btn-info'
	button.innerHTML = 'Atualizar'


	//incluir inputNomeProduto no form
	form.appendChild(inputNomeProduto)
	//incluir inputPrecoProduto no form
	form.appendChild(inputPrecoProduto)
	//incluir inputCor no form
	form.appendChild(inputCor)
	//incluir inputId no form
	form.appendChild(inputId)

	//incluir button no form
	form.appendChild(button)

	//teste
	console.log(form)

	//selecionar a div tarefa
	let produto = document.getElementById('produto_' + idprod)

	//limpar o texto da tarefa para inclusão do form
	produto.innerHTML = ''

	//incluir form na página
	produto.insertBefore(form, produto[0])

	/*---------------------------------------------*/

}

function remover(idprod, idpreco) {
	location.href = './read.php?pag=read&acao=delete&idprod=' + idprod + '&idpreco=' + idpreco;
}
