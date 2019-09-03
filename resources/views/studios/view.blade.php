@extends('layouts.app', ['page' => __('Studios'), 'pageSlug' => 'studios'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">
                        {{ $studio->studio_name }}
                        @foreach($studio->RoleArray() as $role)
                            <div class="badge badge-dark">
                                {{ $role }}
                            </div>
                        @endforeach
                    </h1>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tbody>
                        <tr>
                            <th>Country</th>
                            <td>{{ $studio->country }}</td>
                            <th>State</th>
                            <td>{{ $studio->state }}</td>
                            <th>City</th>
                            <td>{{ $studio->city }}</td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>{{ $studio->street_address }}</td>
                            <th>Admin Email</th>
                            <td>{{ $studio->admin_email }}</td>
                            <th>Booking Email</th>
                            <td>{{ $studio->booking_email }}</td>
                        </tr>
                        </tbody>
                    </table>

                    <div class="accordion" id="studioAccordion">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h3 class="card-title" data-toggle="collapse"
                                    data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <a href="#">Projects</a>
                                </h3>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                 data-parent="#studioAccordion">
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Project</th>
                                            <th>Bands</th>
                                            <th>Tags</th>
                                            <th>Roles</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($studio->projects as $project)
                                            <td>
                                                <a href="{{ url('projects/view', $project->id) }}">{{ $project->project }}</a>
                                            </td>
                                            <td>
                                                @foreach($project->bands as $band)
                                                    <a href="{{ url('bands/view', $band->id) }}"
                                                       class="badge badge-dark">{{ $band->band_name }}</a>
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach($project->TagArray() as $tag)
                                                    <a href="{{ url('projects/bytag', $tag) }}"
                                                       class="badge badge-dark">{{ $tag }}</a>
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach($project->RoleArray() as $role)
                                                    <a href="{{ url('projects/byrole', $role) }}"
                                                       class="badge badge-dark">{{ $role }}</a>
                                                @endforeach
                                            </td>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                @if($studio->IsStudioAdmin())
                                    <div class="card-footer text-right">
                                        <a href="#" class="btn btn-sm btn-dark">Add Project</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h3 class="card-title" data-toggle="collapse"
                                    data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                    <a href="#">Bands</a>
                                </h3>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                 data-parent="#studioAccordion">
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Band</th>
                                            <th>Genres</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($studio->bands as $band)
                                            <tr>
                                                <td>
                                                    <a href="{{ url('bands/view', $band->id) }}">{{ $band->band_name }}</a>
                                                </td>
                                                <td>
                                                    @foreach($band->GenreArray() as $genre)
                                                        <a href="{{ url('bands/bygenre/', $genre) }}"
                                                           class="badge badge-dark">{{ $genre }}</a>
                                                    @endforeach
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                @if($studio->IsStudioAdmin())
                                    <div class="card-footer text-right">
                                        <a href="#" class="btn btn-sm btn-dark">Add Band</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <h3 class="card-title" data-toggle="collapse"
                                    data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                    <a href="#">Users</a>
                                </h3>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                 data-parent="#studioAccordion">
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>User</th>
                                            <th>Roles</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($studio->users as $user)
                                            <tr>
                                                <td>
                                                    {{ $user->name }}
                                                </td>
                                                <td>
                                                    @foreach(explode(',', $user->pivot->roles) as $role)
                                                        <a href="#" class="badge badge-dark">{{ $role }}</a>
                                                    @endforeach
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                @if($studio->IsStudioAdmin())
                                    <div class="card-footer text-right">
                                        <a href="#" class="btn btn-sm btn-dark">Add User</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
