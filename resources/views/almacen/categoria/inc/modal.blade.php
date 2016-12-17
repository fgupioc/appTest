<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal_delete_{{$categoria->id}}">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">x</span>
					<h4 class="modal-title">Eliminar</h4>
				</button>
			</div>
			<div class="modal-body">
				<p>Decea eliminar la categoria</p>
			</div>
			<div class="modal-footer">
				<a  href="{{route('categoriaDestroy',$categoria->id)}}" class="btn btn-primary">Aceptar</a>
				<button type="button" class="btn btn-defaut" data-dismiss="modal">Cancelar</button>
			</div>
		</div>
	</div>
	
</div>


