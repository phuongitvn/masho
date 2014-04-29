{{if $max==1}}
<select name="num">
<option>1</option>
</select>
{{elseif $max==2}}
<select name="num">
<option>1</option>
<option selected>2</option>
</select>
{{elseif $max==3}}
<select name="num">
<option>1</option>
<option>2</option>
<option selected>3</option>
</select>
{{elseif $max==4}}
<select name="num">
<option>1</option>
<option>2</option>
<option>3</option>
<option selected>4</option>
</select>
{{elseif $max==5}}
<select name="num">
<option>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
<option selected>5</option>
</select>
{{/if}}
