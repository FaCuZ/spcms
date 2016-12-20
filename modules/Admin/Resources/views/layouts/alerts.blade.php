{{--	Alertas Posibles: "error", "alert", "info" y "good" 						--}}
{{-- 	Ejemplo: ->withErrors(['error' => 'Todo mal', 'good' => 'Todo bien']); 		--}}

@if($errors->has(''))

		@if($errors->first('error'))
			<div class="alert alert-danger alert-dismissible fade in">
				<button type="button" aria-hidden="true" class="close" data-dismiss="alert">	× </button>
				<strong><i class="fa-fw fa fa-times"></i> ¡Error!</strong>
					{{ $errors->first('error') }}
			</div>
		@endif

		@if($errors->first('alert'))
			<div class="alert alert-warning alert-dismissible fade in">
				<button type="button" aria-hidden="true" class="close" data-dismiss="alert"> × </button>
				<strong><i class="fa-fw fa fa-warning"></i> ¡Atención!</strong> 		
					{{ $errors->first('alert') }}
			</div>
		@endif

		@if($errors->first('info'))
			<div class="alert alert-info alert-dismissible fade in">
				<button type="button" aria-hidden="true" class="close" data-dismiss="alert"> × </button>
				<strong><i class="fa-fw fa fa-info"></i> Información</strong> 			
					{{ $errors->first('info') }}
			</div>
		@endif

		@if($errors->first('good'))
			<div class="alert alert-success alert-dismissible fade in">
				<button type="button" aria-hidden="true" class="close" data-dismiss="alert"> × </button>
				<strong><i class="fa-fw fa fa-check"></i> ¡Perfecto!</strong>	
					{{ $errors->first('good') }}
			</div>
		@endif

@endif
