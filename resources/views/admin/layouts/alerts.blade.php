{{--	Alertas Posibles: "error", "alert", "info" y "good" 						--}}
{{-- 	Ejemplo: ->withErrors(['error' => 'Todo mal', 'good' => 'Todo bien']); 		--}}

@if($errors->has())

		@if($errors->first('error'))
			<div class="alert alert-danger alert-dismissible fade in">
				<button type="button" aria-hidden="true" class="close" data-dismiss="alert">	× </button>
				<h4><i class="fa-fw fa fa-times"></i> ¡Error!</h4>
					{{ $errors->first('error') }}
			</div>
		@endif

		@if($errors->first('alert'))
			<div class="alert alert-warning alert-dismissible fade in">
				<button type="button" aria-hidden="true" class="close" data-dismiss="alert"> × </button>
				<h4><i class="fa-fw fa fa-warning"></i> ¡Atención!</h4> 		
					{{ $errors->first('alert') }}
			</div>
		@endif

		@if($errors->first('info'))
			<div class="alert alert-info alert-dismissible fade in">
				<button type="button" aria-hidden="true" class="close" data-dismiss="alert"> × </button>
				<h4><i class="fa-fw fa fa-info"></i> Información</h4> 			
					{{ $errors->first('info') }}
			</div>
		@endif

		@if($errors->first('good'))
			<div class="alert alert-success alert-dismissible fade in">
				<button type="button" aria-hidden="true" class="close" data-dismiss="alert"> × </button>
				<h4><i class="fa-fw fa fa-check"></i> ¡Perfecto!</h4>	
					{{ $errors->first('good') }}
			</div>
		@endif

@endif
