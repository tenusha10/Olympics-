<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="robots" content="noindex, nofollow" />
<script type = "text/javascript" src = "http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type = "text/javascript" language = "javascript">
var n
  $(document).ready(function(){
    $('#Mybtn').click(function(){
      var radioValue = $("input[name='numberofcountries']:checked").val();
      n=radioValue;
      if(radioValue==4){
        $('#view4').toggle(500);
        
      }else if(radioValue==3){
        $('#view3').toggle(500);
      }else if(radioValue==2){
        $('#view2').toggle(500);
      }else{
        alert("Please select an option");
      }
      });
      $('#submit2').click(function(){
        var country1=$("input[name='country_id1_v2']").val();
        var country2=$("input[name='country_id2_v2']").val();
        var c=$("#Criteria2 option:selected").val();
        $(".comparison").load("getdata.php",{noofcount:n, country_id1:country1, country_id2:country2,criteria:c})
        $("h4.def").addClass('fontcolour')
        $("#h4").show()
        $("#comparison").addClass('aclass')
        $("#edit2").append("<p> Scroll down to find the Cyclists participated </p>")
        
      })

      $('#submit3').click(function(){
        var country1=$("input[name='country_id1_v3']").val();
        var country2=$("input[name='country_id2_v3']").val();
        var country3=$("input[name='country_id3_v3']").val();
        var c=$("#Criteria3 option:selected").val();
        $(".comparison").load("getdata.php",{noofcount:n, country_id1:country1, country_id2:country2,country_id3:country3,criteria:c})
        $("h4.def").addClass('fontcolour')
        $("#h4").show()
        $("#comparison").addClass('aclass')
        $("#edit3").append("<p> Scroll down to find the Cyclists participated </p>")
      })
      $('#submit4').click(function(){
        var country1=$("input[name='country_id1_v4']").val();
        var country2=$("input[name='country_id2_v4']").val();
        var country3=$("input[name='country_id3_v4']").val();
        var country4=$("input[name='country_id4_v4']").val();
        var c=$("#Criteria4 option:selected").val();
        $(".comparison").load("getdata.php",{noofcount:n, country_id1:country1, country_id2:country2,country_id3:country3,country_id4:country4,criteria:c})
        $("h4.def").addClass('fontcolour')
        $("#h4").show()
        $("#comparison").addClass('aclass')
        $("#edit4").append("<p> Scroll down to find the Cyclists participated </p>")
      })

      $("#h4").click(function(){
        $("#comparison>table").toggle(500);
      })
  });

</script>
<title>Details Task</title>
<style type="text/css">
body {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	background-color:floralwhite;
}
.center {
	text-align:center;
}
body,td,th {
	color: rgb(14, 0, 0); 
}
.larger {
	font-size:larger;
	text-align:left;
}
table {
	margin-left:auto;
	margin-right:auto;
}
.fixed {
	font-family: Courier, monospace;
	white-space: pre;
	background-color:papayawhip;
}
#view4{
  display: none;
}
#view3{
  display: none;
}
#view2{
  display: none;
}

.def{
  display: none;
}

.fontcolour{
  display: run-in;
  color: crimson;
  font-size: larger;
}
img{
  opacity: 0.5;
}
.aclass{
  background-color:salmon; 
}
</style>
</head>
<body>
<img src="https://cheeseonwheels.files.wordpress.com/2010/04/cycling-track.jpg" alt="bike logo" align="right" height="200" width="300">
<h3 class="center">COA123 - Web Programming</h3>
<h4 class="center">Compare Countries</h4>
<p>How many countries would you like to compare?</p>
<p>Press toggle again to remove the selected table</p>
    <input type="radio" name="numberofcountries" value=2>2
    <input type="radio" name="numberofcountries" value=3>3
    <input type="radio" name="numberofcountries" value=4>4
<button id="Mybtn" class="center">Toggle</button> <br>
<h4 class="def" id="h4">Click here! To hide comparison table </h4>
</body>
<form action="getdata.php" method="get" id="view4">
    <p class="center" id="edit4"> Enter the Countries ISO_ID you would like to compare?</p>
    <table border="1">
      <tr>
        <th scope="col">Key</th>
        <th scope="col">Value</th>
      </tr>
      <tr>
        <td><label for="country_id1">Country 1 (country_id)</label></td>
        <td>
          <input name="country_id1_v4" type="text" class="larger" id="country_id1"  size="12" />
        </td>
      </tr>
      <tr>
            <td><label for="country_id2">Country 2 (country_id)</label></td>
            <td>
              <input name="country_id2_v4" type="text" class="larger" id="country_id2"  size="12" />
            </td>
      </tr>
      <tr>
            <td><label for="country_id3">Country 3 (country_id)</label></td>
            <td>
              <input name="country_id3_v4" type="text" class="larger" id="country_id3" size="12" />
            </td>
      </tr>
      <tr>
            <td><label for="country_id4">Country 4 (country_id)</label></td>
            <td>
              <input name="country_id4_v4" type="text" class="larger" id="country_id4" size="12" />
            </td>
      </tr>
      <tr>
        <td>Ranking Criteria</td>
        <td>
          <select id="Criteria4">
            <option value="GDP">GDP</option>
            <option value="total medal">Total medals</option>
            <option value="population" name="population"> population </option>
          </select>
        </td>
      </tr>
      <tr>
        <td>Compare</td>
        <td><input type="button" name="submit4" id="submit4" value="Submit" class="larger" /></td>
      </tr>
    </table>
  </form>

  <form action="getdata.php" method="get" id="view3">
      <p class="center" id="edit3"> Enter the Countries ISO_ID you would like to compare </p>
      <table border="1">
        <tr>
          <th scope="col">Key</th>
          <th scope="col">Value</th>
        </tr>
        <tr>
          <td><label for="country_id1">Country 1 (country_id)</label></td>
          <td>
            <input name="country_id1_v3" type="text" class="larger" id="country_id1"  size="12" />
          </td>
        </tr>
        <tr>
              <td><label for="country_id2">Country 2 (country_id)</label></td>
              <td>
                <input name="country_id2_v3" type="text" class="larger" id="country_id2"  size="12" />
              </td>
        </tr>
        <tr>
              <td><label for="country_id3">Country 3 (country_id)</label></td>
              <td>
                <input name="country_id3_v3" type="text" class="larger" id="country_id3"  size="12" />
              </td>
        </tr>
        <tr>
            <td>Ranking Criteria</td>
            <td>
              <select id="Criteria3">
                <option value="GDP">GDP</option>
                <option value="total medal">Total medals</option>
                <option value="population" name="population"> population </option>
              </select>
            </td>
          </tr>
          <tr>
            <td>Compare</td>
            <td><input type="button" name="submit3" id="submit3" value="Submit" class="larger" /></td>
          </tr>
        </table>
        </form>



      <form action="getdata.php" method="get" id="view2">
          <p class="center" id="edit3"> Enter the Countries ISO_ID you would like to compare </p>
          <table border="1">
            <tr>
              <th scope="col">Key</th>
              <th scope="col">Value</th>
            </tr>
            <tr>
              <td><label for="country_id1">Country 1 (country_id)</label></td>
              <td>
                <input name="country_id1_v2" type="text" class="larger" id="country_id1"  size="12" />
              </td>
            </tr>
            <tr>
                  <td><label for="country_id2">Country 2 (country_id)</label></td>
                  <td>
                    <input name="country_id2_v2" type="text" class="larger" id="country_id2"  size="12" />
                  </td>
            </tr>
            <tr>
                <td>Ranking Criteria</td>
                <td>
                  <select id="Criteria2">
                    <option value="GDP">GDP</option>
                    <option value="total">Total medals</option>
                    <option value="population"> population </option>
                  </select>
                </td>
              </tr>
              <tr>
                <td>Compare</td>
                <td><input type="button" name="submit2" id="submit2" value="Submit" class="larger" /></td>
              </tr>
            </table>
            </form>
          <hr/>
          <br>

            <div class="comparison" id="comparison"></div>
            