@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit User {{$user->name}}</div>

                <div class="card-body">
                    <form action="{{route('admin.users.update', $user->id)}}" method="post">
                        @csrf
                        {{method_field('PUT')}}
                        @foreach($roles as $role)
                            <div class="form-check">
                                <input type="checkbox" name="roles[]" value="{{$role->id}}"
                                @if($user->roles()->pluck('roles.id')->contains($role->id)) checked @endif
                                >
                                <label for="">{{$role->name}}</label>
                            </div>
                        @endforeach
                        <button class="btn btn-primary" type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection