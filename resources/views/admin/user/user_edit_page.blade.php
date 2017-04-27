@extends('admin.layout.layout')
@section('content')
<div id="page-container">
    <div id="page-body">
        <h1 class="section-title title-usermange">使用者管理</h1>
        <div class="record-wrap clearfix">
            <div class="record-menu">
                <ul>
                    <li><a href="[! route('ad.school.list') !]" tittle="學校管理">學校管理</a></li>
                    <li><a href="[! route('ad.user.add.page') !]" title="新增使用者">新增使用者</a></li>
                    <li><a href="[! route('ad.user.import.page') !]" tittle="匯入使用者">匯入使用者</a></li>
                    <li><a class="active" href="[! route('ad.user.search.page') !]" title="查詢使用者資料">查詢使用者資料</a></li>
                </ul>
            </div>
            <div class="record-content">
                <form id="search-form">
                    <div class="title-feature">編輯使用者資料</div>
                    <div class="record-inner">
                        <div class="select-group">
                            <div class="label-title label-title-s">帳號</div>
                            <span class="user-account">[! $edit_data['user_id'] !]</span>
                        </div>
                        <div class="select-group">
                            <div class="label-title label-title-s">姓名</div>
                            <input class="select-input" type="text" id="uname" value="[! $edit_data['uname'] !]">
                        </div>
                        <div class="select-group">
                            <div class="label-title label-title-s"><span class="txt-red">*</span>性別</div>
                            <input class="select-radio" name="sex" type="radio" value="男" [! ($edit_data['uname'] == '男')?'checked':'' !]><span class="label-gender">男</span>
                            <input class="select-radio" name="sex" type="radio" value="女" [! ($edit_data['uname'] == '女')?'checked':'' !]><span class="label-gender">女</span>
                        </div>
                        <div class="select-group">
                            <div class="label-title label-title-s"><span class="txt-red">*</span>密碼(新)</div>
                            <input class="select-input" type="password" value="" id="pass">
                        </div>
                        <div class="select-group">
                            <div class="label-title label-title-s"><span class="txt-red">*</span>密碼確認</div>
                            <input class="select-input" type="password" value="" id="re_pass">
                        </div>
                        <div class="form-button-wrap mulitiple-button">
                            <input class="btn-yellow" type="submit" value="確認修改，送出" onclick="send()"/>
                            <input class="btn-green" type="submit" value="重新填寫" onclick="location.reload()" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
[! Html::script('js/jquery-1.11.3.js') !]
<script>
    //更新資料
    var isSend = false;
    function send()
    {
        var uname = $('#uname').val();
        var pass = $('#pass').val();
        var re_pass = $('#re_pass').val();
        var error_dsc = '';

        if( uname == '' )
        {
            error_dsc = error_dsc + '請輸入姓名\r\n';
        }
        if( pass == '' )
        {
            error_dsc = error_dsc + '請輸入新密碼\r\n';
        }else{
            if( pass != re_pass )
            {
                error_dsc = error_dsc + '密碼不一致\r\n';
            }
        }

        if(!isSend && error_dsc == '')
        {
            isSend = true;
            $.ajax({
                url: "[! route('ad.user.data.update') !]",
                type:'POST',
                data: {
                    _token: '[! csrf_token() !]',
                    uid: '[! uid !]',
                    uname: uname,
                    sex: sex,
                    pass: pass,
                },
                error: function(xhr) {
                    //alert('Ajax request 發生錯誤');
                },
                success: function(response) {
                    alert('資料更新成功!!');
                    location.reload();
                }
            });
        }

        if(error_dsc > '')
        {
            alert(error_dsc);
        }
    }
</script>
@stop