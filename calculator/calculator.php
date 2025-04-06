<!DOCTYPE html>
<html>
<head>
  <title>Calculator</title>
</head>
<body>
<link rel="stylesheet" href="style.css">
<script src="script.js"></script>
<div id="calculator_body">
  <p>Calculator</p>
  <div id="calculator_display">
    <p id="display"></p>
  </div>
  <table>
  <tr>
      <td>
        <button onclick="document.getElementById('display').innerHTML += '/100'">%</button>
      </td>
    </tr>
  <tr>
      <td>
        <button onclick="document.getElementById('display').innerHTML += '1/'">1/x</button>
        <button onclick="document.getElementById('display').innerHTML += '**2'">x^2</button>
        <button onclick="document.getElementById('display').innerHTML += '**.5'">x^(1/2)</button>
        <button onclick="document.getElementById('display').innerHTML += '/'">/</button>
      </td>
    </tr>
  <tr>
      <td>
        <button onclick="document.getElementById('display').innerHTML += '7'">7</button>
        <button onclick="document.getElementById('display').innerHTML += '8'">8</button>
        <button onclick="document.getElementById('display').innerHTML += '9'">9</button>
        <button onclick="document.getElementById('display').innerHTML += '*'">*</button>
      </td>
    </tr>
  <tr>
      <td>
        <button onclick="document.getElementById('display').innerHTML += '4'">4</button>
        <button onclick="document.getElementById('display').innerHTML += '5'">5</button>
        <button onclick="document.getElementById('display').innerHTML += '6'">6</button>
        <button onclick="document.getElementById('display').innerHTML += '-'">-</button>
      </td>
    </tr>
    <tr>
      <td>
        <button onclick="document.getElementById('display').innerHTML += '1'">1</button>
        <button onclick="document.getElementById('display').innerHTML += '2'">2</button>
        <button onclick="document.getElementById('display').innerHTML += '3'">3</button>
        <button onclick="document.getElementById('display').innerHTML += '+'">+</button>
      </td>
    </tr>
    <tr>
      <td>
        <button onclick="document.getElementById('display').innerHTML += '0'">0</button>
        <button onclick="document.getElementById('display').innerHTML += '.'">.</button>
        <button onclick="document.getElementById('display').innerHTML = ''">AC</button>
        <button onclick="calculateResult()">=</button>
      </td>
    </tr>


  </table>  
</div>
</body>


</html>