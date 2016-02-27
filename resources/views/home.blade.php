<html>

<p>{{ isset($shorturl) ? $shorturl : '' }}</p>

<form action="createShortLink" method="post">
<input type="url" id="url" name="url"></input>
<button type="submit">Submit</button>
</form>

</html>
