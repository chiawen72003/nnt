@extends('admin.layout.layout')
@section('content')

    <div id="page-container">
        <div id="page-body">
            <h1 class="section-title title-buildnews">教學劇本設計-提示</h1>
            <div class="news-wrap">
                <form id="form-addnews">
                    <div class="links-wrap">
                    </div>
                    <table class="table-manager">
                        <tr>
                            <th class="th-number">編號</th>
                            <th class="th-time"></th>
                            <th class="th-title">標題</th>
                            <th class="th-file">提示內容</th>
                            <th class="th-button">功能</th>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>閱讀文本</td>
                            <td>[! (isset($list_data['obj_1']))?$list_data['obj_1']:''!]</td>
                            <td><a class="icon-action icon-edit" href="[! route('ad.script.prompt.edit', array('item_key'=>'obj_1')) !]"></a></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>主要問題</td>
                            <td>[! (isset($list_data['obj_2']))?$list_data['obj_2']:''!]</td>
                            <td><a class="icon-action icon-edit" href="[! route('ad.script.prompt.edit', array('item_key'=>'obj_2')) !]"></a></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>學生作答1</td>
                            <td>[! (isset($list_data['obj_3']))?$list_data['obj_3']:''!]</td>
                            <td><a class="icon-action icon-edit" href="[! route('ad.script.prompt.edit', array('item_key'=>'obj_3')) !]"></a></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>被誘導錯答</td>
                            <td>[! (isset($list_data['obj_4']))?$list_data['obj_4']:''!]</td>
                            <td><a class="icon-action icon-edit" href="[! route('ad.script.prompt.edit', array('item_key'=>'obj_4')) !]"></a></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>不好的答案</td>
                            <td>[! (isset($list_data['obj_5']))?$list_data['obj_5']:''!]</td>
                            <td><a class="icon-action icon-edit" href="[! route('ad.script.prompt.edit', array('item_key'=>'obj_5')) !]"></a></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>其他答案</td>
                            <td>[! (isset($list_data['obj_6']))?$list_data['obj_6']:''!]</td>
                            <td><a class="icon-action icon-edit" href="[! route('ad.script.prompt.edit', array('item_key'=>'obj_6')) !]"></a></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>空白</td>
                            <td>[! (isset($list_data['obj_7']))?$list_data['obj_7']:''!]</td>
                            <td><a class="icon-action icon-edit" href="[! route('ad.script.prompt.edit', array('item_key'=>'obj_7')) !]"></a></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>教師正向回饋</td>
                            <td>[! (isset($list_data['obj_8']))?$list_data['obj_8']:''!]</td>
                            <td><a class="icon-action icon-edit" href="[! route('ad.script.prompt.edit', array('item_key'=>'obj_8')) !]"></a></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>後設認知的回饋</td>
                            <td>[! (isset($list_data['obj_9']))?$list_data['obj_9']:''!]</td>
                            <td><a class="icon-action icon-edit" href="[! route('ad.script.prompt.edit', array('item_key'=>'obj_9')) !]"></a></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>教師中性回饋</td>
                            <td>[! (isset($list_data['obj_10']))?$list_data['obj_10']:''!]</td>
                            <td><a class="icon-action icon-edit" href="[! route('ad.script.prompt.edit', array('item_key'=>'obj_10')) !]"></a></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>教師激發反應</td>
                            <td>[! (isset($list_data['obj_11']))?$list_data['obj_11']:''!]</td>
                            <td><a class="icon-action icon-edit" href="[! route('ad.script.prompt.edit', array('item_key'=>'obj_11')) !]"></a></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>教師總結摘要</td>
                            <td>[! (isset($list_data['obj_12']))?$list_data['obj_12']:''!]</td>
                            <td><a class="icon-action icon-edit" href="[! route('ad.script.prompt.edit', array('item_key'=>'obj_12')) !]"></a></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>符合預期答案</td>
                            <td>[! (isset($list_data['obj_13']))?$list_data['obj_13']:''!]</td>
                            <td><a class="icon-action icon-edit" href="[! route('ad.script.prompt.edit', array('item_key'=>'obj_13')) !]"></a></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>總結對話</td>
                            <td>[! (isset($list_data['obj_14']))?$list_data['obj_14']:''!]</td>
                            <td><a class="icon-action icon-edit" href="[! route('ad.script.prompt.edit', array('item_key'=>'obj_14')) !]"></a></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>提供線索</td>
                            <td>[! (isset($list_data['obj_15']))?$list_data['obj_15']:''!]</td>
                            <td><a class="icon-action icon-edit" href="[! route('ad.script.prompt.edit', array('item_key'=>'obj_15')) !]"></a></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>對話結束</td>
                            <td>[! (isset($list_data['obj_16']))?$list_data['obj_16']:''!]</td>
                            <td><a class="icon-action icon-edit" href="[! route('ad.script.prompt.edit', array('item_key'=>'obj_16')) !]"></a></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>學生回答2</td>
                            <td>[! (isset($list_data['obj_17']))?$list_data['obj_17']:''!]</td>
                            <td><a class="icon-action icon-edit" href="[! route('ad.script.prompt.edit', array('item_key'=>'obj_17')) !]"></a></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>不好的答案</td>
                            <td>[! (isset($list_data['obj_18']))?$list_data['obj_18']:''!]</td>
                            <td><a class="icon-action icon-edit" href="[! route('ad.script.prompt.edit', array('item_key'=>'obj_18')) !]"></a></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>其他答案</td>
                            <td>[! (isset($list_data['obj_19']))?$list_data['obj_19']:''!]</td>
                            <td><a class="icon-action icon-edit" href="[! route('ad.script.prompt.edit', array('item_key'=>'obj_19')) !]"></a></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>正確答案</td>
                            <td>[! (isset($list_data['obj_20']))?$list_data['obj_20']:''!]</td>
                            <td><a class="icon-action icon-edit" href="[! route('ad.script.prompt.edit', array('item_key'=>'obj_20')) !]"></a></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>教師正向回饋</td>
                            <td>[! (isset($list_data['obj_21']))?$list_data['obj_21']:''!]</td>
                            <td><a class="icon-action icon-edit" href="[! route('ad.script.prompt.edit', array('item_key'=>'obj_21')) !]"></a></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>教師中性回饋</td>
                            <td>[! (isset($list_data['obj_22']))?$list_data['obj_22']:''!]</td>
                            <td><a class="icon-action icon-edit" href="[! route('ad.script.prompt.edit', array('item_key'=>'obj_22')) !]"></a></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>教師激發反應</td>
                            <td>[! (isset($list_data['obj_23']))?$list_data['obj_23']:''!]</td>
                            <td><a class="icon-action icon-edit" href="[! route('ad.script.prompt.edit', array('item_key'=>'obj_23')) !]"></a></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>教師明確提示</td>
                            <td>[! (isset($list_data['obj_24']))?$list_data['obj_24']:''!]</td>
                            <td><a class="icon-action icon-edit" href="[! route('ad.script.prompt.edit', array('item_key'=>'obj_24')) !]"></a></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>學生回答3</td>
                            <td>[! (isset($list_data['obj_25']))?$list_data['obj_25']:''!]</td>
                            <td><a class="icon-action icon-edit" href="[! route('ad.script.prompt.edit', array('item_key'=>'obj_25')) !]"></a></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>教師判定</td>
                            <td>[! (isset($list_data['obj_26']))?$list_data['obj_26']:''!]</td>
                            <td><a class="icon-action icon-edit" href="[! route('ad.script.prompt.edit', array('item_key'=>'obj_26')) !]"></a></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>教師提供答案</td>
                            <td>[! (isset($list_data['obj_27']))?$list_data['obj_27']:''!]</td>
                            <td><a class="icon-action icon-edit" href="[! route('ad.script.prompt.edit', array('item_key'=>'obj_27')) !]"></a></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>教師正向回饋</td>
                            <td>[! (isset($list_data['obj_28']))?$list_data['obj_28']:''!]</td>
                            <td><a class="icon-action icon-edit" href="[! route('ad.script.prompt.edit', array('item_key'=>'obj_28')) !]"></a></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>教師正向回饋</td>
                            <td>[! (isset($list_data['obj_29']))?$list_data['obj_29']:''!]</td>
                            <td><a class="icon-action icon-edit" href="[! route('ad.script.prompt.edit', array('item_key'=>'obj_29')) !]"></a></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>正確答案</td>
                            <td>[! (isset($list_data['obj_30']))?$list_data['obj_30']:''!]</td>
                            <td><a class="icon-action icon-edit" href="[! route('ad.script.prompt.edit', array('item_key'=>'obj_30')) !]"></a></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>錯誤答案</td>
                            <td>[! (isset($list_data['obj_31']))?$list_data['obj_31']:''!]</td>
                            <td><a class="icon-action icon-edit" href="[! route('ad.script.prompt.edit', array('item_key'=>'obj_31')) !]"></a></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>正確答案</td>
                            <td>[! (isset($list_data['obj_32']))?$list_data['obj_32']:''!]</td>
                            <td><a class="icon-action icon-edit" href="[! route('ad.script.prompt.edit', array('item_key'=>'obj_32')) !]"></a></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>教師正向回饋</td>
                            <td>[! (isset($list_data['obj_33']))?$list_data['obj_33']:''!]</td>
                            <td><a class="icon-action icon-edit" href="[! route('ad.script.prompt.edit', array('item_key'=>'obj_33')) !]"></a></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>教師提問</td>
                            <td>[! (isset($list_data['obj_34']))?$list_data['obj_34']:''!]</td>
                            <td><a class="icon-action icon-edit" href="[! route('ad.script.prompt.edit', array('item_key'=>'obj_34')) !]"></a></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>學生回答2</td>
                            <td>[! (isset($list_data['obj_35']))?$list_data['obj_35']:''!]</td>
                            <td><a class="icon-action icon-edit" href="[! route('ad.script.prompt.edit', array('item_key'=>'obj_35')) !]"></a></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>教師正向回饋</td>
                            <td>[! (isset($list_data['obj_36']))?$list_data['obj_36']:''!]</td>
                            <td><a class="icon-action icon-edit" href="[! route('ad.script.prompt.edit', array('item_key'=>'obj_36')) !]"></a></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>教師總結</td>
                            <td>[! (isset($list_data['obj_37']))?$list_data['obj_37']:''!]</td>
                            <td><a class="icon-action icon-edit" href="[! route('ad.script.prompt.edit', array('item_key'=>'obj_37')) !]"></a></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>對話結束</td>
                            <td>[! (isset($list_data['obj_38']))?$list_data['obj_38']:''!]</td>
                            <td><a class="icon-action icon-edit" href="[! route('ad.script.prompt.edit', array('item_key'=>'obj_38')) !]"></a></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
[! Html::script('js/jquery-1.11.3.js') !]
<script>
   
</script>
@stop