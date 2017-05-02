@extends('admin.layout.layout')
@section('content')
<div id="page-container">
    <div id="page-body">
        <h1 class="section-title title-version">版本控管<div class="sub-title">本功能將規範「建立單元結構與試題帳號之權限」</div></h1>
        <div class="version-wrap">
            <form id="form-version">
                <div class="sarch-bg">
                    <h3 class="search-title">帳號列表</h3>
                    <div class="select-group">
                        <span class="search-title">帳號</span>
                        <select id="user_id" class="select-s">
                            @foreach($all_teacher as $v)
                                <option value="[! $v['uid'] !]">[! $v['user_id'] !]【[! $all_level[$v['access_level']] !]】</option>
                            @endforeach
                        </select>
                        <input id="input-search" class="btn-yellow input-search" type="button" value="選擇完畢，送出" onclick="chgTableData()">
                    </div>
                </div>
                <div class="version-inner clearfix">
                    <div class="unlock-unit-wrap">
                        <h1 class="change-title">無編輯權限之科目</h1>
                        <select name="locked-version" id="locked-version" class="multiple-select" size="12" multiple>
                        </select>
                    </div>
                    <div class="lock-button-wrap">
                        <input type="button" value="開放 →" onclick="setUnlock()">
                        <input type="button" value="← 移除" onclick="setLock()">
                    </div>
                    <div class="locked-unit-wrap">
                        <h1 class="change-title">有編輯權限之科目</h1>
                        <select name="unlock-version" id="unlock-version" class="multiple-select" size="12" multiple>
                        </select>
                    </div>
                </div>
                <div class="form-button-wrap">
                    <input class="btn-yellow" type="submit" value="執行" />
                </div>
            </form>
        </div>
    </div>
</div>
[! Html::script('js/jquery-1.11.3.js') !]
<script>
    var now_user_id = '';

    //更換教師的科目資料
    function chgTableData()
    {
        $("#unlock-version option").remove();
        $("#locked-version option").remove();

        now_user_id = $('#user_id').val();
        $.ajax({
            url: "[! route('ad.subject.lock.unlock') !]",
            type:'POST',
            dataType: "json",
            data: {
                _token: '[! csrf_token() !]',
                user_id:$('#user_id').val(),
            },
            error: function(xhr) {
                //alert('Ajax request 發生錯誤');
            },
            success: function(response) {
                var unlock_data = [];
                //開放的科目資料
                for( var key in response['access_data'] )
                {

                    unlock_data.push(response['access_data'][key].toString());
                }
                //沒有開放的科目
                for( var key in response['subject_data'] )
                {
                    if(unlock_data.indexOf(key.toString()) != -1)
                    {
                        $("#unlock-version").append($("<option></option>").attr("value", key).text(response['subject_data'][key]));
                    }else{
                        $("#locked-version").append($("<option></option>").attr("value", key).text(response['subject_data'][key]));
                    }
                }
            }
        });
    }

    /**
     * 開放科目
     */
    function setUnlock()
    {
        var unlock = [];
        $('#locked-version :selected').each(function(i, selected){
            unlock[i] = $(selected).val();
        });
        if(unlock.length > 0)
        {
            $.ajax({
                url: "[! route('ad.subject.set.unlock') !]",
                type:'POST',
                data: {
                    _token: '[! csrf_token() !]',
                    user_id: now_user_id,
                    unlock:unlock,
                },
                error: function(xhr) {
                    //alert('Ajax request 發生錯誤');
                },
                success: function(response) {
                    chgTableData();
                }
            });
        }
    }

    /**
     * 不開放科目
     */
    function setLock()
    {
        var lock = [];
        $('#unlock-version :selected').each(function(i, selected){
            lock[i] = $(selected).val();
        });
        if(lock.length > 0)
        {
            $.ajax({
                url: "[! route('ad.subject.set.lock') !]",
                type:'POST',
                data: {
                    _token: '[! csrf_token() !]',
                    user_id: now_user_id,
                    lock:lock,
                },
                error: function(xhr) {
                    //alert('Ajax request 發生錯誤');
                },
                success: function(response) {
                    chgTableData();
                }
            });
        }
    }
</script>
@stop