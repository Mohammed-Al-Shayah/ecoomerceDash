<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>reviews</title>
    <style>
        body {
  padding: 1em;
  background: #EEE;
}
    </style>
</head>
<body>
    <form role="form">
        <h3>Saving a file with pure JS!</h3>
        <p>Uses HTML5 W3C saveAs() function and the <a href="https://github.com/eligrey/FileSaver.js" target="_blank">FileSaver.js</a> polyfill for this.<br>
        I didn't think this was even possible without a server but the docs say it should work in IE 10+,  Sweet!</p>
        <div class="form-group">
          <label for="input-fileName">File name</label>
          <input type="text" class="form-control" id="input-fileName" value="textFile" placeholder="Enter file name">
        </div>
        <div class="form-group">
          <label for="textarea">Text</label>
          <textarea id="textarea" class="form-control" rows="10" placeholder="Enter text to save">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae iure ab voluptate sunt reiciendis, officia, aliquam temporibus. Quo laudantium quaerat ad, deleniti optio ex, dignissimos, ea accusamus placeat tempora minima!</textarea>
        </div>
        <button id="btn-save" type="submit" class="btn btn-primary">Save to file</button>
      </form>
</body>
</html>
<script>
    $("#btn-save").click( function() {
  event.preventDefault();
  var text = $("#textarea").val();
  var filename = $("#input-fileName").val()
  var blob = new Blob([text], {type: "text/plain;charset=utf-8"});
  saveAs(blob, filename+".txt");
});

</script>
