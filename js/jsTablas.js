function eliminarFilas(tabla){
	
	primeraFila = 1;
	var cantidadFilas = tabla.rows.length;

	for (var x=primeraFila; x<cantidadFilas; x++) {
   		tabla.deleteRow(primeraFila);
	}

}