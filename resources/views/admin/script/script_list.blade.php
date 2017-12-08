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
                            <td>1</td>
                            <td></td>
                            <td>閱讀文本</td>
                            <td>[! (isset($script_data['obj_1']))?$script_data['obj_1']:'0'!]</td>
                            <td><a class="icon-action icon-edit" href="[! route('ad.script.review', array('uid'=>$uid,'item_key'=>'obj_1')) !]"></a></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td></td>
                            <td>主要問題</td>
                            <td>[! (isset($script_data['obj_2']))?$script_data['obj_2']:'0'!]</td>
                            <td><a class="icon-action icon-edit" href="[! route('ad.script.review', array('uid'=>$uid,'item_key'=>'obj_2')) !]"></a></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td></td>
                            <td>學生作答1</td>
                            <td>[! (isset($script_data['obj_3']))?$script_data['obj_3']:'0'!]</td>
                            <td><a class="icon-action icon-edit" href="[! route('ad.script.review', array('uid'=>$uid,'item_key'=>'obj_3')) !]"></a></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td></td>
                            <td>被誘導錯答</td>
                            <td>[! (isset($script_data['obj_4']))?$script_data['obj_4']:'0'!]</td>
                            <td><a class="icon-action icon-edit" href="[! route('ad.script.review', array('uid'=>$uid,'item_key'=>'obj_4')) !]"></a></td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td></td>
                            <td>不好的答案</td>
                            <td>[! (isset($script_data['obj_5']))?$script_data['obj_5']:'0'!]</td>
                            <td><a class="icon-action icon-edit" href="[! route('ad.script.review', array('uid'=>$uid,'item_key'=>'obj_5')) !]"></a></td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td></td>
                            <td>其他答案</td>
                            <td>[! (isset($script_data['obj_6']))?$script_data['obj_6']:'0'!]</td>
                            <td><a class="icon-action icon-edit" href="[! route('ad.script.review', array('uid'=>$uid,'item_key'=>'obj_6')) !]"></a></td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td></td>
                            <td>空白</td>
                            <td>[! (isset($script_data['obj_7']))?$script_data['obj_7']:'0'!]</td>
                            <td><a class="icon-action icon-edit" href="[! route('ad.script.review', array('uid'=>$uid,'item_key'=>'obj_7')) !]"></a></td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td></td>
                            <td>教師正向回饋</td>
                            <td>[! (isset($script_data['obj_8']))?$script_data['obj_8']:'0'!]</td>
                            <td><a class="icon-action icon-edit" href="[! route('ad.script.review', array('uid'=>$uid,'item_key'=>'obj_8')) !]"></a></td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td></td>
                            <td>後設認知的回饋</td>
                            <td>[! (isset($script_data['obj_9']))?$script_data['obj_9']:'0'!]</td>
                            <td><a class="icon-action icon-edit" href="[! route('ad.script.review', array('uid'=>$uid,'item_key'=>'obj_9')) !]"></a></td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td></td>
                            <td>教師中性回饋</td>
                            <td>[! (isset($script_data['obj_10']))?$script_data['obj_10']:'0'!]</td>
                            <td><a class="icon-action icon-edit" href="[! route('ad.script.review', array('uid'=>$uid,'item_key'=>'obj_10')) !]"></a></td>
                        </tr>
                        <tr>
                            <td>11</td>
                            <td></td>
                            <td>教師激發反應</td>
                            <td>[! (isset($script_data['obj_11']))?$script_data['obj_11']:'0'!]</td>
                            <td><a class="icon-action icon-edit" href="[! route('ad.script.review', array('uid'=>$uid,'item_key'=>'obj_11')) !]"></a></td>
                        </tr>
                        <tr>
                            <td>12</td>
                            <td></td>
                            <td>教師總結摘要</td>
                            <td>[! (isset($script_data['obj_12']))?$script_data['obj_12']:'0'!]</td>
                            <td><a class="icon-action icon-edit" href="[! route('ad.script.review', array('uid'=>$uid,'item_key'=>'obj_12')) !]"></a></td>
                        </tr>
                        <tr>
                            <td>13</td>
                            <td></td>
                            <td>符合預期答案</td>
                            <td>[! (isset($script_data['obj_13']))?$script_data['obj_13']:'0'!]</td>
                            <td><a class="icon-action icon-edit" href="[! route('ad.script.review', array('uid'=>$uid,'item_key'=>'obj_13')) !]"></a></td>
                        </tr>
                        <tr>
                            <td>14</td>
                            <td></td>
                            <td>總結對話</td>
                            <td>[! (isset($script_data['obj_14']))?$script_data['obj_14']:'0'!]</td>
                            <td><a class="icon-action icon-edit" href="[! route('ad.script.review', array('uid'=>$uid,'item_key'=>'obj_14')) !]"></a></td>
                        </tr>
                        <tr>
                            <td>15</td>
                            <td></td>
                            <td>提供線索</td>
                            <td>[! (isset($script_data['obj_15']))?$script_data['obj_15']:'0'!]</td>
                            <td><a class="icon-action icon-edit" href="[! route('ad.script.review', array('uid'=>$uid,'item_key'=>'obj_15')) !]"></a></td>
                        </tr>
                        <tr>
                            <td>16</td>
                            <td></td>
                            <td>對話結束</td>
                            <td>[! (isset($script_data['obj_16']))?$script_data['obj_16']:'0'!]</td>
                            <td><a class="icon-action icon-edit" href="[! route('ad.script.review', array('uid'=>$uid,'item_key'=>'obj_16')) !]"></a></td>
                        </tr>
                        <tr>
                            <td>17</td>
                            <td></td>
                            <td>學生回答2</td>
                            <td>[! (isset($script_data['obj_17']))?$script_data['obj_17']:'0'!]</td>
                            <td><a class="icon-action icon-edit" href="[! route('ad.script.review', array('uid'=>$uid,'item_key'=>'obj_17')) !]"></a></td>
                        </tr>
                        <tr>
                            <td>18</td>
                            <td></td>
                            <td>不好的答案</td>
                            <td>[! (isset($script_data['obj_18']))?$script_data['obj_18']:'0'!]</td>
                            <td><a class="icon-action icon-edit" href="[! route('ad.script.review', array('uid'=>$uid,'item_key'=>'obj_18')) !]"></a></td>
                        </tr>
                        <tr>
                            <td>19</td>
                            <td></td>
                            <td>其他答案</td>
                            <td>[! (isset($script_data['obj_19']))?$script_data['obj_19']:'0'!]</td>
                            <td><a class="icon-action icon-edit" href="[! route('ad.script.review', array('uid'=>$uid,'item_key'=>'obj_19')) !]"></a></td>
                        </tr>
                        <tr>
                            <td>20</td>
                            <td></td>
                            <td>正確答案</td>
                            <td>[! (isset($script_data['obj_20']))?$script_data['obj_20']:'0'!]</td>
                            <td><a class="icon-action icon-edit" href="[! route('ad.script.review', array('uid'=>$uid,'item_key'=>'obj_20')) !]"></a></td>
                        </tr>
                        <tr>
                            <td>21</td>
                            <td></td>
                            <td>教師正向回饋</td>
                            <td>[! (isset($script_data['obj_21']))?$script_data['obj_21']:'0'!]</td>
                            <td><a class="icon-action icon-edit" href="[! route('ad.script.review', array('uid'=>$uid,'item_key'=>'obj_21')) !]"></a></td>
                        </tr>
                        <tr>
                            <td>22</td>
                            <td></td>
                            <td>教師中性回饋</td>
                            <td>[! (isset($script_data['obj_22']))?$script_data['obj_22']:'0'!]</td>
                            <td><a class="icon-action icon-edit" href="[! route('ad.script.review', array('uid'=>$uid,'item_key'=>'obj_22')) !]"></a></td>
                        </tr>
                        <tr>
                            <td>23</td>
                            <td></td>
                            <td>教師激發反應</td>
                            <td>[! (isset($script_data['obj_23']))?$script_data['obj_23']:'0'!]</td>
                            <td><a class="icon-action icon-edit" href="[! route('ad.script.review', array('uid'=>$uid,'item_key'=>'obj_23')) !]"></a></td>
                        </tr>
                        <tr>
                            <td>24</td>
                            <td></td>
                            <td>教師明確提示</td>
                            <td>[! (isset($script_data['obj_24']))?$script_data['obj_24']:'0'!]</td>
                            <td><a class="icon-action icon-edit" href="[! route('ad.script.review', array('uid'=>$uid,'item_key'=>'obj_24')) !]"></a></td>
                        </tr>
                        <tr>
                            <td>25</td>
                            <td></td>
                            <td>學生回答3</td>
                            <td>[! (isset($script_data['obj_25']))?$script_data['obj_25']:'0'!]</td>
                            <td><a class="icon-action icon-edit" href="[! route('ad.script.review', array('uid'=>$uid,'item_key'=>'obj_25')) !]"></a></td>
                        </tr>
                        <tr>
                            <td>26</td>
                            <td></td>
                            <td>教師判定</td>
                            <td>[! (isset($script_data['obj_26']))?$script_data['obj_26']:'0'!]</td>
                            <td><a class="icon-action icon-edit" href="[! route('ad.script.review', array('uid'=>$uid,'item_key'=>'obj_26')) !]"></a></td>
                        </tr>
                        <tr>
                            <td>27</td>
                            <td></td>
                            <td>教師提供答案</td>
                            <td>[! (isset($script_data['obj_27']))?$script_data['obj_27']:'0'!]</td>
                            <td><a class="icon-action icon-edit" href="[! route('ad.script.review', array('uid'=>$uid,'item_key'=>'obj_27')) !]"></a></td>
                        </tr>
                        <tr>
                            <td>28</td>
                            <td></td>
                            <td>教師正向回饋</td>
                            <td>[! (isset($script_data['obj_28']))?$script_data['obj_28']:'0'!]</td>
                            <td><a class="icon-action icon-edit" href="[! route('ad.script.review', array('uid'=>$uid,'item_key'=>'obj_28')) !]"></a></td>
                        </tr>
                        <tr>
                            <td>29</td>
                            <td></td>
                            <td>教師正向回饋</td>
                            <td>[! (isset($script_data['obj_29']))?$script_data['obj_29']:'0'!]</td>
                            <td><a class="icon-action icon-edit" href="[! route('ad.script.review', array('uid'=>$uid,'item_key'=>'obj_29')) !]"></a></td>
                        </tr>
                        <tr>
                            <td>30</td>
                            <td></td>
                            <td>正確答案</td>
                            <td>[! (isset($script_data['obj_30']))?$script_data['obj_30']:'0'!]</td>
                            <td><a class="icon-action icon-edit" href="[! route('ad.script.review', array('uid'=>$uid,'item_key'=>'obj_30')) !]"></a></td>
                        </tr>
                        <tr>
                            <td>31</td>
                            <td></td>
                            <td>錯誤答案</td>
                            <td>[! (isset($script_data['obj_31']))?$script_data['obj_31']:'0'!]</td>
                            <td><a class="icon-action icon-edit" href="[! route('ad.script.review', array('uid'=>$uid,'item_key'=>'obj_31')) !]"></a></td>
                        </tr>
                        <tr>
                            <td>32</td>
                            <td></td>
                            <td>正確答案</td>
                            <td>[! (isset($script_data['obj_32']))?$script_data['obj_32']:'0'!]</td>
                            <td><a class="icon-action icon-edit" href="[! route('ad.script.review', array('uid'=>$uid,'item_key'=>'obj_32')) !]"></a></td>
                        </tr>
                        <tr>
                            <td>33</td>
                            <td></td>
                            <td>教師正向回饋</td>
                            <td>[! (isset($script_data['obj_33']))?$script_data['obj_33']:'0'!]</td>
                            <td><a class="icon-action icon-edit" href="[! route('ad.script.review', array('uid'=>$uid,'item_key'=>'obj_33')) !]"></a></td>
                        </tr>
                        <tr>
                            <td>34</td>
                            <td></td>
                            <td>教師提問</td>
                            <td>[! (isset($script_data['obj_34']))?$script_data['obj_34']:'0'!]</td>
                            <td><a class="icon-action icon-edit" href="[! route('ad.script.review', array('uid'=>$uid,'item_key'=>'obj_34')) !]"></a></td>
                        </tr>
                        <tr>
                            <td>35</td>
                            <td></td>
                            <td>學生回答2</td>
                            <td>[! (isset($script_data['obj_35']))?$script_data['obj_35']:'0'!]</td>
                            <td><a class="icon-action icon-edit" href="[! route('ad.script.review', array('uid'=>$uid,'item_key'=>'obj_35')) !]"></a></td>
                        </tr>
                        <tr>
                            <td>36</td>
                            <td></td>
                            <td>教師正向回饋</td>
                            <td>[! (isset($script_data['obj_36']))?$script_data['obj_36']:'0'!]</td>
                            <td><a class="icon-action icon-edit" href="[! route('ad.script.review', array('uid'=>$uid,'item_key'=>'obj_36')) !]"></a></td>
                        </tr>
                        <tr>
                            <td>37</td>
                            <td></td>
                            <td>教師總結</td>
                            <td>[! (isset($script_data['obj_37']))?$script_data['obj_37']:'0'!]</td>
                            <td><a class="icon-action icon-edit" href="[! route('ad.script.review', array('uid'=>$uid,'item_key'=>'obj_37')) !]"></a></td>
                        </tr>
                        <tr>
                            <td>38</td>
                            <td></td>
                            <td>對話結束</td>
                            <td>[! (isset($script_data['obj_38']))?$script_data['obj_38']:'0'!]</td>
                            <td><a class="icon-action icon-edit" href="[! route('ad.script.review', array('uid'=>$uid,'item_key'=>'obj_38')) !]"></a></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
[! Html::script('js/jquery-1.11.3.js') !]
@stop