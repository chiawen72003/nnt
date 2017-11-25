@extends('admin.layout.layout')
@section('content')

    <div id="page-container">
        <div id="page-body">
            <h1 class="section-title title-buildnews">教學劇本設計路徑</h1>
            <div class="news-wrap">
                <form id="form-addnews">
                    <div class="links-wrap">
                        <a class="top-link" href="[! route('ad.script.ta.page') !]" >回上一頁</a>
                    </div>
                    <table class="table-manager">
                        <tr>
                            <th class="th-number">編號</th>
                            <th class="th-time"></th>
                            <th class="th-title">標題</th>
                            <th class="th-file">回應數量</th>
                            <th class="th-button">功能</th>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>閱讀文本</td>
                            <td>[! (isset($script_data['obj_1']))?$script_data['obj_1']:'0'!]</td>
                            <td>obj_1</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>主要問題</td>
                            <td>[! (isset($script_data['obj_2']))?$script_data['obj_2']:'0'!]</td>
                            <td>obj_2</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>學生作答1</td>
                            <td>[! (isset($script_data['obj_3']))?$script_data['obj_3']:'0'!]</td>
                            <td>obj_3</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>被誘導錯答</td>
                            <td>[! (isset($script_data['obj_4']))?$script_data['obj_4']:'0'!]</td>
                            <td>obj_4</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>不好的答案</td>
                            <td>[! (isset($script_data['obj_5']))?$script_data['obj_5']:'0'!]</td>
                            <td>obj_5</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>其他答案</td>
                            <td>[! (isset($script_data['obj_6']))?$script_data['obj_6']:'0'!]</td>
                            <td>obj_6</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>空白</td>
                            <td>[! (isset($script_data['obj_7']))?$script_data['obj_7']:'0'!]</td>
                            <td>obj_7</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>教師正向回饋</td>
                            <td>[! (isset($script_data['obj_8']))?$script_data['obj_8']:'0'!]</td>
                            <td>obj_8</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>後設認知的回饋</td>
                            <td>[! (isset($script_data['obj_9']))?$script_data['obj_9']:'0'!]</td>
                            <td>obj_9</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>教師中性回饋</td>
                            <td>[! (isset($script_data['obj_10']))?$script_data['obj_10']:'0'!]</td>
                            <td>obj_10</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>教師激發反應</td>
                            <td>[! (isset($script_data['obj_11']))?$script_data['obj_11']:'0'!]</td>
                            <td>obj_11</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>教師總結摘要</td>
                            <td>[! (isset($script_data['obj_12']))?$script_data['obj_12']:'0'!]</td>
                            <td>obj_12</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>符合預期答案</td>
                            <td>[! (isset($script_data['obj_13']))?$script_data['obj_13']:'0'!]</td>
                            <td>obj_13</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>總結對話</td>
                            <td>[! (isset($script_data['obj_14']))?$script_data['obj_14']:'0'!]</td>
                            <td>obj_14</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>提供線索</td>
                            <td>[! (isset($script_data['obj_15']))?$script_data['obj_15']:'0'!]</td>
                            <td>obj_15</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>對話結束</td>
                            <td>[! (isset($script_data['obj_16']))?$script_data['obj_16']:'0'!]</td>
                            <td>obj_16</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>學生回答2</td>
                            <td>[! (isset($script_data['obj_17']))?$script_data['obj_17']:'0'!]</td>
                            <td>obj_17</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>不好的答案</td>
                            <td>[! (isset($script_data['obj_18']))?$script_data['obj_18']:'0'!]</td>
                            <td>obj_18</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>其他答案</td>
                            <td>[! (isset($script_data['obj_19']))?$script_data['obj_19']:'0'!]</td>
                            <td>obj_19</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>正確答案</td>
                            <td>[! (isset($script_data['obj_20']))?$script_data['obj_20']:'0'!]</td>
                            <td>obj_20</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>教師正向回饋</td>
                            <td>[! (isset($script_data['obj_21']))?$script_data['obj_21']:'0'!]</td>
                            <td>obj_21</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>教師中性回饋</td>
                            <td>[! (isset($script_data['obj_22']))?$script_data['obj_22']:'0'!]</td>
                            <td>obj_22</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>教師激發反應</td>
                            <td>[! (isset($script_data['obj_23']))?$script_data['obj_23']:'0'!]</td>
                            <td>obj_23</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>教師明確提示</td>
                            <td>[! (isset($script_data['obj_24']))?$script_data['obj_24']:'0'!]</td>
                            <td>obj_24</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>學生回答3</td>
                            <td>[! (isset($script_data['obj_25']))?$script_data['obj_25']:'0'!]</td>
                            <td>obj_25</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>教師判定</td>
                            <td>[! (isset($script_data['obj_26']))?$script_data['obj_26']:'0'!]</td>
                            <td>obj_26</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>教師提供答案</td>
                            <td>[! (isset($script_data['obj_27']))?$script_data['obj_27']:'0'!]</td>
                            <td>obj_27</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>教師正向回饋</td>
                            <td>[! (isset($script_data['obj_28']))?$script_data['obj_28']:'0'!]</td>
                            <td>obj_28</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>教師正向回饋</td>
                            <td>[! (isset($script_data['obj_29']))?$script_data['obj_29']:'0'!]</td>
                            <td>obj_29</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>正確答案</td>
                            <td>[! (isset($script_data['obj_30']))?$script_data['obj_30']:'0'!]</td>
                            <td>obj_30</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>錯誤答案</td>
                            <td>[! (isset($script_data['obj_31']))?$script_data['obj_31']:'0'!]</td>
                            <td>obj_31</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>正確答案</td>
                            <td>[! (isset($script_data['obj_32']))?$script_data['obj_32']:'0'!]</td>
                            <td>obj_32</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>教師正向回饋</td>
                            <td>[! (isset($script_data['obj_33']))?$script_data['obj_33']:'0'!]</td>
                            <td>obj_33</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>教師提問</td>
                            <td>[! (isset($script_data['obj_34']))?$script_data['obj_34']:'0'!]</td>
                            <td>obj_34</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>學生回答2</td>
                            <td>[! (isset($script_data['obj_35']))?$script_data['obj_35']:'0'!]</td>
                            <td>obj_35</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>教師正向回饋</td>
                            <td>[! (isset($script_data['obj_36']))?$script_data['obj_36']:'0'!]</td>
                            <td>obj_36</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>教師總結</td>
                            <td>[! (isset($script_data['obj_37']))?$script_data['obj_37']:'0'!]</td>
                            <td>obj_37</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>對話結束</td>
                            <td>[! (isset($script_data['obj_38']))?$script_data['obj_38']:'0'!]</td>
                            <td>obj_38</td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
[! Html::script('js/jquery-1.11.3.js') !]
@stop