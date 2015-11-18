# HTML Validator

### What is this?
This is a HTML validator detects duplicated id.
```html
<li id="list" class="list test">Invalid</li>
<li id="list">Invalid</li>
```
and
```html
<div id="invalid multi-id">
```
These HTML should be invalid for example.

### Why did I make this?
While I was using Selenium I realized that a duplicated id exists. I want to make sure whether the HTML is valid. So I made a logic to validate HTML.

I am going to implement this into PHPUnit test code.
