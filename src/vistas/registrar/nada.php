<div class="modal fade" tabindex="-1" id="agregar-producto">
    <div class="modal-dialog modal-dialog-centered">
        <form method="post" action="<?php echo HTTP ?>/registrar/pedido/agregar-producto?<?php echo datos_url($datos); ?>" class="modal-content validar" novalidate>
        <div class="modal-header">
            <h5 class="modal-title">Agregar producto al pedido</h5>
        </div>
        <div class="modal-body">

			<?php

			if(isset($_GET['err'])){

				switch ($_GET['err']) {
					case 'producto':

						echo
						'<div class="alert alert-danger">
							Este producto no está registrado en el inventario.
						</div>'
						;
						break;

					case 'repetido':

						echo
						'<div class="alert alert-danger">
							Este producto ya se encuentra anexado en la factura.
						</div>'
						;
						break;

					case 'existencia':

						echo
						'<div class="alert alert-warning">
							Este producto no tiene las existencias suficientes. Restan <b>' . number_format( $_GET['errext'] ,0,',', ' ') . '</b> en el inventario.
						</div>'
						;
						break;


				}

			}

			?>

            <div>
                <div class="form-group">
                <label for="agregar-id">Selecciona un producto</label>
				<select name="codigo" required class="form-control" >
					<option value='' selected disabled>Selecciona un producto</option>
					<?php

					if($select_productos == null){

						echo '';
					}else{

						$cantidad_options = count($select_productos);

						for ($i=0; $i < $cantidad_options; $i++) {

							$nombre   = $select_productos[$i]['nombre'];
							$codigo   = $select_productos[$i]['codigo'];
							$selected = null;

							if(isset($_GET['datacodigo']) AND $_GET['datacodigo'] == $codigo){
								$selected = 'selected';
							}

							echo '
							<option '. $selected .' value="'. $codigo .'">'. $nombre .'</option>
							';

						}
					}

					?>
				</select>
				<div class="invalid-feedback">
				  Selecciona un producto.
				</div>
				<div class="valid-feedback">
				  ¡Perfecto!
				</div>
                </div>
                <div class="form-group">
                    <label required for="agregar-cantidad">Cantidad</label>
                    <input required type="number" class="form-control" name="cantidad" min="1" value="<?php
					if(isset($_GET['dataext'])){
						 echo $_GET['dataext'];

					 }else{
						 echo '1';
					 }?>">
					 <div class="invalid-feedback">
					   Ingrese una cantidad a comprar válida.
					 </div>
					 <div class="valid-feedback">
					   ¡Perfecto!
					 </div>
                </div>
                <div class="form-group">
                    <label for="agregar-cantidad">Precio de compra</label>
                    <input required type="number" class="form-control" step="0.01" name="costo" min="1" value="<?php
					if(isset($_GET['datacost'])){
						 echo number_format( $_GET['datacost'] ,2,'.', '');

					 }else{
						 echo '1';
					 }?>">
					 <div class="invalid-feedback">
					   Ingrese un precio de compra válido.
					 </div>
					 <div class="valid-feedback">
					   ¡Perfecto!
					 </div>
                </div>

				<div class="form-group form-check">
					<input type="checkbox" class="form-check-input" name="iva" <?php
					if(isset($_GET['dataiva']) AND $_GET['dataiva'] == 'on'){
						echo 'checked';
					 }?>>
				     <label class="form-check-label">IVA (12%) incluido.</label>
				</div>
				<small class="text-muted">El IVA es calculado automaticamente. Si el monto lo incluye se debe indicar, para que el mismo sea ignorado.</small>

            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Agregar</button>
        </div>
	</form>
    </div>
</div>