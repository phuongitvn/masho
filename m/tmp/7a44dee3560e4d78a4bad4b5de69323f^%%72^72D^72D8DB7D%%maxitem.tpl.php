<?php /* Smarty version 2.6.26, created on 2013-11-13 23:20:30
         compiled from parts/maxitem.tpl */ ?>
<?php if ($this->_tpl_vars['max'] == 1): ?>
<select name="num">
<option>1</option>
</select>
<?php elseif ($this->_tpl_vars['max'] == 2): ?>
<select name="num">
<option>1</option>
<option>2</option>
</select>
<?php elseif ($this->_tpl_vars['max'] == 3): ?>
<select name="num">
<option>1</option>
<option>2</option>
<option>3</option>
</select>
<?php elseif ($this->_tpl_vars['max'] == 4): ?>
<select name="num">
<option>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
</select>
<?php elseif ($this->_tpl_vars['max'] == 5): ?>
<select name="num">
<option>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
<option>5</option>
</select>
<?php elseif ($this->_tpl_vars['max'] == 10): ?>
<select name="num">
<option>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
<option>5</option>
<option>10</option>
</select>
<?php elseif ($this->_tpl_vars['max'] == 25): ?>
<select name="num">
<option>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
<option>5</option>
<option>10</option>
<option>25</option>
</select>
<?php elseif ($this->_tpl_vars['max'] == 50): ?>
<select name="num">
<option>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
<option>5</option>
<option>10</option>
<option>25</option>
<option>50</option>
</select>
<?php endif; ?>