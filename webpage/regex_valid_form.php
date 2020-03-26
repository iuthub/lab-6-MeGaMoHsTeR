<?php

	$pattern="";
	$text="";
	$replaceText="";
	$replacedText="";
	$removedWhitespace="";
	$removedNonnumeric="";
	$removedNewlines="";
	$insideBrackets=[];

	$match="Not checked yet.";

if ($_SERVER["REQUEST_METHOD"]=="POST") {
	$pattern=$_POST["pattern"];
	$text=$_POST["text"];
	$replaceText=$_POST["replaceText"];
	$replacedText=preg_replace($pattern, $replaceText, $text);
	$removedWhitespace=preg_replace('/\s+/',"",$text);
	$removedNonnumeric=preg_replace('/[^0-9.,]/',"",$text);
	$removedNewlines=preg_replace('/[\n]+/'," ",$text);
	preg_match_all("/\[([\w\s]+)\]/", $text , $insideBrackets);
	if(preg_match($pattern, $text)) {
						$match="Match!";
					} else {
						$match="Does not match!";
					}
}?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Valid Form</title>
</head>
<body>
	<form action="regex_valid_form.php" method="post">
		<dl>

			<dt>Pattern</dt>
			<dd><input type="text" name="pattern" value="<?= $pattern ?>"></dd>

			<dt>Text</dt>
			<dd><input type="text" name="text" value="<?= $text ?>"></dd>

			<dt>Replace Text</dt>
			<dd><input type="text" name="replaceText" value="<?= $replaceText ?>"></dd>

			<dt>Output Text</dt>
			<dd><?=	$match ?></dd>

			<dt>Replaced Text</dt>
			<dd> <code><?=	$replacedText ?></code></dd>

			<dt>Removed Whitespace</dt>
			<dd><code><?php echo $removedWhitespace; ?></code></dd>

			<dt>Removed Non numeric characters</dt>
			<dd><code><?= $removedNonnumeric ?></code></dd>

			<dt>Removed newlines</dt>
			<dd><code><?= $removedNewlines ?></code></dd>

			<dt>Inside Brackets</dt>
			<dd><code><?php if(isset($insideBrackets[1][0])){echo $insideBrackets[1][0];} ?></code></dd>

			<dt>&nbsp;</dt>
			<dd><input type="submit" value="Check"></dd>

		</dl>
	</form>
</body>
</html>
