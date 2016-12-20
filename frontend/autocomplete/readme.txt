Directory:
-autocomplete/
  -css/
    style.css
  -jsonfile/
    address.json
    address.min.json
  -scripts
    app.js
    jquery-1.8.2.min.js
    jquery-2.1.1.js
    jquery.autocomplete.js
    jquery.mockjax.js

  getjson.php
  index.html
  readme.txt

--------------------------------------------
- style.css: use to custom html style. This style use in index.html.
- address.json: is the fix json data that export from excel or other resource that format as json.
- address.min.json: is the fix json too but it is minify.
- app.js: user to get all json from any resource, just change url to the json resource we can get all json from it. In our example it request to getjson.php.
- jquery-1.8.2.min.js, jquery-2.1.1.js, jquery.autocomplete.js, jquery.mockjax.js: js library.
- getjson.php: it is the php code that use as an api to get all json data.
- index.html: html from that use for user interface.
-----------------------------------------------------

+ how to use

 - Import about js lib and css:
   <link href="css/styles.css" rel="stylesheet" />
   <script type="text/javascript" src="scripts/jquery-1.8.2.min.js"></script>
   <script type="text/javascript" src="scripts/jquery.mockjax.js"></script>
   <script type="text/javascript" src="scripts/jquery.autocomplete.js"></script>
   <script type="text/javascript" src="scripts/app.js"></script>

 - app.js change attribute:
  url: "URL",
  example: url: "http:localhost/getjson.php",

  *** JSON format should be like this:
  {
    1020101005: "1020101005,Banteay Meanchey,Mongkol Borei,Banteay Neang,O Thom,O Thom,Primary",
    1020101571: "1020101571,Banteay Meanchey,Mongkol Borei,Banteay Neang,O Thom,O Thom,Pre-school",
    1020103001: "1020103001,Banteay Meanchey,Mongkol Borei,Banteay Neang,Banteay Neang,Banteay Neang,Primary",
    1020103506: "1020103506,Banteay Meanchey,Mongkol Borei,Banteay Neang,Banteay Neang,Banteay Neang,Pre-school",
    1020105008: "1020105008,Banteay Meanchey,Mongkol Borei,Banteay Neang,Trang,Trang,Primary"
  }

 - HTML form (example: index.html)
  <input type="text" name="country" placeholder="Search" id="autocomplete-dynamic" style="width: 100%; border-width: 1px;"/>

  The most important is id of input type: id="autocomplete-dynamic". This id is use int app.js to bind json data

  *** Note: late enjoy... :) :D
