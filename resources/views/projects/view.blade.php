@extends('layouts.app', ['page' => __('Project'), 'pageSlug' => 'projects'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Project : {{ $project->project }}</h4>
                </div>
                <div class="card-body">
                </div>
            </div>
        </div>
    </div>
@endsection
