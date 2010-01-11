<div class="calculator-inner">
	<input class="display" disabled="disabled" id="calc-display-<?php echo $this->id; ?>" value="0" size="28" maxlength="25">
	<div class="buttoncollection">
		<input type="button" class="button" class="button" value="exp" onclick="if (checkNum($('#calc-display-<?php echo $this->id; ?>').val())) { exp($('#calc-display-<?php echo $this->id; ?>')) }">
		<input type="button" class="button" value="7" onclick="addChar($('#calc-display-<?php echo $this->id; ?>'), '7')">
		<input type="button" class="button" value="8" onclick="addChar($('#calc-display-<?php echo $this->id; ?>'), '8')">
		<input type="button" class="button" value="9" onclick="addChar($('#calc-display-<?php echo $this->id; ?>'), '9')">
		<input type="button" class="button" value="/" onclick="addChar($('#calc-display-<?php echo $this->id; ?>'), '/')">
	</div>
	<div class="buttoncollection">
		<input type="button" class="button" value="ln" onclick="if (checkNum($('#calc-display-<?php echo $this->id; ?>').val())) { ln($('#calc-display-<?php echo $this->id; ?>')) }">
		<input type="button" class="button" value="4" onclick="addChar($('#calc-display-<?php echo $this->id; ?>'), '4')">
		<input type="button" class="button" value="5" onclick="addChar($('#calc-display-<?php echo $this->id; ?>'), '5')">
		<input type="button" class="button" value="6" onclick="addChar($('#calc-display-<?php echo $this->id; ?>'), '6')">
		<input type="button" class="button" value="*" onclick="addChar($('#calc-display-<?php echo $this->id; ?>'), '*')">
	</div>
	<div class="buttoncollection">
		<input type="button" class="button" value="sqrt" onclick="if (checkNum($('#calc-display-<?php echo $this->id; ?>').val())) { sqrt($('#calc-display-<?php echo $this->id; ?>')) }">
		<input type="button" class="button" value="1" onclick="addChar($('#calc-display-<?php echo $this->id; ?>'), '1')">
		<input type="button" class="button" value="2" onclick="addChar($('#calc-display-<?php echo $this->id; ?>'), '2')">
		<input type="button" class="button" value="3" onclick="addChar($('#calc-display-<?php echo $this->id; ?>'), '3')">
		<input type="button" class="button" value="-" onclick="addChar($('#calc-display-<?php echo $this->id; ?>'), '-')">
	</div>
	<div class="buttoncollection">
		<input type="button" class="button" value="sq" onclick="if (checkNum($('#calc-display-<?php echo $this->id; ?>').val())) { square($('#calc-display-<?php echo $this->id; ?>')) }">
		<input type="button" class="button" value="0" onclick="addChar($('#calc-display-<?php echo $this->id; ?>'), '0')">
		<input type="button" class="button" value="." onclick="addChar($('#calc-display-<?php echo $this->id; ?>'), '.')">
		<input type="button" class="button" value="+/-" onclick="changeSign($('#calc-display-<?php echo $this->id; ?>'))">
		<input type="button" class="button" value="+" onclick="addChar($('#calc-display-<?php echo $this->id; ?>'), '+')">
	</div>
	<div class="buttoncollection">
		<input type="button" class="button" value="(" onclick="addChar($('#calc-display-<?php echo $this->id; ?>'), '(')">
		<input type="button" class="button" value="cos" onclick="if (checkNum($('#calc-display-<?php echo $this->id; ?>').val())) { cos($('#calc-display-<?php echo $this->id; ?>')) }">
		<input type="button" class="button" value="sin" onclick="if (checkNum($('#calc-display-<?php echo $this->id; ?>').val())) { sin($('#calc-display-<?php echo $this->id; ?>')) }">
		<input type="button" class="button" value="tan" onclick="if (checkNum($('#calc-display-<?php echo $this->id; ?>').val())) { tan($('#calc-display-<?php echo $this->id; ?>')) }">
		<input type="button" class="button" value=")" onclick="addChar($('#calc-display-<?php echo $this->id; ?>'), ')')">
	</div>
	<div class="buttoncollection">
		<input type="button" class="button" value="clear" onclick="$('#calc-display-<?php echo $this->id; ?>').val(0) ">
		<input type="button" class="button" value="&larr;" onclick="deleteChar($('#calc-display-<?php echo $this->id; ?>'))">
		<input type="button" class="button" style="width:132px;" value="enter" name="enter" onclick="if (checkNum($('#calc-display-<?php echo $this->id; ?>').val())) { compute($('#calc-display-<?php echo $this->id; ?>')) }">
	</div>
</div>