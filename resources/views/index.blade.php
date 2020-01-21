@extends('app')

@section('content')
<div class="show-found-content">
	<div class="container">	
	
	<!-- DEPARTMENTS -->
		<div class="row">				
			<div class="col-md-12 text-center">
				<h1 style="margin-bottom: 25px;">Список работников и отделов</h1>
				<a href="/"><h3 style="margin-bottom: 25px;">Все отделы</h3></a>
			</div>	
				@foreach($departments as $department)
					<div class="col-md-12  text-center">
						<span style="color:#424242;margin-bottom: 25px;">Название: <a href="{{ url('index/'.$department->id) }}">{{ $department->name }}</a></span>							
						{{ $department->employes->count() }}
					</div>		
				@endforeach				
		</div>
	<!--END DEPARTMENTS -->

	<!-- SELECT -->
        <form action="" method="get" >
            <input type="hidden" name="search" value="{{ $filters['search'] }}">
				<div class="row">
					<div class="col-md-12 text-center" style="margin-top: 25px;">
						<div class="form-group">
							 <select class="form-control" id="exampleFormControlSelect1" name="perPage" onchange="this.form.submit()">
								<option value="10" {{ $filters['perPage'] == '10'? 'selected': '' }}}>10</option>
								<option value="25" {{ $filters['perPage'] == '25'? 'selected': '' }}>25</option>
								<option value="50" {{ $filters['perPage'] == '50'? 'selected': '' }}>50</option>
								<option value="100" {{ $filters['perPage'] == '100'? 'selected': '' }}>100</option>
							</select>
						</div>
					</div>           
                </div>           
        </form>
	<!--END SELECT -->	
	 			
	<!-- EMPLOYES -->		
			<div class="row">
				@if($worker->count())																
					@foreach($worker as $workers)								
						<div class="col-md-4 list-employes">	
							<p>Имя: {{ $workers->name }}</p>
							<p>Дата рождения: {{ $workers->birthday->format('Y/m/d') }}</p>
							<p>Должность: {{ $workers->position }}</p>
							<p>Отдел: {{ $workers->department->name  }}</p>
							
							@if($workers->type == 'rate')
								<p>Оплата за месяц: {{ $workers->PaymentString }}</p>
							@else
								<p>Оплата за месяц: {{ $workers->PaymentStr }}</p>
							@endif	
						</div>										
					@endforeach											
				@else
					<div class="col-12">
						<div class="alert alert-warning" role="alert">
							Нет работников!
						</div>
					</div>
				@endif
			</div>	
	<!--END EMPLOYES -->
	
	<!--LINKS -->
		<div class="d-flex justify-content-center" style="margin:40px 0 ">
            {!! $worker->appends([                
                'perPage' => $filters['perPage']				
             ])->links() !!}
        </div>
	<!--END LINKS -->
	
	</div>
</div>	
@endsection