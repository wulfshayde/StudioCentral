@extends('layouts.app', ['page' => __('Studios'), 'pageSlug' => 'studios'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Studios You Work For</h4>
                </div>
                <div class="card-body">
                    @if($studios->count() > 0)
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Studio</th>
                                <th>Country</th>
                                <th>Projects</th>
                                <th>Bands</th>
                                <th>Roles</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($studios as $studio)
                                <tr>
                                    <td><a href="{{ url('studios/view', $studio->id) }}">{{ $studio->studio_name }}</a></td>
                                    <td>{{ $studio->country }}</td>
                                    <td>{{ $studio->projects->count() }}</td>
                                    <td>{{ $studio->bands->count() }}</td>
                                    <td>
                                        @foreach($studio->RoleArray() as $role)
                                            <a href="#" class="badge badge-info">{{ $role }}</a>
                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
