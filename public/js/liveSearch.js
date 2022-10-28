function liveSearch() {
    // Declare variables
    var input, filter, table, rows, x, i, txtValue;
    input = document.getElementById('search');
    filter = input.value.toUpperCase();
    table = document.getElementById("mylists");
    rows = table.rows;
  
    // Loop through all list items, and hide those who don't match the search query
    for (i = 1; i < (rows.length - 1); i++) {
      x = rows[i].getElementsByTagName("td")[0];
      txtValue = x.textContent || x.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        x[i].style.display = "";
      } else {
        x[i].style.display = "none";
      }
    }
  }
//   <!DOCTYPE html>
//   <html>
//   <head>
//   <meta name="viewport" content="width=device-width, initial-scale=1">
//   <style>
//   * {
//     box-sizing: border-box;
//   }
  
//   #myInput {
//     background-image: url('/css/searchicon.png');
//     background-position: 10px 12px;
//     background-repeat: no-repeat;
//     width: 100%;
//     font-size: 16px;
//     padding: 12px 20px 12px 40px;
//     border: 1px solid #ddd;
//     margin-bottom: 12px;
//   }
  
//   #myUL {
//     list-style-type: none;
//     padding: 0;
//     margin: 0;
//   }
  
//   #myUL li a {
//     border: 1px solid #ddd;
//     margin-top: -1px; /* Prevent double borders */
//     background-color: #f6f6f6;
//     padding: 12px;
//     text-decoration: none;
//     font-size: 18px;
//     color: black;
//     display: block
//   }
  
//   #myUL li a:hover:not(.header) {
//     background-color: #eee;
//   }
//   </style>
//   </head>
//   <body>
  
//   <h2>My Phonebook</h2>
  
//   <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
//   <table>
//   <tr id="myUL">
//     <td>Adele</td>
//     <td>Agnes</td>
//   </tr>
//   <tr>
//   <td>Bill</td>
//   </tr>
//   </table>
//   <script>
//   function myFunction() {
//       var input, filter, tr, td, i, txtValue;
//       input = document.getElementById("myInput");
//       filter = input.value.toUpperCase();
//       tr = document.getElementById("myUL");
     
//       for (i = 0; i < td.length; i++) {
//        td = tr[i].getElementsByTagName("td")[0];
//           txtValue = td.textContent || td.innerText;
//           if (txtValue.toUpperCase().indexOf(filter) > -1) {
//               td[i].style.display = "";
//           } else {
//               td[i].style.display = "none";
//           }
//       }
//   }
//   </script>
  
//   </body>
//   </html>