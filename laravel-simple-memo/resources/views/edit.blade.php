@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">メモ編集
        <form action="{{ route('destroy')}}" method="POST">
            @csrf
            <input type="hidden" name="memo_id" value="{{ $edit_memo[0]['id'] }}">
            <button type="submit">削除</button>
        </form>
    </div>
    <form action="{{ route('update')}}" method="POST" class="card-body">
        @csrf
        <input type="hidden" name="memo_id" value="{{ $edit_memo[0]['id'] }}">
        <div class="form-group">
            <textarea class="form-control" name="content" placeholder="ここにメモを入力" rows="3">{{ $edit_memo[0]['content']}}</textarea>
        </div>
        @foreach($tags as $t)
        <div class="form-check form-check-inline mb-3">
            <input type="checkbox" class="form-check-input" name="tags[]" id="{{$t['id']}}" value="{{ $t['id']}}" {{in_array($t['id'], $include_tags) ? 'checked' : ''}}>
            <label for="{{ $t['id']}}" class="form-check-label">{{ $t['name']}}</label>
        </div>
        @endforeach
        <input type="text" class="form-control w-50 mb-3 mt-3" name="new_tag" placeholder="ここにタグをインサート"/>
        <button type="submit" class="btn btn-primary">更新</button>
    </form>
</div>
@endsection
