@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">新規作成カラム</div>
    <form action="{{ route('store')}}" method="POST" class="card-body">
        @csrf
        <div class="form-group">
            <textarea class="form-control" name="content" placeholder="ここにメモを入力" rows="3"></textarea>
        </div>
        @foreach($tags as $t)
        <div class="form-check form-check-inline mb-3">
            <input type="checkbox" class="form-check-input" name="tags[]" id="{{$t['id']}}" value="{{ $t['id']}}">
            <label for="{{ $t['id']}}" class="form-check-label">{{ $t['name']}}</label>
        </div>
        @endforeach
        <input type="text" class="form-control w-50 mb-3 mt-3" name="new_tag" placeholder="ここにタグをインサート"/>
        <button type="submit" class="btn btn-primary">保存</button>
    </form>
</div>
@endsection
