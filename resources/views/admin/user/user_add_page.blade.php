@extends('admin.layout.layout')
@section('content')<div id="page-container">
    <div id="page-body">
        <h1 class="section-title title-usermange">使用者管理</h1>
        <div class="record-wrap clearfix">
            <div class="record-menu">
                <ul>
                    <li><a href="#" tittle="學校管理">學校管理</a></li>
                    <li><a class="active" href="#" title="新增使用者">新增使用者</a></li>
                    <li><a href="#" tittle="匯入使用者">匯入使用者</a></li>
                    <li><a href="#" title="查詢使用者資料">查詢使用者資料</a></li>
                </ul>
            </div>
            <div class="record-content">
                <form id="addschool-form">
                    <div class="title-feature">新增使用者<span class="tip">有<span class="star">*</span>的欄位不可空白</span></div>
                    <div class="record-inner">
                        <div class="select-group">
                            <div class="label-title label-title-s"><span class="txt-red">*</span>帳號</div>
                            <input class="select-input" type="text" value="">
                        </div>
                        <div class="select-group">
                            <div class="label-title label-title-s"><span class="txt-red">*</span>密碼</div>
                            <input class="select-input" type="password" value="">
                        </div>
                        <div class="select-group">
                            <div class="label-title label-title-s"><span class="txt-red">*</span>密碼確認</div>
                            <input class="select-input" type="password" value="">
                        </div>
                        <div class="select-group">
                            <div class="label-title label-title-s">服務單位</div>
                            <select class="select-s">
                                @foreach($city_data as $k => $v)
                                    <option value="[! $k !]">[! $v !]</option>
                                @endforeach
                            </select>
                            <select class="select-s">
                                <option value="學校名稱">學校名稱</option>
                            </select>
                            <select class="select-s">
                                @for($x=1;$x<21;$x++)
                                   <option value="[! $x !]">[! $x !]年級</option>
                                @endfor
                            </select>
                            <select class="select-s">
                                @for($x=1;$x<21;$x++)
                                    <option value="[! $x !]">[! $x !]班級</option>
                                @endfor
                            </select>
                        </div>
                        <div class="select-group">
                            <div class="label-title label-title-s"><span class="txt-red">*</span>姓名</div>
                            <input class="select-input" type="text" value="">
                        </div>
                        <div class="select-group">
                            <div class="label-title label-title-s"><span class="txt-red">*</span>性別</div>
                            <input class="select-radio" name="gender" type="radio" value="male"><span class="label-gender">男</span>
                            <input class="select-radio" name="gender" type="radio" value="female"><span class="label-gender">女</span>
                        </div>
                        <div class="select-group">
                            <div class="label-title label-title-s">身份</div>
                            <select>
                                @foreach($all_level as $k => $v)
                                    <option value="[! $v['access_level'] !]">[! $v['access_title'] !]</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="select-group">
                            <div class="label-title label-title-s">生日</div>
                            <select class="select-s">
                                <option value="1950">1950</option>
                            </select>
                            <select class="select-s">
                                <option value="01">01</option>
                            </select>
                            <select class="select-s">
                                <option value="01">01</option>
                            </select>
                        </div>
                        <div class="select-group">
                            <div class="label-title label-title-s">身分證字號</div>
                            <input class="select-input" type="text" value="">
                        </div>
                        <div class="select-group">
                            <div class="label-title label-title-s">住所電話</div>
                            <input class="select-input" type="text" value="">
                        </div>
                        <div class="select-group">
                            <div class="label-title label-title-s">手機號碼</div>
                            <input class="select-input" type="text" value="">
                        </div>
                        <div class="select-group">
                            <div class="label-title label-title-s">居住地址</div>
                            <input class="select-input" type="text" value="">
                        </div>
                        <div class="select-group">
                            <div class="label-title label-title-s">電子信箱</div>
                            <input class="select-input" type="text" value="">
                        </div>
                        <div class="select-group">
                            <div class="label-title label-title-s">班系</div>
                            <input class="select-input" type="text" value="">
                        </div>
                        <div class="form-button-wrap">
                            <input class="btn-yellow" type="submit" value="新增帳號" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
</script>
@stop