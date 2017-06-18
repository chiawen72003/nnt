<div class="answer-wrap">
	<div class="answer-form clearfix">
		<h1 class="section-title title-answer">算式輸入區</h1>
		<div class="answer-left-wrap">
			<div class="computation-time-wrap">
				<div class="computation-time-title">
					<span class="time-title-day">日</span><span class="time-title-hour">時</span>
				</div>
				<div class="computation-time-row">
					<input class="input-time" type="text" id="input_0" onclick="setIndex(0)">
					<input class="input-time" type="text" id="input_1" onclick="setIndex(1)">
					<input class="input-time" type="text" id="input_2" onclick="setIndex(2)">
					<input class="input-time" type="text" id="input_3" onclick="setIndex(3)">
					<input class="input-time" type="text" id="input_4" onclick="setIndex(4)">
					<input class="input-time" type="text" id="input_5" onclick="setIndex(5)">
					<input class="input-time" type="text" id="input_6" onclick="setIndex(6)">
				</div>
				<div class="computation-time-row">
					<span>x</span>
					<input class="input-time" type="text" id="input_7" onclick="setIndex(7)">
					<input class="input-time" type="text" id="input_8" onclick="setIndex(8)">
					<input class="input-time" type="text" id="input_9" onclick="setIndex(9)">
					<input class="input-time" type="text" id="input_10" onclick="setIndex(10)">
					<input class="input-time" type="text" id="input_11" onclick="setIndex(11)">
					<input class="input-time" type="text" id="input_12" onclick="setIndex(12)">
					<input class="input-time" type="text" id="input_13" onclick="setIndex(13)">
				</div>
				<div class="computation-line"></div>
				<div class="computation-time-row">
					<input class="input-time" type="text" id="input_14" onclick="setIndex(14)">
					<input class="input-time" type="text" id="input_15" onclick="setIndex(15)">
					<input class="input-time" type="text" id="input_16" onclick="setIndex(16)">
					<input class="input-time" type="text" id="input_17" onclick="setIndex(17)">
					<input class="input-time" type="text" id="input_18" onclick="setIndex(18)">
					<input class="input-time" type="text" id="input_19" onclick="setIndex(19)">
					<input class="input-time" type="text" id="input_20" onclick="setIndex(20)">
					<input class="input-time" type="text" id="input_21" onclick="setIndex(21)">
					<input class="input-time" type="text" id="input_22" onclick="setIndex(22)">
					<input class="input-time" type="text" id="input_23" onclick="setIndex(23)">
					<input class="input-time" type="text" id="input_24" onclick="setIndex(24)">
					<input class="input-time" type="text" id="input_25" onclick="setIndex(25)">
				</div>
				<div class="computation-time-row">
					<input class="input-time" type="text" id="input_26" onclick="setIndex(26)">
					<input class="input-time" type="text" id="input_27" onclick="setIndex(27)">
					<input class="input-time" type="text" id="input_28" onclick="setIndex(28)">
					<input class="input-time" type="text" id="input_29" onclick="setIndex(29)">
					<input class="input-time" type="text" id="input_30" onclick="setIndex(30)">
					<input class="input-time" type="text" id="input_31" onclick="setIndex(31)">
					<input class="input-time" type="text" id="input_32" onclick="setIndex(31)">
					<input class="input-time" type="text" id="input_33" onclick="setIndex(33)">
					<input class="input-time" type="text" id="input_34" onclick="setIndex(34)">
					<input class="input-time" type="text" id="input_35" onclick="setIndex(35)">
					<input class="input-time" type="text" id="input_36" onclick="setIndex(36)">
					<input class="input-time" type="text" id="input_37" onclick="setIndex(37)">
				</div>
				<div class="computation-time-button">
					<input class="input-time-button" type="button" value="換列" onclick="changeLine()">
					<input class="input-time-button" type="button" value="回上一列" onclick="backLine()">
					<input class="input-time-button" type="button" value="結束">
				</div>
			</div>
		</div>
		<div class="answer-right-wrap">
			<div class="label-group">
				<input type="radio" /><span>日-時</span>
			</div>
			<input class="input-compute" type="button" value="1" onclick="setValue('1')">
			<input class="input-compute" type="button" value="2" onclick="setValue('2')">
			<input class="input-compute" type="button" value="3" onclick="setValue('3')">
			<input class="input-compute" type="button" value="4" onclick="setValue('4')">
			<input class="input-compute" type="button" value="5" onclick="setValue('5')">
			<input class="input-compute" type="button" value="6" onclick="setValue('6')">
			<input class="input-compute" type="button" value="7" onclick="setValue('7')">
			<input class="input-compute" type="button" value="8" onclick="setValue('8')">
			<input class="input-compute" type="button" value="9" onclick="setValue('9')">
			<input class="input-compute" type="button" value="0" onclick="setValue('0')">
			<input class="input-compute" type="button" value="." onclick="setValue('.')">
			<input class="input-compute" type="button" value="Ø" onclick="setValue('Ø')">
			<input class="input-compute" type="button" value="←" onclick="unsetValue()">
			<div class="clear"></div>
			<input class="input-compute-lg" type="button" value="重新計算" onclick="resetAll()">
			<input class="input-compute-lg" type="button" value="確定" onclick="analysis()">
		</div>
	</div>
	<div class="answer-button-wrap">
		<input class="btn btn-green" type="button" value="送出" onclick="analysis()">
	</div>
</div>