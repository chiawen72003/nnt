@extends('admin.layout.layout')
@section('content')
<div id="page-container">
    <div id="page-body">
        <h1 class="section-title title-usermange">使用者管理</h1>
        <div class="record-wrap clearfix">
            <div class="record-menu">
                <ul>
                    <li><a class="active" href="#" tittle="學校管理">學校管理</a></li>
                    <li><a href="#" title="新增使用者">新增使用者</a></li>
                    <li><a href="#" tittle="匯入使用者">匯入使用者</a></li>
                    <li><a href="#" title="查詢使用者資料">查詢使用者資料</a></li>
                </ul>
            </div>
            <div class="record-content">
                <form id="addschool-form">
                    <div class="title-feature">新增學校</div>
                    <div class="record-inner">
                        <div class="select-group">
                            <div class="label-title label-title-s">縣市</div>
                            <select name="select-area" id="select-area">
                                <option value="新北市">新北市</option>
                            </select>
                        </div>
                        <div class="select-group">
                            <div class="label-title label-title-s">學校名稱</div>
                            <input class="select-input" name="input-school" type="text" value="縣立新莊國中">
                        </div>
                        <div class="form-button-wrap">
                            <input class="btn-yellow" type="submit" value="送出" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop