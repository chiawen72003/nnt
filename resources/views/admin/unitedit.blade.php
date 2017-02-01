<span>[! $title !]單元</span>
<table>
    <tr>
        <td>版本</td>
        <td>
            <select name="publisher_id" id="publisher_id">
                <option value="">==請選擇==</option>
                <option value="19">單代理人</option>
                <option value="20">雙代理人</option>
                <option value="21">多代理人</option>
            </select>
        </td>
    </tr>
    <tr>
        <td>領域</td>
        <td>
            <select name="subject_id" id="subject_id">
                <option value="">==請選擇==</option>
                @foreach($subject_list as $key => $value)
                    <option value="[! $key !]">[! $value !]</option>
                @endforeach
            </select>
        </td>
    </tr>
    <tr>
        <td>冊</td>
        <td>
            <select name="vol" id="vol">
                <option value="">==請選擇==</option>
                @for($i=1;$i<19;$i++)
                    <option value="[! $i !]">[! $i !]</option>
                @endfor
            </select>
        </td>
    </tr>
    <tr>
        <td>適用年級</td>
        <td>
            <select name="grade" id="grade">
                <option value="">==請選擇==</option>
                @for($i=3;$i<17;$i++)
                    <option value="[! $i !]">[! $i !]</option>
                @endfor
            </select>
        </td>
    </tr>
    <tr>
        <td>單元</td>
        <td>
        <select name="unit" id="unit">
            <option value="">==請選擇==</option>
            @for($i=1;$i<100;$i++)
                <option value="[! $i !]">[! $i !]</option>
            @endfor
        </select>
        </td>
    </tr>
    <tr>
        <td>名稱</td>
        <td>
            <input type="text" name="concept" id="concept" value="">
        </td>
    </tr>
    <tr>
        <td>能力指標</td>
        <td>
            <select name="indicator_nums" id="indicator_nums">
                <option value="">==請選擇==</option>
                @for($i=1;$i<100;$i++)
                    <option value="[! $i !]">[! $i !]</option>
                @endfor
            </select>
        </td>
    </tr>
    <tr>
        <td>
            <span><a href="#" onclick="structure_list()">回上一頁</a></span>
            <span><a href="#" onclick='[!isset($old_data)?'update("'.$old_data["cs_sn"].'")':'save()'!]'>存檔</a></span>
        </td>
        <td></td>
    </tr>
</table>
<script>
    $( document ).ready(function() {
       @if(isset($old_data))
            @foreach($old_data as $key => $value)
            $('#[! $key !]').val('[!$value!]');
            @endforeach
       @endif
    });

    function save() {
        $.ajax({
            url: "[! route('ad.unit.add.data') !]",
            type: 'POST',
            data: {
                _token: token,
                module_type: $('#module_type').val(),
                subject: $('#subject').val(),
                vol: $('#vol').val(),
                grade: $('#grade').val(),
                unit: $('#unit').val(),
                title: $('#title').val(),
                indicator_nums:  $('#indicator_nums').val(),
            },
            success: function (data) {
                console.log(data);
                //structure_list();
            }
        });
    }

    function update(getID) {
        $.ajax({
            url: "[! route('ad.unit.update.data') !]",
            type: 'POST',
            data: {
                _token: token,
                cs_sn: getID,
                module_type: $('#module_type').val(),
                subject: $('#subject').val(),
                vol: $('#vol').val(),
                grade: $('#grade').val(),
                unit: $('#unit').val(),
                title: $('#title').val(),
                indicator_nums:  $('#indicator_nums').val(),
            },
            success: function (data) {
                //console.log(data);
                structure_list();
            }
        });
    }
</script>