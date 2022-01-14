// console.log(`estamos dentro de inventario.js`)


document.addEventListener('DOMContentLoaded', () => {

	cargar_tabla()

	



})



let addProduct = document.getElementById('addProduct')
	
	addProduct.addEventListener('click', () => {


		limpieza_campos();

		$("#staticBackdrop").modal("show")
	})




let cerrarMProduct = document.getElementById('cerrarMProduct')
	
	cerrarMProduct.addEventListener('click', () => {
		$("#staticBackdrop").modal("hide")
	})

let cerrarMProductAct = document.getElementById('cerrarMProductAct')
	
	cerrarMProductAct.addEventListener('click', () => {
		$("#editarModalProducto").modal("hide")
	})


let registrarProduct = document.getElementById('registrarProduct')
	
	registrarProduct.addEventListener('submit', e => {

			e.preventDefault()


			let nombreProduct = document.getElementById('nombreProduct').value
			let StockProduct = document.getElementById('StockProduct').value
			let PrecioProduct = document.getElementById('PrecioProduct').value
			let categoriaProduct = document.getElementById('categoriaProduct').value


			axios.post('/admin/crear', {
		    
		    			nombreProduct: nombreProduct, 
		    			StockProduct: StockProduct, 
		    			PrecioProduct: PrecioProduct, 
		    			categoriaProduct: categoriaProduct 
		    
		  	})

		  .then(function (response) {

		  		// console.log(response.data)

		  		if ( response.data == 1 ) {

		  			Swal.fire({
							  icon: 'success',
							  title: 'Éxito',
							  text: 'Acción realizada Satisfactoriamente ',
							  confirmButtonText: 'Listo'

							}).then((result) => {
						  if (result.isConfirmed) {

						  		$("#staticBackdrop").modal("hide")
						    	cargar_tabla()
						  
						  } else  {
						   		$("#staticBackdrop").modal("hide")
						    	cargar_tabla()
						  }
						})

		  		}else {

		  			Swal.fire({
							  icon: 'error',
							  title: 'Fallo',
							  text: 'Acción realizada Fallidamente ',
							  confirmButtonText: 'Listo'

							})

		  		}
		    
		  
		  })

		  .catch(function (error) {
		    console.log(error);
		  });



			// console.log(`si envia`)

	})



const limpieza_campos = () => {

	let nombreProduct = document.getElementById('nombreProduct').value = ''
	let StockProduct = document.getElementById('StockProduct').value = ''
	let PrecioProduct = document.getElementById('PrecioProduct').value = ''
}


const cargar_tabla = () => {

	axios.get('/admin/listar')
	  .then(function (response) {

	  	const respuesta = response.data
	    // console.log(respuesta);


	    $('#tablaProduct').dataTable().fnClearTable();
		$('#tablaProduct').dataTable().fnDestroy();

	   	const tbody = document.getElementById('tbody')

	   	let options = "",i=1, categoria,estado;

	   	for (let resp of respuesta){

	   		if (resp['categoria'] == 1 ) {
	   			categoria = 'Almacén'
	   		}

	   		if (resp['estado'] == 1 ) {
	   			estado = 'Disponible'
	   		}else {
	   			estado = 'No Disponible'
	   		}
			
			options += ` <tr>
					        <th scope="row">${i}</th>
					        <td>${resp['nombre']}</td>
					        <td>${resp['stock']}</td>
					        <td>${resp['precio']}</td>
					        <td>${categoria}</td>
					        <td>${estado}</td>
					        <td><button class="btn btn-primary" id="btnEditar" onclick="editar_producto(${resp['id']})"><i class="fas fa-edit"></i></button></td>
					      </tr>`
			i++;
		}

		// tbody.insertAdjacentHTML('beforeend', options)
		tbody.insertAdjacentHTML('beforeend', options)

		$("#tablaProduct").DataTable();

	  })

	  .catch(function (error) {
	    // console.log(error);
	  })
	  .finally(function () {
	    // always executed
	  });


}



const editar_producto = id => {

	axios.post('/admin/edit', {
		    			id: id
		  	})

		  .then(function (response) {

		  		// console.log(response.data)

		  		let nombreProductEdit = document.getElementById('nombreProductEdit')
		  		let StockProductEdit = document.getElementById('StockProductEdit')
		  		let PrecioProductEdit = document.getElementById('PrecioProductEdit')
		  		let categoriaProductEdit = document.getElementById('categoriaProductEdit')
		  		let idProduct = document.getElementById('idProduct')

		  			nombreProductEdit.value = response.data.nombre
		  			StockProductEdit.value = response.data.stock
		  			PrecioProductEdit.value = response.data.precio
		  			categoriaProductEdit.value = response.data.categoria
		  			idProduct.value = id

		  			$("#editarModalProducto").modal("show")
		  
		  })

		  .catch(function (error) {
		    // console.log(error);
		  });
}



let actProduct = document.getElementById('actProduct')
	
	actProduct.addEventListener('submit', e => {

			e.preventDefault()


			let nombreProductEdit = document.getElementById('nombreProductEdit').value
		  	let StockProductEdit = document.getElementById('StockProductEdit').value
		  	let PrecioProductEdit = document.getElementById('PrecioProductEdit').value
		  	let categoriaProductEdit = document.getElementById('categoriaProductEdit').value
		  	let idProduct = document.getElementById('idProduct').value


			axios.post('/admin/editar', {
		    
		    			nombreProduct: nombreProductEdit, 
		    			StockProduct: StockProductEdit, 
		    			PrecioProduct: PrecioProductEdit, 
		    			categoriaProduct: categoriaProductEdit,
		    			idProduct: idProduct
		    
		  	})

		  .then(function (response) {

		  		console.log(response.data)

		  		if ( response.data == 1 ) {

		  			Swal.fire({
							  icon: 'success',
							  title: 'Éxito',
							  text: 'Acción realizada Satisfactoriamente ',
							  confirmButtonText: 'Listo'

							}).then((result) => {
						  if (result.isConfirmed) {

						  		$("#editarModalProducto").modal("hide")
						    	cargar_tabla()
						  
						  } else {
						   		$("#editarModalProducto").modal("hide")
						   		cargar_tabla()
						  }
						})

		  		}else {

		  			Swal.fire({
							  icon: 'error',
							  title: 'Fallo',
							  text: 'Acción realizada Fallidamente ',
							  confirmButtonText: 'Listo'

							})

		  		}
		    
		  
		  })

		  .catch(function (error) {
		    console.log(error);
		  });


	})





		



