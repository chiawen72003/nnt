@extends('admin.layout.layout')
@section('content')
<div id="page-container">
    <div id="page-body">
        <h1 class="section-title title-version">版本控管<div class="sub-title">本功能將規範「建立單元結構與試題帳號之權限」</div></h1>
        <div class="version-wrap">
            <form id="form-version">
                <div class="sarch-bg">
                    <h3 class="search-title">請選取班級及學生</h3>
                    <div class="select-group">
                        <span class="search-title">帳號</span>
                        <select name="select-account" id="select-account" class="select-s">
                            @foreach($all_teacher as $v)
                                <option value="[! $v['uid'] !]">[! $v['user_id'] !]【[! $all_level[$v['access_level']] !]】</option>
                            @endforeach
                        </select>
                        <input id="input-search" class="btn-yellow input-search" type="button" value="選擇完畢，送出">
                    </div>
                </div>
                <div class="version-inner clearfix">
                    <div class="unlock-unit-wrap">
                        <h1 class="change-title">無編輯權限之科目</h1>
                        <select name="unlock-version" id="unlock-version" class="multiple-select" size="12" multiple>
                            <option value="二階段【數學(單代理人)】">二階段【數學(單代理人)】</option>
                            <option value="二階段【自然】">二階段【自然】</option>
                            <option value="二階段【地理】">二階段【地理】</option>
                            <option value="二階段【理化】">二階段【理化】</option>
                            <option value="二階段【英文】">二階段【英文】</option>
                            <option value="二階段【英文】">二階段【英文】</option>
                            <option value="二階段【生物】">二階段【生物】</option>
                            <option value="二階段【微積分】">二階段【微積分】</option>
                            <option value="二階段【音樂】">二階段【音樂】</option>
                            <option value="二階段【日語】">二階段【日語】</option>
                            <option value="團指教材【理化】">團指教材【理化】</option>
                            <option value="團指教材【英文】">團指教材【英文】</option>
                        </select>
                    </div>
                    <div class="lock-button-wrap">
                        <input type="button" value="開放 →">
                        <input type="button" value="← 移除">
                    </div>
                    <div class="locked-unit-wrap">
                        <h1 class="change-title">有編輯權限之科目</h1>
                        <select name="locked-version" id="locked-version" class="multiple-select" size="12" multiple>
                            <option value="二階段【國語】">二階段【國語】</option>
                            <option value="團指教材【國語】">團指教材【國語】</option>
                            <option value="團指教材【數學(單代理人)】">團指教材【數學(單代理人)】</option>
                            <option value="團指教材【自然】">團指教材【自然】</option>
                            <option value="團指教材【地理】">團指教材【地理】</option>
                            <option value="睿耀【數學(單代理人)】">睿耀【數學(單代理人)】</option>
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
@stop