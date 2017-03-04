<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    [! Html::style('style/reset.css') !]
    [! Html::style('style/style.css') !]
    <script>
        window.onload = function (){
            var docHeight = document.body.offsetHeight,
                wrapHeight = docHeight - document.getElementById("header").offsetHeight;

            // 設定page-body元素高度
            document.getElementById("page-body").style.minHeight = wrapHeight + "px";
        }
    </script>
</head>
<body class="is-login">
<div id="header">
    <div class="header-top">
        <div id="header-logo"></div>
    </div>
    <div id="boad-wrap" class="boad-wrap">
        <div id="boad-nav">
            <a href="[! route('ad.index') !]" title="單元列表">單元列表</a>
            <a href="[! route('ad.subject.list') !]" title="科目列表">科目列表</a>
            <a href="[! route('mem.admin.list') !]" title="管理員列表">管理員列表</a>
            <a href="[! route('ad.school.list') !]" title="學校列表">學校列表</a>
            <a href="[! route('ad.logout') !]" title="登出系統">登出</a>
        </div>
        <div class="boad-detail-wrap">
            <p>管理員：<span class="txt-yellow">autotutor</span></p>
        </div>
        <div class="img-chalk"></div>
    </div>
</div>
<div id="page-container">
    <div id="page-body">
        <h1 class="section-title title-structure">單元結構編制</h1>
        <div class="section-content">
            [! Form::open(array('url'=>route($form_path),'id'=>'addForm', 'name'=>'addForm', 'files' => true)) !]
            [! Form::hidden('domain', 'addForm') !]

            <div class="select-group">
                    <div class="label-title">代理人類別</div>
                    <select name="module_type" id="module_type">
                        <option value="">請選擇代理人類別</option>
                        <option value="1">單代理人</option>
                        <option value="2">雙代理人</option>
                        <option value="3">多代理人</option>
                    </select>
                </div>
                <div class="select-group">
                    <div class="label-title">領域</div>
                    <select name="subject" id="subject">
                        <option value="">請選擇領域</option>
                        @foreach($subject_list as $key => $value)
                            <option value="[! $key !]">[! $value !]</option>
                        @endforeach
                    </select>
                </div>
                <div class="select-group">
                    <div class="label-title">冊別</div>
                    <select name="vol" id="vol">
                        <option value="">請選擇冊別</option>
                        @for($i=1;$i<19;$i++)
                            <option value="[! $i !]">[! $i !]</option>
                        @endfor
                    </select>
                </div>
                <div class="select-group">
                    <div class="label-title">適用年級</div>
                    <select name="grade" id="grade">
                        <option value="">請選擇適用年級</option>
                        @for($i=3;$i<17;$i++)
                            <option value="[! $i !]">[! $i !]</option>
                        @endfor
                    </select>
                </div>
                <div class="select-group">
                    <div class="label-title">單元</div>
                    <select name="unit" id="unit">
                        <option value="">請選擇單元</option>
                        @for($i=1;$i<100;$i++)
                            <option value="[! $i !]">[! $i !]</option>
                        @endfor
                    </select>
                </div>
                <div class="select-group">
                    <div class="label-title"><span class="txt-red">*</span>名稱</div>
                    <input class="select-input" type="text" name="title" id="title" value=""><span class="txt-red">(必填)</span>
                </div>
                <div class="select-group">
                    <div class="label-title">能力指標</div>
                    <select name="indicator_nums" id="indicator_nums">
                        <option value="">請選擇能力指標</option>
                        @for($i=1;$i<100;$i++)
                            <option value="[! $i !]">[! $i !]</option>
                        @endfor
                    </select>
                </div>
                <div class="select-group">
                    <div class="label-title"><span class="txt-red">*</span>示意圖</div>
                    <input class="select-input" type="file" name="img" id="img" accept="image/*"><span class="txt-red">(必填)</span>
                </div>
                <div class="form-button-wrap">
                    <input class="btn-yellow" type="button" onclick='history.back()' value="回上一頁" />
                    <input class="btn-yellow" type="submit"  value="輸入完畢，建立結構" />
                </div>
            [! Form::close() !]
        </div>
    </div>
</div>
[! Html::script('js/jquery-1.11.3.js') !]

<script>
</script>
</body>
</html>