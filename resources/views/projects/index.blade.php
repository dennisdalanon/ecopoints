@extends('layouts.app')
@section('title', 'Projects')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                	
				</div>
    <div class="panel-body">

	<h2>Projects</h2>
		<ul>
			@foreach( $projects as $project )
				<li>
					<a href="projects/{{strtolower($project->project_name)}}">{{$project->project_name}}</a>
				</li>
			@endforeach
		</ul>

		
	</div>
</div>
</div>
</div>
</div>
</div>
@endsection