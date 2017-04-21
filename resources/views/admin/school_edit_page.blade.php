@extends('admin.layout.layout')
@section('content')
<div id="page-container">
    <div id="page-body">
        <h1 class="section-title title-usermange">使用者管理</h1>
        <div class="record-wrap clearfix">
            <div class="record-menu">
                <ul>
                    <li><a class="active" href="[! route('ad.school.list') !]" tittle="學校管理">學校管理</a></li>
                    <li><a href="[! route('ad.user.add.page') !]" title="新增使用者">新增使用者</a></li>
                    <li><a href="[! route('ad.user.import.page') !]" tittle="匯入使用者">匯入使用者</a></li>
                    <li><a href="#" title="查詢使用者資料">查詢使用者資料</a></li>
                </ul>
            </div>
            <div class="record-content">
                <div class="title-feature">編輯學校</div>
                    <div class="record-inner">
                        <div class="select-group">
                            <div class="label-title label-title-s">縣市</div>
                            <select id="select-area">
                                @foreach($city_data as $k => $v)
                                    <option value="[! $k !]" [! ($school_data['city_code'] == $k)?'selected':''  !]>[! $v !]</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="select-group">
                            <div class="label-title label-title-s">學校名稱</div>
                            <input class="select-input" id="input-school" type="text" value="[! $school_data['name'] !]">
                        </div>
                        <div class="select-group">
                            <div class="label-title label-title-s">學校代碼</div>
                            <input class="select-input" id="organization_id" type="text" value="[! $school_data['organization_id'] !]">
                        </div>
                        <div class="form-button-wrap">
                            <input class="btn-yellow" type="button" value="送出" onclick="edit_unit()" />
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
[! Html::script('js/jquery-1.11.3.js') !]
<script>
    //修改一個學校
    function edit_unit() {
        $.ajax({
            url: "[! route('ad.school.update') !]",
            type: 'POST',
            data: {
                _token: '[! csrf_token() !]',
                id: '[! $school_data["id"] !]',
                city_code: $('#select-area').val(),
                name: $('#input-school').val(),
                organization_id: $('#organization_id').val(),
            },
            success: function (data) {
                alert('更新學校成功!!');
                history.back();
            }
        });
    }
</script>
@stop