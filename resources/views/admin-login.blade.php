@extends('index_layout')

@section('title') Login admin
@endsection

@section('content')
    <div>
	<form action="{{ route('login.admin') }}" method="POST">
	    {{ csrf_field() }}
	    <input name="email" ng-model="email" type="text" placeholder="البريد الالكتروني"/><br/><br/>
	    <input name="password" ng-model="password" type="password" placeholder="كلمة المرور"/>
	    <button>دخول</button>
	</form>
    </div>
@endsection
