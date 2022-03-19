@extends('layouts.app')
@section('content')
<a href="/users/create" class="btn btn-md btn-success mb-3 float-right">Create</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @php
        $number = 1;
    @endphp
    @forelse($users['data'] as $user)
        <tr>
            <td>{{ $number++ }}</td>
            <td>{{ $user['firstName'] }}</td>
            <td>{{ $user['lastName'] }}</td>
            <td>
                <form method="POST" action="{{ 'users/'.$user['id'] }}">
                    @csrf
                    @method('DELETE')
                    
                    <a href="{{ 'users/'.$user['id'] }}" class="btn btn-sm btn-primary"><i class="fa fa-fw fa-edit"></i> Edit</a> 
                    <button type="submit" class="btn btn-sm btn-danger" onClick="return confirm('Are you sure to delete this user?');"><i class="fa fa-fw fa-trash"></i> Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="6" align="center">No Record(s) Found!</td></tr>
    @endforelse
    </tbody>
</table>
@endsection
