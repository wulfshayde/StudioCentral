@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('content')
    <div class="row">
        @if($user->studios->count() > 0)
            <div class="col-lg-6 col-md-12">
                <div class="card ">
                    <div class="card-header">
                        <h4 class="card-title">Studios You Work For</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table tablesorter" id="">
                                <thead class=" text-primary">
                                <tr>
                                    <th>
                                        Studio
                                    </th>
                                    <th>
                                        Projects
                                    </th>
                                    <th>
                                        Bands
                                    </th>
                                    <th>
                                        Roles
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($user->studios as $studio)
                                    <tr>
                                        <td>
                                            <a href="{{ url('studios/view', $studio->id) }}">{{ $studio->studio_name }}</a>
                                        </td>
                                        <td>
                                            {{ $studio->projects->count() }}
                                        </td>
                                        <td>
                                            {{ $studio->bands->count() }}
                                        </td>
                                        <td>
                                            @foreach($studio->RoleArray() as $role)
                                                <a href="{{ url('studio/byrole', $role) }}"><span
                                                        class="badge badge-dark">{{ $role }}</span></a>
                                            @endforeach
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @if($user->bands->count() > 0)
            <div class="col-lg-6 col-md-12">
                <div class="card ">
                    <div class="card-header">
                        <h4 class="card-title">Bands You Play In</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table tablesorter" id="">
                                <thead class=" text-primary">
                                <tr>
                                    <th>
                                        Band
                                    </th>
                                    <th>
                                        Genres
                                    </th>
                                    <th>
                                        Roles
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($user->bands as $band)
                                    <tr>
                                        <td>
                                            <a href="{{ url('bands/view', $band->id) }}">{{ $band->band_name }}</a>
                                        </td>
                                        <td>
                                            @foreach($band->GenreArray() as $genre)
                                                <a href="{{ url('bands/bygenre', $genre) }}"><span
                                                        class="badge badge-dark">{{ $genre }}</span></a>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($band->RoleArray() as $role)
                                                <a href="{{ url('bands/byrole', $role) }}"><span
                                                        class="badge badge-dark">{{ $role }}</span></a>
                                            @endforeach
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <div class="row">
        @if($user->ProjectCount() > 0)
            <div class="col-lg-6 col-md-12">
                <div class="card ">
                    <div class="card-header">
                        <h4 class="card-title">Studio Projects</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table tablesorter" id="">
                                <thead class=" text-primary">
                                <tr>
                                    <th>
                                        Project
                                    </th>
                                    <th>
                                        Tags
                                    </th>
                                    <th>
                                        Roles
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($user->studios as $studio)
                                    @foreach($studio->projects as $project)
                                        <tr>
                                            <td>
                                                <a href="{{ url('projects/view', $project->id) }}">{{ $project->project }}</a>
                                            </td>
                                            <td>
                                                @foreach($project->TagArray() as $tag)
                                                    <a href="{{ url('projects/bytag', $tag) }}"><span
                                                            class="badge badge-dark">{{ $tag }}</span></a>
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach($project->RoleArray() as $role)
                                                    <a href="{{ url('projects/byrole', $role) }}"><span
                                                            class="badge badge-dark">{{ $role }}</span></a>
                                                @endforeach
                                            </td>
                                        </tr>
                                    @endforeach
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @if($user->SessionCount() > 0)
            <div class="col-lg-6 col-md-12">
                <div class="card ">
                    <div class="card-header">
                        <h4 class="card-title">Sessions</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table tablesorter" id="">
                                <thead class=" text-primary">
                                <tr>
                                    <th>
                                        Session
                                    </th>
                                    <th>
                                        Project
                                    </th>
                                    <th>
                                        Tags
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($studios as $studio)
                                    @foreach($studio->projects as $project)
                                        <tr>
                                            <td>
                                                <a href="{{ url('studios/view', $studio->id) }}">{{ $studio->studio_name }}</a>
                                            </td>
                                            <td>
                                                <a href="{{ url('projects/view', $project->id) }}">{{ $project->project }}</a>
                                            </td>
                                            <td>
                                                @foreach(explode(',', $project->tags) as $tag)
                                                    <a href="{{ url('projects/tag', $tag) }}"><span
                                                            class="badge badge-dark">{{ $tag }}</span></a>
                                                @endforeach
                                            </td>
                                        </tr>
                                    @endforeach
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
