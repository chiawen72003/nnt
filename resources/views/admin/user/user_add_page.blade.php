@extends('admin.layout.layout')
@section('content')<div id="page-container">
    <div id="page-body">
        <h1 class="section-title title-usermange">使用者管理</h1>
        <div class="record-wrap clearfix">
            <div class="record-menu">
                <ul>
                    <li><a href="[! route('ad.school.list') !]" tittle="學校管理">學校管理</a></li>
                    <li><a class="active" href="[! route('ad.user.add.page') !]" title="新增使用者">新增使用者</a></li>
                    <li><a href="[! route('ad.user.import.page') !]" tittle="匯入使用者">匯入使用者</a></li>
                    <li><a href="[! route('ad.user.search.page') !]" title="查詢使用者資料">查詢使用者資料</a></li>
                </ul>
            </div>
            <div class="record-content">
                <form id="addschool-form">
                    <div class="title-feature">新增使用者<span class="tip">有<span class="star">*</span>的欄位不可空白</span></div>
                    <div class="record-inner">
                        <div class="select-group">
                            <div class="label-title label-title-s"><span class="txt-red">*</span>帳號</div>
                            <input class="select-input" type="text" id="user_id" value="">
                        </div>
                        <div class="select-group">
                            <div class="label-title label-title-s"><span class="txt-red">*</span>密碼</div>
                            <input class="select-input" type="password" id="pass" value="">
                        </div>
                        <div class="select-group">
                            <div class="label-title label-title-s"><span class="txt-red">*</span>密碼確認</div>
                            <input class="select-input" type="password" id="re_pass"  value="">
                        </div>
                        <div class="select-group">
                            <div class="label-title label-title-s">服務單位</div>
                            <select class="select-s" id="city_code" onchange="get_city_school()">
                                @foreach($city_data as $k => $v)
                                    <option value="[! $k !]">[! $v !]</option>
                                @endforeach
                            </select>
                            <select class="select-s" id="organization_id">
                            </select>
                            <select class="select-s" id="grade">
                                @for($x=1;$x<21;$x++)
                                   <option value="[! $x !]">[! $x !]年級</option>
                                @endfor
                            </select>
                            <select class="select-s" id="class">
                                @for($x=1;$x<21;$x++)
                                    <option value="[! $x !]">[! $x !]班級</option>
                                @endfor
                            </select>
                        </div>
                        <div class="select-group">
                            <div class="label-title label-title-s"><span class="txt-red">*</span>姓名</div>
                            <input class="select-input" type="text" value="" id="uname">
                        </div>
                        <div class="select-group">
                            <div class="label-title label-title-s"><span class="txt-red">*</span>性別</div>
                            <input class="select-radio" name="sex" type="radio" value="男" checked><span class="label-gender">男</span>
                            <input class="select-radio" name="sex" type="radio" value="女"><span class="label-gender">女</span>
                        </div>
                        <div class="select-group">
                            <div class="label-title label-title-s">身份</div>
                            <select id="access_level">
                                @foreach($all_level as $k => $v)
                                    <option value="[! $v['access_level'] !]">[! $v['access_title'] !]</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="select-group">
                            <div class="label-title label-title-s">生日</div>
                            <select class="select-s" id="birthday_y">
                                @for($x=1950;$x<2010;$x++)
                                    <option value="[! $x !]">[! $x !]</option>
                                @endfor
                            </select>
                            <select class="select-s" id="birthday_m">
                                @for($x=1;$x<13;$x++)
                                    <option value="[! str_pad($x,2,'0',STR_PAD_LEFT) !]">[! str_pad($x,2,'0',STR_PAD_LEFT) !]</option>
                                @endfor
                            </select>
                            <select class="select-s" id="birthday_d">
                                @for($x=1;$x<32;$x++)
                                    <option value="[! str_pad($x,2,'0',STR_PAD_LEFT) !]">[! str_pad($x,2,'0',STR_PAD_LEFT) !]</option>
                                @endfor
                            </select>
                        </div>
                        <div class="select-group">
                            <div class="label-title label-title-s">身分證字號</div>
                            <input class="select-input" type="text" value="" id="identity">
                        </div>
                        <div class="select-group">
                            <div class="label-title label-title-s">住所電話</div>
                            <input class="select-input" type="text" value="" id="tel">
                        </div>
                        <div class="select-group">
                            <div class="label-title label-title-s">手機號碼</div>
                            <input class="select-input" type="text" value="" id="mobil">
                        </div>
                        <div class="select-group">
                            <div class="label-title label-title-s">居住地址</div>
                            <input class="select-input" type="text" value="" id="address">
                        </div>
                        <div class="select-group">
                            <div class="label-title label-title-s">電子信箱</div>
                            <input class="select-input" type="text" value="" id="email">
                        </div>
                        <div class="select-group">
                            <div class="label-title label-title-s">班系</div>
                            <input class="select-input" type="text" value="" id="class_group">
                        </div>
                        <div class="form-button-wrap">
                            <input class="btn-yellow" type="button" value="新增帳號" onclick="send()" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
[! Html::script('js/jquery-1.11.3.js') !]
<script>
    var school_data = [];
    @foreach($all_school as $v)
        school_data.push(
        {
            'organization_id':'[! $v['organization_id'] !]',
            'name':'[! $v['name'] !]',
            'city_code':'[! $v['city_code'] !]',
        }
        );
    @endforeach

    $( document ).ready(function() {
        //重新設定學校資料
        get_city_school();
    });

    //上傳資料
    var is_Send = false;
    function send()
    {
        var check_result = true;
        var need_data = ['user_id','pass','uname'];
        for(var x=0;x<need_data.length;x++){
            if($('#'+need_data[x]).val() == '')
            {
                check_result = false;
            }
        }



        if(check_result)
        {
            if($('#pass').val() != $('#re_pass').val())
            {
                alert('密碼不一致!!');
            }else if(!is_Send)
            {
                is_Send = true;
                var birthday = $('#birthday_y').val() + '年' + $('#birthday_m').val() + '月' + $('#birthday_d').val() + '日';

                $.ajax({
                    url: "[! route('ad.user.add') !]",
                    type:'POST',
                    data: {
                        _token: '[! csrf_token() !]',
                        user_id:$('#user_id').val(),
                        pass:$('#pass').val(),
                        city_code:$('#city_code').val(),
                        organization_id:$('#organization_id').val(),
                        grade:$('#grade').val(),
                        class:$('#class').val(),
                        uname:$('#uname').val(),
                        sex:$('input[name="sex"]:checked').val(),
                        access_level:$('#access_level').val(),
                        birthday:birthday,
                        identity:$('#identity').val(),
                        tel:$('#tel').val(),
                        mobil:$('#mobil').val(),
                        address:$('#address').val(),
                        email:$('#email').val(),
                        class_group:$('#class_group').val(),
                    },
                    error: function(xhr) {
                        //alert('Ajax request 發生錯誤');
                    },
                    success: function(response) {
                        alert('使用者新增成功!!');
                        location.reload();
                    }
                });
            }
        }else{
            alert('請檢查必填欄位是否尚未填寫!!');
        }
    }

    /**
     * 回傳指定縣市的學校
     */
    function get_city_school()
    {
        $("#organization_id option").remove();
        var city_code_value = $('#city_code').val();
        var total_school_num =  school_data.length;
        for(var x=0;x < total_school_num;x++)
        {
            if(school_data[x]['city_code'] == city_code_value)
            {
                $("#organization_id").append($("<option></option>").attr("value", school_data[x]['organization_id']).text(school_data[x]['name']));
            }
        }
    }
</script>
@stop