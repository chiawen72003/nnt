@extends('admin.layout.layout')
@section('content')	<div id="page-container">
    <div id="page-body">
        <h1 class="section-title title-unitlock">單元上鎖<div class="sub-title">本功能將把「該單元及其包含之試卷」上鎖</div></h1>
        <div class="unitlock-wrap">
            <form id="form-unit">
                <div class="unitlock-inner clearfix">
                    <div class="unlock-unit-wrap">
                        <h1 class="change-title">尚未上鎖之單元</h1>
                        <select name="unlock-version" id="unlock-version" class="multiple-select" size="12" multiple>
                        </select>
                    </div>
                    <div class="lock-button-wrap">
                        <input type="button" value="上鎖 →" onclick="setLock()">
                        <input type="button" value="← 開鎖" onclick="setUnlock()">
                    </div>
                    <div class="locked-unit-wrap">
                        <h1 class="change-title">已上鎖單元</h1>
                        <select name="locked-version" id="locked-version" class="multiple-select" size="12" multiple>
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
    var subject_data = [];
    @foreach($subject_data as $k => $v)
    subject_data.push({
        'id':'[! $k !]',
        'name':'[! $v !]',
    });
    @endforeach

    $( document ).ready(function() {
        getUnitData();
    });

    //取得所有單元的資料
    function getUnitData()
    {
        $("#unlock-version option").remove();
        $("#locked-version option").remove();

        $.ajax({
            url: "[! route('ad.unit.lock.data') !]",
            type:'POST',
            dataType: "json",
            data: {
                _token: '[! csrf_token() !]',
            },
            error: function(xhr) {
                //alert('Ajax request 發生錯誤');
            },
            success: function(response) {
                var total = response.length;
                for( var x=0;x<total;x++ )
                {
                    var text_dsc = '';
                    text_dsc = text_dsc + get_subject_name(response[x]['subject']);
                    if(response[x]['module_type'] == '1')
                    {
                        text_dsc = text_dsc + '(單代理人)';
                    }
                    if(response[x]['module_type'] == '2')
                    {
                        text_dsc = text_dsc + '(雙代理人)';
                    }
                    if(response[x]['module_type'] == '3')
                    {
                        text_dsc = text_dsc + '(多代理人)';
                    }
                    text_dsc = text_dsc + response[x]['vol'] +'冊';
                    text_dsc = text_dsc + response[x]['unit'] +'單元';
                    text_dsc = text_dsc + '【' + response[x]['title'] + '】';
                    if( response[x]['is_lock'] == 0)
                    {
                        $("#unlock-version").append($("<option></option>").attr("value", response[x]['id']).text(text_dsc));
                    }else{
                        $("#locked-version").append($("<option></option>").attr("value", response[x]['id']).text(text_dsc));
                    }
                }
            }
        });
    }

    //取得科目名稱
    function get_subject_name(subject_id)
    {
        var return_name = '';
        var subject_length = subject_data.length;
        for(var x=0;x<subject_length;x++)
        {
            if(subject_data[x]['id'] == subject_id)
            {
                return_name = subject_data[x]['name'];
            }
        }

        return return_name;
    }
    
    //上鎖
    function setLock()
    {
        var lock = [];
        $('#unlock-version :selected').each(function(i, selected){
            lock[i] = $(selected).val();
        });
        if(lock.length > 0)
        {
            $.ajax({
                url: "[! route('ad.unit.set.lock') !]",
                type:'POST',
                data: {
                    _token: '[! csrf_token() !]',
                    lock:lock,
                },
                error: function(xhr) {
                    //alert('Ajax request 發生錯誤');
                },
                success: function(response) {
                    location.reload();
                }
            });
        }
    }


    //解鎖
    function setUnlock()
    {
        var unlock = [];
        $('#locked-version :selected').each(function(i, selected){
            unlock[i] = $(selected).val();
        });
        if(unlock.length > 0)
        {
            $.ajax({
                url: "[! route('ad.unit.set.unlock') !]",
                type:'POST',
                data: {
                    _token: '[! csrf_token() !]',
                    unlock:unlock,
                },
                error: function(xhr) {
                    //alert('Ajax request 發生錯誤');
                },
                success: function(response) {
                    location.reload();
                }
            });
        }
    }
</script>
@stop